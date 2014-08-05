<?php

namespace Wiki;

use Nette;


/**
 * Page identificator.
 */
class Link extends Nette\Object
{
	/** @var string */
	public $book;

	/** @var string */
	public $lang;

	/** @var string */
	public $name;

	/** @var string */
	public $fragment;


	public function __construct($book, $lang, $name, $fragment = NULL)
	{
		$this->book = $book;
		$this->lang = $lang;
		$this->name = $name;
		$this->fragment = $fragment;
	}

}
