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

use FSHL, FSHL\Generator;

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
		return array(
			'OUT' => array(
				array(
					'$' => array('VAR', Generator::NEXT),
					'\'' => array('QUOTE_SINGLE', Generator::NEXT),
					'"' => array('QUOTE_DOUBLE', Generator::NEXT),
					'ALPHA' => array('FUNCTION', Generator::BACK),
					'_' => array('FUNCTION', Generator::BACK),
					'NUM' => array('NUMBER', Generator::NEXT),
					'DOTNUM' => array('NUMBER', Generator::NEXT),
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT),
					'/*' => array('COMMENT_BLOCK', Generator::NEXT),
					'}' => array(Generator::STATE_QUIT, Generator::CURRENT),
				),
				Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'FUNCTION' => array(
				array(
					'!ALNUM_' => array(Generator::STATE_RETURN, Generator::BACK)
				),
				Generator::STATE_FLAG_KEYWORD | Generator::STATE_FLAG_RECURSION,
				null,
				null
			),
			'COMMENT_BLOCK' => array(
				array(
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT),
					'*/' => array(Generator::STATE_RETURN, Generator::CURRENT)
				),
				Generator::STATE_FLAG_RECURSION,
				'php-comment',
				null
			),
			'VAR' => array(
				array(
					'!ALNUM_' => array(Generator::STATE_RETURN, Generator::BACK),
					'$' => array(Generator::STATE_SELF, Generator::NEXT),
					'{' => array(Generator::STATE_SELF, Generator::NEXT),
					'}' => array(Generator::STATE_SELF, Generator::NEXT)
				),
				Generator::STATE_FLAG_RECURSION,
				'php-var',
				null
			),
			'VAR_STR' => array(
				array(
					'}' => array(Generator::STATE_RETURN, Generator::CURRENT),
					'SPACE' => array(Generator::STATE_RETURN, Generator::BACK)
				),
				Generator::STATE_FLAG_RECURSION,
				'php-var',
				null
			),
			'QUOTE_DOUBLE' => array(
				array(
					'"' => array(Generator::STATE_RETURN, Generator::CURRENT),
					'\\\\' => array(Generator::STATE_SELF, Generator::NEXT),
					'\\"' => array(Generator::STATE_SELF, Generator::NEXT),
					'$' => array('VAR', Generator::NEXT),
					'{$' => array('VAR_STR', Generator::NEXT),
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT)
				),
				Generator::STATE_FLAG_RECURSION,
				'php-quote',
				null
			),
			'QUOTE_SINGLE' => array(
				array(
					'\'' => array(Generator::STATE_RETURN, Generator::CURRENT),
					'\\\\' => array(Generator::STATE_SELF, Generator::NEXT),
					'\\\'' => array(Generator::STATE_SELF, Generator::NEXT),
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT)
				),
				Generator::STATE_FLAG_RECURSION,
				'php-quote',
				null
			),
			'NUMBER' => array(
				array(
					'e' => array('EXPONENT', Generator::NEXT),
					'E' => array('EXPONENT', Generator::NEXT),
					'x' => array('HEXA', Generator::NEXT),
					'b' => array(Generator::STATE_SELF, Generator::NEXT),
					'DOTNUM' => array(Generator::STATE_SELF, Generator::NEXT),
					'ALL' => array(Generator::STATE_RETURN, Generator::BACK)
				),
				Generator::STATE_FLAG_RECURSION,
				'php-num',
				null
			),
			'EXPONENT' => array(
				array(
					'+' => array(Generator::STATE_SELF, Generator::CURRENT),
					'-' => array(Generator::STATE_SELF, Generator::CURRENT),
					'!NUM' => array(Generator::STATE_RETURN, Generator::BACK)
				),
				Generator::STATE_FLAG_NONE,
				'php-num',
				null
			),
			'HEXA' => array(
				array(
					'!HEXNUM' => array(Generator::STATE_RETURN, Generator::BACK)
				),
				Generator::STATE_FLAG_NONE,
				'php-num',
				null
			),
			Generator::STATE_QUIT => array(
				null,
				Generator::STATE_FLAG_NEWLEXER,
				'xlang',
				null
			)
		);
	}

	/**
	 * Returns special delimiters.
	 *
	 * @return array
	 */
	public function getDelimiters()
	{
		return array(
		);
	}

	/**
	 * Returns keywords.
	 *
	 * @return array
	 */
	public function getKeywords()
	{
		return array(
			'php-keyword',
			array(
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
			),
			Generator::CASE_INSENSITIVE
		);
	}
}
