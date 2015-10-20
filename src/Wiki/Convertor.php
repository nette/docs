<?php

namespace Wiki;

use Texy;
use FSHL;
use Nette;
use Nette\Utils\Strings;


/**
 * Texy parser for wiki.
 *
 * @copyright  David Grudl
 */
class Convertor extends Nette\Object
{
	/** @var Page */
	private $page;

	/** @var mixed */
	private $tocMode;

	/** @var array */
	public $paths = [
		'mediaPath' => NULL,
		'fileMediaPath' => NULL,
		'apiUrl' => NULL,
		'downloadDir' => NULL,
		'domain' => NULL,
		'profileUrl' => NULL,
	];

	/** @var PageId[] */
	public $links;

	/** @var string[] */
	public $errors;


	public function __construct(array $paths = [])
	{
		$this->paths = $paths + $this->paths;
	}


	/**
	 * @return Page
	 */
	public function parse(PageId $id, $text)
	{
		$this->tocMode = $this->errors = $this->links = NULL;

		$this->page = $page = new Page;
		$page->id = clone $id;
		$page->sidebar = TRUE;

		$texy = $this->createTexy();
		$page->html = $texy->process($text);
		$page->title = $texy->headingModule->title;

		if ($this->tocMode === NULL) {
			$this->tocMode = strlen($page->html) > 4000;
		}
		if ($this->tocMode) {
			foreach ($texy->headingModule->TOC as $item) {
				if ($item['el']->id && !empty($item['title'])) {
					$page->toc[] = (object) [
						'level' => $item['level'],
						'title' => $item['title'],
						'id' => $item['el']->id,
					];
				}
			}
			if ($page->toc && $this->tocMode === 'title') {
				$page->toc[0]->level++;
			} else {
				unset($page->toc[0]);
			}
		}

		return $page;
	}


	/**
	 * @return Texy\Texy
	 */
	public function createTexy()
	{
		$texy = new Texy\Texy;
		$texy->setOutputMode($texy::HTML5);
		$texy->linkModule->root = '';
		$texy->alignClasses['left'] = 'left';
		$texy->alignClasses['right'] = 'right';
		$texy->emoticonModule->class = 'smiley';
		$texy->headingModule->top = 1;
		$texy->headingModule->generateID = TRUE;
		$texy->tabWidth = 4;
		$texy->typographyModule->locale = $this->page->id->lang;
		$texy->htmlOutputModule->lineWrap = 130;
		$texy->tableModule->evenClass = 'alt';
		$texy->dtd['body'][1]['style'] = TRUE;
		$texy->allowed['longwords'] = FALSE;
		$texy->allowed['block/html'] = FALSE;

		$texy->phraseModule->tags['phrase/strong'] = 'b';
		$texy->phraseModule->tags['phrase/em'] = 'i';
		$texy->phraseModule->tags['phrase/em-alt'] = 'i';
		$texy->phraseModule->tags['phrase/acronym'] = 'abbr';
		$texy->phraseModule->tags['phrase/acronym-alt'] = 'abbr';

		$texy->addHandler('block', [$this, 'blockHandler']);
		$texy->addHandler('script', [$this, 'scriptHandler']);
		$texy->addHandler('phrase', [$this, 'phraseHandler']);
		$texy->addHandler('newReference', [$this, 'newReferenceHandler']);
		return $texy;
	}


	/********************* text tools ****************d*g**/


	public function resolveLink($link, & $label = NULL)
	{
		if (preg_match('~.+@|https?:|ftp:|mailto:|ftp\.|www\.~Ai', $link)) { // external link
			return $link;

		} elseif (substr($link, 0, 1) === '#') { // section link
			if (Strings::startsWith($link, '#toc-')) {
				$link = substr($link, 5);
			}
			return '#toc-' . Strings::webalize($link);
		}

		preg_match('~^
			(?:(?P<book>[a-z]{3,})(?:-(?P<version>\d+\.\d+))?:)?
			(?:[:/]?(?P<lang>[a-z]{2})(?=[:/#]|$))?
			(?P<name>[^#]+)?
			(?:\#(?P<section>.*))?
		$~x', $link, $matches);

		if (!$matches) {
			return $link; // invalid link
		}

		// normalize name
		$matches = (object) ($matches + ['book' => '', 'version' => '', 'lang' => '', 'name' => '', 'section' => '']);
		$name = rtrim($matches->name, '/');
		if (substr($name, 0, 1) === ':') {
			$name[0] = '/';
		}

		if (trim(strtolower($name), '/') === Page::HOMEPAGE || $name === '') {
			$name = Page::HOMEPAGE;
		}

		if (substr($name, 0, 1) !== '/' && !$matches->book && !$matches->lang && ($a = strrpos($this->page->id->name, '/'))) { // absolute name
			$name = substr($this->page->id->name, 0, $a + 1) . $name;
		}

		$name = trim($name, '/');
		$book = $matches->book ?: ($this->page->id->book === 'meta' ? 'www' : $this->page->id->book);
		$version = $matches->version ?: ($book === $this->page->id->book ? $this->page->id->version : '');
		$lang = $matches->lang ?: $this->page->id->lang;
		$section = $matches->section;


		// generate URL
		if ($book === 'download') {
			return $this->paths['downloadDir'] . '/' . $name;

		} elseif ($book === 'addons') {
			$tmp = explode(':', $link)[1];
			return 'https://addons.nette.org/' . ($tmp === Page::HOMEPAGE ? '' : $tmp);

		} elseif ($book === 'attachment') {
			$ver = $this->page->id->version ? '-' . $this->page->id->version : '';
			if (!is_file($this->paths['fileMediaPath'] . '/' . $this->page->id->book . $ver . '/' . $name)) {
				$this->errors[] = "Missing file $name";
			}
			return $this->paths['mediaPath'] . '/' . $this->page->id->book . $ver . '/' . $name;

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
			if (Strings::startsWith($section, 'toc-')) {
				$section = substr($section, 4);
			}
			$label = explode('/', $name);
			$label = end($label);
			return new PageId($book, $lang, Strings::webalize($name, '/'), $version, $section ? 'toc-' . Strings::webalize($section) : NULL);
		}
	}


	public function createUrl(PageId $link)
	{
		return ($this->page->id->book === $link->book ? '' : '//' . ($link->book === 'www' ? '' : "$link->book.") . $this->paths['domain'])
			. '/'
			. $link->lang . '/'
			. ($link->version ? "$link->version/" : '')
			. ($link->name === Page::HOMEPAGE ? '' : $link->name)
			. ($link->fragment ? "#$link->fragment" : '');
	}


	/********************* Texy handlers ****************d*g**/


	/**
	 * @return Texy\HtmlElement|string|FALSE
	 */
	public function scriptHandler(Texy\HandlerInvocation $invocation, $cmd, array $args, $raw)
	{
		$texy = $invocation->getTexy();
		$page = $this->page;
		switch ($cmd) {
		case 'nofollow':
			$texy->linkModule->forceNoFollow = !count($args) || $args[0] !== 'no';
			break;

		case 'title':
			$texy->headingModule->title = $raw;
			break;

		case 'lang':
			$link = $this->resolveLink($args[0]);
			if ($link instanceof PageId) {
				$page->langs[$link->lang] = $link->name;
			}
			break;

		case 'tags':
			foreach ($args as $tag) {
				$tag = trim($tag);
				if ($tag !== '') {
					$page->tags[] = $tag;
				}
			}
			break;

		case 'toc':
			$this->tocMode = $raw === 'no' ? FALSE : $raw;
			break;

		case 'sidebar':
			$page->sidebar = $raw !== 'no';
			break;

		case 'theme':
			if ($raw === 'homepage') {
				$texy->headingModule->top = 2;
			}
			$page->theme = $raw;
			break;

		case 'maintitle':
			$page->mainTitle = $raw;
			break;

		default:
			$this->errors[] = 'Unknown {{'.$cmd.'}}';
		}
		return '';
	}


	/**
	 * @return Texy\HtmlElement|string|FALSE
	 */
	public function phraseHandler(Texy\HandlerInvocation $invocation, $phrase, $content, Texy\Modifier $modifier, Texy\Link $link = NULL)
	{
		if (!$link) {
			$el = $invocation->proceed();
			if ($el instanceof Texy\HtmlElement && $el->getName() !== 'a' && $el->title !== NULL) {
				$el->class[] = 'about';
			}
			return $el;
		}

		if (preg_match('#(api|php|attachment):$#A', $link->URL)) {
			$link->URL .= $content;
		}

		$dest = $this->resolveLink($link->URL);
		if ($dest instanceof PageId) {
			$link->URL = $this->createUrl($dest);
			$dest->fragment = NULL;
			$this->links[] = $dest;
		} else {
			$link->URL = $dest;
		}

		return $invocation->proceed($phrase, $content, $modifier, $link);
	}


	/**
	 * @return Texy\HtmlElement|string|FALSE
	 */
	public function newReferenceHandler(Texy\HandlerInvocation $invocation, $name)
	{
		$texy = $invocation->getTexy();
		$dest = $this->resolveLink($name, $label);
		if ($dest instanceof PageId) {
			$el = $texy->linkModule->solve(NULL, new Texy\Link($this->createUrl($dest)), $label);
			if ($dest->lang !== $this->page->id->lang) $el->lang = $dest->lang;

			$dest->fragment = NULL;
			$this->links[] = $dest;

		} else {
			$label = preg_replace('#(?!http|ftp|mailto)[a-z]+:|\##A', '', $name); // [api:...], [#section]
			$el = $texy->linkModule->solve(NULL, $texy->linkModule->factoryLink("[$dest]", NULL, $label), $label);
		}
		return $el;
	}


	/**
	 * User handler for code block.
	 * @return Texy\HtmlElement
	 */
	public function blockHandler(Texy\HandlerInvocation $invocation, $blocktype, $content, $lang, Texy\Modifier $modifier)
	{
		$blocktype = strtolower($blocktype);
		if (preg_match('#^block/(php|neon|javascript|js|css|html|htmlcb|latte|sql)$#', $blocktype)) {
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
		$content = Texy\Helpers::outdent($content);

		if (class_exists($langClass)) {
			$fshl = new FSHL\Highlighter(new FSHL\Output\Html, FSHL\Highlighter::OPTION_TAB_INDENT);
			$content = $fshl->highlight($content, new $langClass);
		} else {
			$content = htmlSpecialChars($content);
		}
		$content = $texy->protect($content, $texy::CONTENT_BLOCK);

		$elPre = Texy\HtmlElement::el('pre');
		if ($modifier) {
			$modifier->decorate($texy, $elPre);
		}
		$elPre->attrs['class'] = 'src-' . strtolower($lang);

		$elCode = $elPre->create('code', $content);

		return $elPre;
	}

}
