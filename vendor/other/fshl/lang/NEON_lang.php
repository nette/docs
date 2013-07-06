<?php
/*
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------

   Copyright (C) 2002-2006  Juraj 'hvge' Durech

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

 * ---------------------------------------------------------------------
 * JS - JavaScript SHL Language File
 *
 * V1.0 - This is introduction version of JavaScript LEXER
 * V1.1 - fixed point separated keywords, added few DOM keywords as .js-keywords2
 * V1.2 - added case non sensitive flag for keywords
 */
class NEON_lang
{
	var $states;
	var $initial_state;
	var $keywords;
	var $version;
	var $signature;

	function NEON_lang()
	{
		$this->signature = "SHL";
		$this->version = "1.2";
		$this->initial_state="OUT";
		$this->states = array(

	// initial state

			"OUT" => array (
				array(
						"_COUNTAB" => array("OUT",0),
						"." => array("SYMBOL", -1),
						":" => array("SYMBOL", -1),
						"=" => array("SYMBOL", -1),
						"(" => array("SYMBOL", -1),
						")" => array("SYMBOL", -1),
						"{" => array("SYMBOL", -1),
						"}" => array("SYMBOL", -1),
						"[" => array("SYMBOL", -1),
						"]" => array("SYMBOL", -1),
						"NUMBER" => array("NUM",0),
						"\"" => array("QUOTE1", 0),
						"'" => array("QUOTE2", 0),
						"#" => array("COMMENT2",0),
						),
				0,
				"js-out",
				null
				),

	// SYMBOL

			"SYMBOL" => array (
				array(
						"!SAFECHAR" => array("_RET", 0),
					),
				PF_RECURSION,
				"",
				null
				),

	// NUMBERS

			"NUM" => array(
				array(
						"x" => array("HEX_NUM",0),
						"." => array("DEC_NUM", 0),		//float
						"!NUMBER" => array("_RET",1),	//char back to stream
						"NUMBER" => array("DEC_NUM",0),
						),
				PF_RECURSION,
				"js-num",
				null),

			"DEC_NUM" => array(
				array(
						"." => array("DEC_NUM", 0),
						//"f" => array("DEC_NUM", 0),
						"!NUMBER" => array("_RET",1)	//char back to stream
						),
				0,
				"js-num",
				null),


			"HEX_NUM" => array(
				array(
						"!HEXNUM" => array("_RET",1)	//char back to stream
						),
				0,
				"js-num",
				null),


	// quotes BF definition, TODO...

			"QUOTE1" => array(
				array(
						"\"" => array("_RET",0),
						),
				PF_RECURSION,
				"js-quote",
				null),

			"QUOTE2" => array(
				array(
						"'" => array("_RET",0),
						),
				PF_RECURSION,
				"js-quote",
				null),

	// comments
			"COMMENT2" => array(
				array(
						"\n" => array("_RET",0),
						"_COUNTAB" => array("COMMENT2",0),
						),
				PF_RECURSION,
				"js-comment",
				null),

			"_QUIT" => array (null, PF_NEWLANG, "html-tag", /* =style*/ null, /* =new language*/)	//return to previous language

		);

	}
}
