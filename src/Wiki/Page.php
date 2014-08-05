<?php

namespace Wiki;

use Nette;


/**
 * Page entity.
 */
class Page extends Nette\Object
{
	/** page name */
	const HOMEPAGE = 'homepage';

	/** @var PageId */
	public $id;

	/** @var PageId */
	public $redirect;

	/** @var int */
	public $authorId;

	/** @var string */
	public $html;

	/** @var string */
	public $title;

	/** @var string */
	public $mainTitle;

	/** @var string */
	public $theme;

	/** @var string */
	public $robots;

	/** @var bool */
	public $sidebar;

	/** @var array */
	public $toc = [];

	/** @var [lang => name] */
	public $langs = [];

	/** @var array */
	public $tags = [];

	/** @var string */
	public $composer;

	/** @var string */
	public $prevName;

	/** @var string */
	public $nextName;

}
