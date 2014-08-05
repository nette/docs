<?php

namespace Wiki;

use Nette;


/**
 * Page identificator.
 */
class PageId extends Nette\Object
{
	/** @var string */
	public $book;

	/** @var string */
	public $lang;

	/** @var string */
	public $name;

	/** @var string */
	public $version;

	/** @var string */
	public $fragment;


	public function __construct($book, $lang, $name, $version = NULL, $fragment = NULL)
	{
		$this->book = $book;
		$this->lang = $lang;
		$this->name = $name;
		$this->version = $version;
		$this->fragment = $fragment;
	}

}
