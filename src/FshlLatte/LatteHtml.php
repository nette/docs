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
		return [
			'OUT' => [
				[
					'<!--' => ['COMMENT', Generator::NEXT],
					'{*' => ['LATTE_COMMENT', Generator::NEXT],
					'LATTE' => ['LATTE', Generator::CURRENT],
					'<' => ['TAG', Generator::NEXT],
					'&' => ['ENTITY', Generator::NEXT],
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT]
				],
				Generator::STATE_FLAG_NONE,
				null,
				null
			],
			'ENTITY' => [
				[
					';' => ['OUT', Generator::CURRENT],
					'&' => ['OUT', Generator::CURRENT],
					'SPACE' => ['OUT', Generator::CURRENT]
				],
				Generator::STATE_FLAG_NONE,
				'html-entity',
				null
			],
			'TAG' => [
				[
					'>' => ['OUT', Generator::CURRENT],
					'LATTE' => ['LATTE', Generator::CURRENT],
					'SPACE' => ['TAGIN', Generator::NEXT],
					'style' => ['STYLE', Generator::CURRENT],
					'STYLE' => ['STYLE', Generator::CURRENT],
					'script' => ['SCRIPT', Generator::CURRENT],
					'SCRIPT' => ['SCRIPT', Generator::CURRENT],
				],
				Generator::STATE_FLAG_NONE,
				'html-tag',
				null
			],
			'TAGIN' => [
				[
					'LATTE' => ['LATTE', Generator::CURRENT],
					'"' => ['QUOTE_DOUBLE', Generator::NEXT],
					'\'' => ['QUOTE_SINGLE', Generator::NEXT],
					'/>' => ['TAG', Generator::BACK],
					'>' => ['TAG', Generator::BACK],
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT]
				],
				Generator::STATE_FLAG_NONE,
				'html-tagin',
				null
			],
			'STYLE' => [
				[
					'LATTE' => ['LATTE', Generator::CURRENT],
					'"' => ['QUOTE_DOUBLE', Generator::NEXT],
					'\'' => ['QUOTE_SINGLE', Generator::NEXT],
					'>' => ['CSS', Generator::NEXT],
					'LINE' => ['TAGIN', Generator::NEXT],
					'TAB' => ['TAGIN', Generator::NEXT]
				],
				Generator::STATE_FLAG_NONE,
				'html-tagin',
				null
			],
			'CSS' => [
				[
					'LATTE' => ['LATTE', Generator::CURRENT],
					'>' => [Generator::STATE_RETURN, Generator::CURRENT]
				],
				Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				'Css'
			],
			'SCRIPT' => [
				[
					'LATTE' => ['LATTE', Generator::CURRENT],
					'"' => ['QUOTE_DOUBLE', Generator::NEXT],
					'\'' => ['QUOTE_SINGLE', Generator::NEXT],
					'>' => ['JAVASCRIPT', Generator::NEXT],
					'LINE' => ['TAGIN', Generator::NEXT],
					'TAB' => ['TAGIN', Generator::NEXT]
				],
				Generator::STATE_FLAG_NONE,
				'html-tagin',
				null
			],
			'JAVASCRIPT' => [
				[
					'LATTE' => ['LATTE', Generator::CURRENT],
					'>' => [Generator::STATE_RETURN, Generator::CURRENT]
				],
				Generator::STATE_FLAG_NEWLEXER,
				'html-tag',
				'LatteJavascript'
			],
			'QUOTE_DOUBLE' => [
				[
					'LATTE' => ['LATTE', Generator::CURRENT],
					'"' => [Generator::STATE_RETURN, Generator::CURRENT],
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'html-quote',
				null
			],
			'QUOTE_SINGLE' => [
				[
					'LATTE' => ['LATTE', Generator::CURRENT],
					'\'' => [Generator::STATE_RETURN, Generator::CURRENT],
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT]
				],
				Generator::STATE_FLAG_RECURSION,
				'html-quote',
				null
			],
			'COMMENT' => [
				[
					'LINE' => [Generator::STATE_SELF, Generator::NEXT],
					'TAB' => [Generator::STATE_SELF, Generator::NEXT],
					'-->' => ['OUT', Generator::CURRENT],
					'LATTE' => ['LATTE', Generator::NEXT],
				],
				Generator::STATE_FLAG_NONE,
				'html-comment',
				null
			],
			'LATTE_COMMENT' => [
				[
					'*}' => ['OUT', Generator::CURRENT],
				],
				Generator::STATE_FLAG_NONE,
				'latte-comment',
				null
			],
			'LATTE' => [
				null,
				Generator::STATE_FLAG_NEWLEXER,
				'xlang',
				'LatteMacro'
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
		return [];
	}
}
