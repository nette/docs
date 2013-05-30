<?php

/**
* @author  Mario Kollarovic
*
* ThumbnailHelper
*/
class ThumbnailHelper extends Nette\Object
{
	
	/** @var string */
	private $wwwDir;

	/** @var Nette\Http\IRequest */
	private $httpRequest;

	/** @var string */
	private $thumbPathMask;


	/**
	 * @param string
	 * @param Nette\Http\IRequest
	 * @param string
 	 */
	function __construct($wwwDir, Nette\Http\IRequest $httpRequest, $thumbPathMask='images/{filename}-{width}x{height}.{extension}')
	{
		$this->wwwDir = $wwwDir;
		$this->httpRequest = $httpRequest;
		$this->thumbPathMask = $thumbPathMask;
	}


	/**
	 * @param string
	 * @param int
	 * @param int
	 * @return string
 	 */
	public function thumbnail($src, $width, $height = NULL)
	{
		$srcAbsPath = $this->wwwDir . '/' . $src;
		$thumbRelPath = $this->createThumbPath($srcAbsPath, $width, $height);
		$thumbAbsPath = $this->wwwDir . '/' . $thumbRelPath;

		if (!file_exists($srcAbsPath)) {
			return 'Image not found';
		}

		if (!file_exists($thumbAbsPath) or (filemtime($thumbAbsPath) < filemtime($srcAbsPath))) {

			$dir = dirname($thumbAbsPath);
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}

			$this->createThumb($srcAbsPath, $thumbAbsPath, $width, $height);
			clearstatcache();
		}

		return $this->httpRequest->url->basePath . $thumbRelPath;
	}


	/**
	 * @param string
	 * @param string
	 * @param int
	 * @param int
	 * @return void
 	 */
	private function createThumb($src, $desc, $width, $height)
	{
		$image = Nette\Image::fromFile($src);
		$image->resize($width, $height);
		$image->save($desc);
	}


	/**
	 * @param string
	 * @param int
	 * @param int
	 * @return string
 	 */
	private function createThumbPath($file, $width, $height)
	{
		$pathinfo = pathinfo($file);
		$search = array('{width}', '{height}', '{filename}', '{extension}');
		$replace = array($width, $height, $pathinfo['filename'], $pathinfo['extension']);
		return str_replace($search, $replace, $this->thumbPathMask);
	}

}
