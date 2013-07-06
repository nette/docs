<?php

namespace Text;


/**
 * Page identificator.
 */
class Link
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
