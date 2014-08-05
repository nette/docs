<?php

namespace Wiki;

use Texy,
	TexyHtml,
	FSHL;


/**
 * Texy parser for wiki.
 *
 * @copyright  David Grudl
 */
class Convertor
{
	const HOMEPAGE = 'homepage';

	/** @var Link */
	private $current;

	/** @var string */
	public $html;

	/** @var string */
	public $title;

	/** @var string */
	public $mainTitle;

	/** @var string */
	public $theme;

	/** @var string */
	public $themeIcon;

	/** @var bool */
	public $sidebar;

	/** @var array */
	public $toc = array();

	/** @var mixed */
	private $tocMode;

	/** @var array */
	public $langs = array();

	/** @var array */
	public $tags = array();

	/** @var array */
	public $links = array();

	/** @var array */
	public $attachments = array();

	/** @var array */
	public $errors = array();

	/** @var array */
	public $paths = array(
		'mediaPath' => NULL,
		'fileMediaPath' => NULL,
		'apiUrl' => NULL,
		'downloadDir' => NULL,
		'domain' => NULL,
		'profileUrl' => NULL,
	);


	public function __construct($book, $lang, $name)
	{
		$this->current = new Link($book, $lang, $name);
	}


	/**
	 * @return void
	 */
	public function parse($text)
	{
		$texy = $this->createTexy();
		$this->html = $texy->process($text);
		$this->title = $texy->headingModule->title;

		if ($this->tocMode === NULL) {
			$this->tocMode = strlen($this->html) > 4000;
		}
		if ($this->tocMode) {
			foreach ($texy->headingModule->TOC as $item) {
				if ($item['el']->id && !empty($item['title'])) {
					$this->toc[] = (object) array(
						'level' => $item['level'],
						'title' => $item['title'],
						'id' => $item['el']->id,
					);
				}
			}
			if ($this->toc && $this->tocMode === 'title') {
				$this->toc[0]->level++;
			} else {
				unset($this->toc[0]);
			}
		}
	}


	/**
	 * @return Texy
	 */
	public function createTexy()
	{
		$texy = new Texy;
		$texy->linkModule->root = '';
		$texy->alignClasses['left'] = 'left';
		$texy->alignClasses['right'] = 'right';
		$texy->emoticonModule->class = 'smiley';
		$texy->headingModule->top = 1;
		$texy->headingModule->generateID = TRUE;
		$texy->tabWidth = 4;
		$texy->typographyModule->locale = $this->current->lang;
		$texy->tableModule->evenClass = 'alt';
		$texy->dtd['body'][1]['style'] = TRUE;
		$texy->allowed['longwords'] = FALSE;
		$texy->allowed['block/html'] = FALSE;

		$texy->phraseModule->tags['phrase/strong'] = 'b';
		$texy->phraseModule->tags['phrase/em'] = 'i';
		$texy->phraseModule->tags['phrase/em-alt'] = 'i';
		$texy->phraseModule->tags['phrase/acronym'] = 'abbr';
		$texy->phraseModule->tags['phrase/acronym-alt'] = 'abbr';

		$texy->addHandler('block', array($this, 'blockHandler'));
		$texy->addHandler('script', array($this, 'scriptHandler'));
		$texy->addHandler('phrase', array($this, 'phraseHandler'));
		$texy->addHandler('newReference', array($this, 'newReferenceHandler'));
		return $texy;
	}


	/********************* text tools ****************d*g**/


	public function resolveLink($link)
	{
		if (preg_match('~.+@|https?:|ftp:|mailto:|ftp\.|www\.~Ai', $link)) { // external link
			return $link;

		} elseif (substr($link, 0, 1) === '#') { // section link
			if (substr($link, 0, 5) === '#toc-') {
				$link = substr($link, 5);
			}
			return '#toc-' . self::webalize($link);
		}

		preg_match('~^
			(?:(?P<book>[a-z]{3,}(?:-\d\.\d)?):)?
			(?:[:/]?(?P<lang>[a-z]{2})(?=[:/#]|$))?
			(?P<name>[^#]+)?
			(?:\#(?P<section>.*))?
		$~x', $link, $matches);

		if (!$matches) {
			return $link; // invalid link
		}

		// normalize name
		$matches = (object) $matches;
		$name = isset($matches->name) ? $matches->name : '';
		$name = rtrim(strtr($name, ':', '/'), '/');

		if (trim(strtolower($name), '/') === self::HOMEPAGE || $name === '') {
			$name = self::HOMEPAGE;
		}

		if (substr($name, 0, 1) !== '/' && empty($matches->book) && empty($matches->lang) && ($a = strrpos($this->current->name, '/'))) { // absolute name
			$name = substr($this->current->name, 0, $a + 1) . $name;
		}

		$name = trim($name, '/');
		$book = empty($matches->book) ? ($this->current->book === 'meta' ? 'www' : $this->current->book) : $matches->book;
		$lang = empty($matches->lang) ? $this->current->lang : $matches->lang;
		$section = isset($matches->section) ? $matches->section : '';


		// generate URL
		if ($book === 'download') {
			return $this->paths['downloadDir'] . '/' . $name;

		} elseif ($book === 'attachment') {
			if (!is_file($this->paths['fileMediaPath'] . '/' . $this->current->book . '/' . $name)) {
				$this->errors[] = "Missing file $name";
			}
			return $this->paths['mediaPath'] . '/' . $this->current->book . '/' . $name;

		} elseif ($book === 'api') {
			$path = strtr($matches->name, '\\', '.');

			if (strpos($path, '()') !== FALSE) { // method
				$path = str_replace('::', '.html#_', str_replace('()', '', $path));

			} elseif (strpos($path, '::') !== FALSE) { // var & const
				$path = str_replace('::', '.html#', $path);

			} else { // class
				$path .= '.html';
			}
			return $this->paths['apiUrl'] . '/' . $path;

		} elseif ($book === 'user') {
			return $this->paths['profileUrl'] . (int) $matches->name;

		} elseif ($book === 'php') {
			return 'http://php.net/' . urlencode($matches->name) . ($section ? "#$section" : ''); // not good - language?

		} else {
			if (substr($section, 0, 4) === 'toc-') {
				$section = substr($section, 4);
			}
			return new Link($book, $lang, $name, $section ? 'toc-' . self::webalize($section) : NULL);
		}
	}


	public function createUrl(Link $link)
	{
		$parts = explode('-', $link->book, 2);
		$name = self::webalize($link->name, '/');
		return ($this->current->book === $link->book ? '' : 'http://' . ($parts[0] === 'www' ? '' : "$parts[0].") . $this->paths['domain'])
			. '/'
			. $link->lang . '/'
			. (isset($parts[1]) ? "$parts[1]/" : '')
			. ($name === self::HOMEPAGE ? '' : $name)
			. ($link->fragment ? "#$link->fragment" : '');
	}


	private static function webalize($s, $charlist = NULL)
	{
		$s = preg_replace('#[^\x09\x0A\x0D\x20-\x7E\xA0-\x{2FF}\x{370}-\x{10FFFF}]#u', '', $s);
		$s = strtr($s, '`\'"^~', "\x01\x02\x03\x04\x05");
		if (ICONV_IMPL === 'glibc') {
			$s = @iconv('UTF-8', 'WINDOWS-1250//TRANSLIT', $s); // intentionally @
			$s = strtr($s, "\xa5\xa3\xbc\x8c\xa7\x8a\xaa\x8d\x8f\x8e\xaf\xb9\xb3\xbe\x9c\x9a\xba\x9d\x9f\x9e"
				. "\xbf\xc0\xc1\xc2\xc3\xc4\xc5\xc6\xc7\xc8\xc9\xca\xcb\xcc\xcd\xce\xcf\xd0\xd1\xd2\xd3"
				. "\xd4\xd5\xd6\xd7\xd8\xd9\xda\xdb\xdc\xdd\xde\xdf\xe0\xe1\xe2\xe3\xe4\xe5\xe6\xe7\xe8"
				. "\xe9\xea\xeb\xec\xed\xee\xef\xf0\xf1\xf2\xf3\xf4\xf5\xf6\xf8\xf9\xfa\xfb\xfc\xfd\xfe\x96",
				"ALLSSSSTZZZallssstzzzRAAAALCCCEEEEIIDDNNOOOOxRUUUUYTsraaaalccceeeeiiddnnooooruuuuyt-");
		} else {
			$s = @iconv('UTF-8', 'ASCII//TRANSLIT', $s); // intentionally @
		}
		$s = str_replace(array('`', "'", '"', '^', '~'), '', $s);
		$s = strtr($s, "\x01\x02\x03\x04\x05", '`\'"^~');
		$s = preg_replace('#[^a-z0-9' . preg_quote($charlist, '#') . ']+#i', '-', $s);
		$s = trim($s, '-');
		return $s;
	}


	/********************* Texy handlers ****************d*g**/


	/**
	 * @param  TexyHandlerInvocation  handler invocation
	 * @param  string  command
	 * @param  array   arguments
	 * @param  string  arguments in raw format
	 * @return TexyHtml|string|FALSE
	 */
	public function scriptHandler($invocation, $cmd, $args, $raw)
	{
		$texy = $invocation->getTexy();
		switch ($cmd) {
		case 'nofollow':
			$texy->linkModule->forceNoFollow = !count($args) || $args[0] !== 'no';
			break;

		case 'title':
			$texy->headingModule->title = $raw;
			break;

		case 'lang':
			$page = $this->resolveLink($args[0]);
			if ($page instanceof Link) {
				$page->name = self::webalize($page->name, '/');
				$page->fragment = NULL;
				$this->langs[] = $page;
			}
			break;

		case 'tags':
			foreach ($args as $tag) {
				$tag = trim($tag);
				if ($tag !== '') {
					$this->tags[] = $tag;
				}
			}
			break;

		case 'toc':
			$this->tocMode = $raw === 'no' ? FALSE : $raw;
			break;

		case 'sidebar':
			$this->sidebar = $raw !== 'no';
			break;

		case 'themeicon':
			$this->themeIcon = $raw ? $texy->imageModule->root . '/' . $raw : NULL;
			break;

		case 'theme':
			if ($raw === 'homepage') {
				$texy->headingModule->top = 2;
			}
			$this->theme = $raw;
			break;

		case 'maintitle':
			$this->mainTitle = $raw;
			break;

		default:
			$this->errors[] = 'Unknown {{'.$cmd.'}}';
		}
		return '';
	}


	/**
	 * @param  TexyHandlerInvocation  handler invocation
	 * @param  string
	 * @param  string
	 * @param  TexyModifier
	 * @param  TexyLink
	 * @return TexyHtml|string|FALSE
	 */
	public function phraseHandler($invocation, $phrase, $content, $modifier, $link)
	{
		if (!$link) {
			$el = $invocation->proceed();
			if ($el instanceof TexyHtml && $el->getName() !== 'a' && $el->title !== NULL) {
				$el->class[] = 'about';
			}
			return $el;
		}

		if ($link->type === 2 && in_array(rtrim($link->URL, ':'), array('api', 'php'))) { // [api] [php]
			$link->URL = rtrim($link->URL, ':') . ':' . $content;
		}

		$dest = $this->resolveLink($link->URL);
		if ($dest instanceof Link) {
			$link->URL = $this->createUrl($dest);
			$dest->name = self::webalize($dest->name, '/');
			$dest->fragment = NULL;
			$this->links[] = $dest;
		} else {
			$link->URL = $dest;
		}

		return $invocation->proceed($phrase, $content, $modifier, $link);
	}


	/**
	 * @param  TexyHandlerInvocation  handler invocation
	 * @param  string
	 * @return TexyHtml|string|FALSE
	 */
	public function newReferenceHandler($invocation, $name)
	{
		$texy = $invocation->getTexy();

		$dest = $this->resolveLink($dest);
		if ($dest instanceof Link) {
			if (!isset($label)) {
				$label = explode('/', $dest->name);
				$label = end($label);
			}
			$el = $texy->linkModule->solve(NULL, new \TexyLink($this->createUrl($dest)), $label);
			if ($dest->lang !== $this->current->lang) $el->lang = $dest->lang;

			$dest->name = self::webalize($dest->name, '/');
			$dest->fragment = NULL;
			$this->links[] = $dest;

		} else {
			if (!isset($label)) {
				$label = preg_replace('#(?!http|ftp|mailto)[a-z]+:|\##A', '', $name); // [api:...], [#section]
			}
			$el = $texy->linkModule->solve(NULL, $texy->linkModule->factoryLink("[$dest]", NULL, $label), $label);
		}
		return $el;
	}


	/**
	 * User handler for code block.
	 *
	 * @param  TexyHandlerInvocation  handler invocation
	 * @param  string  block type
	 * @param  string  text to highlight
	 * @param  string  language
	 * @param  TexyModifier modifier
	 * @return TexyHtml
	 */
	public function blockHandler($invocation, $blocktype, $content, $lang, $modifier)
	{
		if (preg_match('#^block/(php|neon|javascript|js|css|html|htmlcb|latte)$#', $blocktype)) {
			list(, $lang) = explode('/', $blocktype);

		} elseif ($blocktype !== 'block/code') {
			return $invocation->proceed();
		}

		$lang = strtolower($lang);
		if ($lang === 'htmlcb' || $lang === 'latte') $lang = 'html';
		elseif ($lang === 'javascript') $lang = 'js';

		if ($lang === 'html') $langClass = 'FSHL\Lexer\LatteHtml';
		elseif ($lang === 'js') $langClass = 'FSHL\Lexer\LatteJavascript';
		else $langClass = 'FSHL\Lexer\\' . ucfirst($lang);

		$texy = $invocation->getTexy();
		$content = Texy::outdent($content);

		if (class_exists($langClass)) {
			$fshl = new FSHL\Highlighter(new FSHL\Output\Html, FSHL\Highlighter::OPTION_TAB_INDENT);
			$content = $fshl->highlight($content, new $langClass);
		} else {
			$content = htmlSpecialChars($content);
		}
		$content = $texy->protect($content, Texy::CONTENT_BLOCK);

		$elPre = TexyHtml::el('pre');
		if ($modifier) {
			$modifier->decorate($texy, $elPre);
		}
		$elPre->attrs['class'] = 'src-' . strtolower($lang);

		$elCode = $elPre->create('code', $content);

		return $elPre;
	}

}
