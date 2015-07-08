<?php

/**
 * FSHL 2.1.0                                  | Fast Syntax HighLighter |
 * -----------------------------------------------------------------------
 *
 * LICENSE
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

namespace FSHL\Lexer;

use FSHL;
use FSHL\Generator;

/**
 * Javascript lexer.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011-2012 Jaroslav Hanslík
 * @license http://fshl.kukulich.cz/#license
 */
class LatteJavascript implements FSHL\Lexer
{
	/**
	 * Returns language name.
	 *
	 * @return string
	 */
	public function getLanguage()
	{
		return 'LatteJavascript';
	}

	/**
	 * Returns initial state.
	 *
	 * @return string
	 */
	public function getInitialState()
	{
		return 'OUT';
	}

	/**
	 * Returns states.
	 *
	 * @return array
	 */
	public function getStates()
	{
		return [
			'OUT' => [
				[
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT],
					'ALPHA' => ['KEYWORD', Generator::BACK],
					'NUM' => ['NUMBER', Generator::NEXT],
					'DOTNUM' => ['NUMBER', Generator::NEXT],
					'.' => ['KEYWORD', Generator::CURRENT],
					'"' => ['QUOTE_DOUBLE', Generator::NEXT],
					'\'' => ['QUOTE_SINGLE', Generator::NEXT],
					'/*' => ['COMMENT_BLOCK', Generator::NEXT],
					'//' => ['COMMENT_LINE', Generator::NEXT],
					'REGEXP' => ['REGEXP', Generator::NEXT],
					'LATTE' => ['LATTE', Generator::NEXT],
					'</' => [Generator::STATE_QUIT, Generator::NEXT],
				],
				Generator::STATE_FLAG_NONE,
				'js-out',
				null
			],
			'KEYWORD' => [
				[
					'!ALNUM_' => [Generator::STATE_RETURN, Generator::BACK]
				],
				Generator::STATE_FLAG_KEYWORD | Generator::STATE_FLAG_RECURSION,
				'js-out',
				null
			],
			'NUMBER' => [
				[
					'x' => ['HEXA', Generator::NEXT],
					'DOTNUM' => ['NUMBER', Generator::NEXT],
					'ALL' => [Generator::STATE_RETURN, Generator::BACK],
				],
				Generator::STATE_FLAG_RECURSION,
				'js-num',
				null
			],
			'HEXA' => [
				[
					'!HEXNUM' => [Generator::STATE_RETURN, Generator::BACK]
				],
				Generator::STATE_FLAG_NONE,
				'js-num',
				null
			],
			'QUOTE_DOUBLE' => [
				[
					'"' => [Generator::STATE_RETURN, Generator::CURRENT],
					'LATTE' => ['LATTE', Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'js-quote',
				null
			],
			'QUOTE_SINGLE' => [
				[
					'\'' => [Generator::STATE_RETURN, Generator::CURRENT],
					'LATTE' => ['LATTE', Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'js-quote',
				null
			],
			'COMMENT_BLOCK' => [
				[
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT],
					'*/' => [Generator::STATE_RETURN, Generator::CURRENT],
					'LATTE' => ['LATTE', Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'js-comment',
				null
			],
			'COMMENT_LINE' => [
				[
					'LINE' => [Generator::STATE_RETURN, Generator::BACK],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT],
					'LATTE' => ['LATTE', Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'js-comment',
				null
			],
			'REGEXP' => [
				[
					'ALL' => [Generator::STATE_RETURN, Generator::BACK]
				],
				Generator::STATE_FLAG_NONE,
				'js-quote',
				null
			],
			'LATTE' => [
				null,
				Generator::STATE_FLAG_NEWLEXER,
				'xlang',
				'LatteMacro'
			],
			Generator::STATE_QUIT => [
				null,
				Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				null
			]
		];
	}

	/**
	 * Returns special delimiters.
	 *
	 * @return array
	 */
	public function getDelimiters()
	{
		return [
			'REGEXP' => 'preg_match(\'~/.*?[^\\\\\\\\]/[gim]*~A\', $text, $matches, 0, $textPos)',
			'LATTE' => 'preg_match(\'~\\\\{(?!["\\\'])~A\', $text, $matches, 0, $textPos)',
		];
	}

	/**
	 * Returns keywords.
	 *
	 * @return array
	 */
	public function getKeywords()
	{
		return [
			'js-keywords',
			[
				'abstract' => 1,
				'boolean' => 1,
				'break' => 1,
				'byte' => 1,
				'case' => 1,
				'catch' => 1,
				'char' => 1,
				'class' => 1,
				'const' => 1,
				'continue' => 1,
				'debugger' => 1,
				'default' => 1,
				'delete' => 1,
				'do' => 1,
				'double' => 1,
				'else' => 1,
				'enum' => 1,
				'export' => 1,
				'extends' => 1,
				'false' => 1,
				'final' => 1,
				'finally' => 1,
				'float' => 1,
				'for' => 1,
				'function' => 1,
				'goto' => 1,
				'if' => 1,
				'implements' => 1,
				'import' => 1,
				'in' => 1,
				'instanceof' => 1,
				'int' => 1,
				'interface' => 1,
				'long' => 1,
				'native' => 1,
				'new' => 1,
				'null' => 1,
				'package' => 1,
				'private' => 1,
				'protected' => 1,
				'public' => 1,
				'return' => 1,
				'short' => 1,
				'static' => 1,
				'super' => 1,
				'switch' => 1,
				'synchronized' => 1,
				'this' => 1,
				'throw' => 1,
				'throws' => 1,
				'transient' => 1,
				'true' => 1,
				'try' => 1,
				'typeof' => 1,
				'var' => 1,
				'void' => 1,
				'volatile' => 1,
				'while' => 1,
				'with' => 1,

				'document' => 2,
				'getAttribute' => 2,
				'getElementsByTagName' => 2,
				'getElementById' => 2,
			],
			Generator::CASE_SENSITIVE
		];
	}
}
