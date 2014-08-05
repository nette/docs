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
 * Latte lexer.
 */
class LatteHtml implements FSHL\Lexer
{
	/**
	 * Returns language name.
	 *
	 * @return string
	 */
	public function getLanguage()
	{
		return 'LatteHtml';
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
					'<!--' => array('COMMENT', Generator::NEXT),
					'{*' => array('LATTE_COMMENT', Generator::NEXT),
					'LATTE' => array('LATTE', Generator::CURRENT),
					'<' => array('TAG', Generator::NEXT),
					'&' => array('ENTITY', Generator::NEXT),
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT)
				),
				Generator::STATE_FLAG_NONE,
				null,
				null
			),
			'ENTITY' => array(
				array(
					';' => array('OUT', Generator::CURRENT),
					'&' => array('OUT', Generator::CURRENT),
					'SPACE' => array('OUT', Generator::CURRENT)
				),
				Generator::STATE_FLAG_NONE,
				'html-entity',
				null
			),
			'TAG' => array(
				array(
					'>' => array('OUT', Generator::CURRENT),
					'LATTE' => array('LATTE', Generator::CURRENT),
					'SPACE' => array('TAGIN', Generator::NEXT),
					'style' => array('STYLE', Generator::CURRENT),
					'STYLE' => array('STYLE', Generator::CURRENT),
					'script' => array('SCRIPT', Generator::CURRENT),
					'SCRIPT' => array('SCRIPT', Generator::CURRENT),
				),
				Generator::STATE_FLAG_NONE,
				'html-tag',
				null
			),
			'TAGIN' => array(
				array(
					'LATTE' => array('LATTE', Generator::CURRENT),
					'"' => array('QUOTE_DOUBLE', Generator::NEXT),
					'\'' => array('QUOTE_SINGLE', Generator::NEXT),
					'/>' => array('TAG', Generator::BACK),
					'>' => array('TAG', Generator::BACK),
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT)
				),
				Generator::STATE_FLAG_NONE,
				'html-tagin',
				null
			),
			'STYLE' => array(
				array(
					'LATTE' => array('LATTE', Generator::CURRENT),
					'"' => array('QUOTE_DOUBLE', Generator::NEXT),
					'\'' => array('QUOTE_SINGLE', Generator::NEXT),
					'>' => array('CSS', Generator::NEXT),
					'LINE' => array('TAGIN', Generator::NEXT),
					'TAB' => array('TAGIN', Generator::NEXT)
				),
				Generator::STATE_FLAG_NONE,
				'html-tagin',
				null
			),
			'CSS' => array(
				array(
					'LATTE' => array('LATTE', Generator::CURRENT),
					'>' => array(Generator::STATE_RETURN, Generator::CURRENT)
				),
				Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				'Css'
			),
			'SCRIPT' => array(
				array(
					'LATTE' => array('LATTE', Generator::CURRENT),
					'"' => array('QUOTE_DOUBLE', Generator::NEXT),
					'\'' => array('QUOTE_SINGLE', Generator::NEXT),
					'>' => array('JAVASCRIPT', Generator::NEXT),
					'LINE' => array('TAGIN', Generator::NEXT),
					'TAB' => array('TAGIN', Generator::NEXT)
				),
				Generator::STATE_FLAG_NONE,
				'html-tagin',
				null
			),
			'JAVASCRIPT' => array(
				array(
					'LATTE' => array('LATTE', Generator::CURRENT),
					'>' => array(Generator::STATE_RETURN, Generator::CURRENT)
				),
				Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				'LatteJavascript'
			),
			'QUOTE_DOUBLE' => array(
				array(
					'LATTE' => array('LATTE', Generator::CURRENT),
					'"' => array(Generator::STATE_RETURN, Generator::CURRENT),
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT)
				),
				Generator::STATE_FLAG_RECURSION,
				'html-quote',
				null
			),
			'QUOTE_SINGLE' => array(
				array(
					'LATTE' => array('LATTE', Generator::CURRENT),
					'\'' => array(Generator::STATE_RETURN, Generator::CURRENT),
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT)
				),
				Generator::STATE_FLAG_RECURSION,
				'html-quote',
				null
			),
			'COMMENT' => array(
				array(
					'LINE' => array(Generator::STATE_SELF, Generator::NEXT),
					'TAB' => array(Generator::STATE_SELF, Generator::NEXT),
					'-->' => array('OUT', Generator::CURRENT),
					'LATTE' => array('LATTE', Generator::NEXT),
				),
				Generator::STATE_FLAG_NONE,
				'html-comment',
				null
			),
			'LATTE_COMMENT' => array(
				array(
					'*}' => array('OUT', Generator::CURRENT),
				),
				Generator::STATE_FLAG_NONE,
				'latte-comment',
				null
			),
			'LATTE' => array(
				null,
				Generator::STATE_FLAG_NEWLEXER,
				'xlang',
				'LatteMacro'
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
			'LATTE' => 'preg_match(\'~\\\\{(?!["\\\'])~A\', $text, $matches, 0, $textPos)',
		);
	}

	/**
	 * Returns keywords.
	 *
	 * @return array
	 */
	public function getKeywords()
	{
		return array();
	}
}
