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
 * LatteMacro lexer.
 */
class LatteMacro implements FSHL\Lexer
{
	/**
	 * Returns language name.
	 *
	 * @return string
	 */
	public function getLanguage()
	{
		return 'LatteMacro';
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
					'$' => ['VAR', Generator::NEXT],
					'\'' => ['QUOTE_SINGLE', Generator::NEXT],
					'"' => ['QUOTE_DOUBLE', Generator::NEXT],
					'ALPHA' => ['FUNCTION', Generator::BACK],
					'_' => ['FUNCTION', Generator::BACK],
					'NUM' => ['NUMBER', Generator::NEXT],
					'DOTNUM' => ['NUMBER', Generator::NEXT],
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT],
					'/*' => ['COMMENT_BLOCK', Generator::NEXT],
					'}' => [Generator::STATE_QUIT, Generator::CURRENT],
				],
				Generator::STATE_FLAG_NONE,
				null,
				null
			],
			'FUNCTION' => [
				[
					'!ALNUM_' => [Generator::STATE_RETURN, Generator::BACK]
				],
				Generator::STATE_FLAG_KEYWORD | Generator::STATE_FLAG_RECURSION,
				null,
				null
			],
			'COMMENT_BLOCK' => [
				[
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT],
					'*/' => [Generator::STATE_RETURN, Generator::CURRENT]
				],
				Generator::STATE_FLAG_RECURSION,
				'php-comment',
				null
			],
			'VAR' => [
				[
					'!ALNUM_' => [Generator::STATE_RETURN, Generator::BACK],
					'$' => [Generator::STATE_SELF, Generator::NEXT],
					'{' => [Generator::STATE_SELF, Generator::NEXT],
					'}' => [Generator::STATE_SELF, Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'php-var',
				null
			],
			'VAR_STR' => [
				[
					'}' => [Generator::STATE_RETURN, Generator::CURRENT],
					'SPACE' => [Generator::STATE_RETURN, Generator::BACK]
				],
				Generator::STATE_FLAG_RECURSION,
				'php-var',
				null
			],
			'QUOTE_DOUBLE' => [
				[
					'"' => [Generator::STATE_RETURN, Generator::CURRENT],
					'\\\\' => [Generator::STATE_SELF, Generator::NEXT],
					'\\"' => [Generator::STATE_SELF, Generator::NEXT],
					'$' => ['VAR', Generator::NEXT],
					'{$' => ['VAR_STR', Generator::NEXT],
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'php-quote',
				null
			],
			'QUOTE_SINGLE' => [
				[
					'\'' => [Generator::STATE_RETURN, Generator::CURRENT],
					'\\\\' => [Generator::STATE_SELF, Generator::NEXT],
					'\\\'' => [Generator::STATE_SELF, Generator::NEXT],
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'php-quote',
				null
			],
			'NUMBER' => [
				[
					'e' => ['EXPONENT', Generator::NEXT],
					'E' => ['EXPONENT', Generator::NEXT],
					'x' => ['HEXA', Generator::NEXT],
					'b' => [Generator::STATE_SELF, Generator::NEXT],
					'DOTNUM' => [Generator::STATE_SELF, Generator::NEXT],
					'ALL' => [Generator::STATE_RETURN, Generator::BACK]
				],
				Generator::STATE_FLAG_RECURSION,
				'php-num',
				null
			],
			'EXPONENT' => [
				[
					'+' => [Generator::STATE_SELF, Generator::CURRENT],
					'-' => [Generator::STATE_SELF, Generator::CURRENT],
					'!NUM' => [Generator::STATE_RETURN, Generator::BACK]
				],
				Generator::STATE_FLAG_NONE,
				'php-num',
				null
			],
			'HEXA' => [
				[
					'!HEXNUM' => [Generator::STATE_RETURN, Generator::BACK]
				],
				Generator::STATE_FLAG_NONE,
				'php-num',
				null
			],
			Generator::STATE_QUIT => [
				null,
				Generator::STATE_FLAG_NEWLEXER,
				'xlang',
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
			'php-keyword',
			[
				'include' => 1,
				'includeblock' => 1,
				'extends' => 1,
				'layout' => 1,
				'block' => 1,
				'define' => 1,
				'snippet' => 1,
				'snippetarea' => 1,
				'link' => 1,
				'plink' => 1,
				'ifset' => 1,
				'breakif' => 1,
				'continueif' => 1,
				'first' => 1,
				'last' => 1,
				'sep' => 1,
				'var' => 1,
				'default' => 1,
				'l' => 1,
				'r' => 1,
				'capture' => 1,
				'contenttype' => 1,
				'status' => 1,
				'control' => 1,

				'as' => 1,
				'clone' => 1,
				'else' => 1,
				'elseif' => 1,
				'for' => 1,
				'foreach' => 1,
				'if' => 1,
				'instanceof' => 1,
				'new' => 1,
				'while' => 1,
				'empty' => 1,
				'isset' => 1,
				'list' => 1,
				'true' => 1,
				'false' => 1,
				'null' => 1,
			],
			Generator::CASE_INSENSITIVE
		];
	}
}
