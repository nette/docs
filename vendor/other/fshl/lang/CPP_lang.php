<?php
/*
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------

   Copyright (C) 2002-2005  Juraj 'hvge' Durech

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
 * CPP - SHL Language File
 *
 * V1.1 - Fixed backslashes in PREPROC, QUOTE1 & QUOTE2 states
 *      - added missing countabs
 * V1.2 - ".666f" is detected as number, 0xFFFFFFFFFFL hexa numbers
 */
class CPP_lang
{
	var $states;
	var $initial_state;
	var $keywords;
	var $version;
	var $signature;

	function CPP_lang()
	{
		$this->signature = "SHL";
		$this->version = "1.2";
		$this->initial_state="OUT";
		$this->states = array(

	// initial state

			"OUT" => array (
				array(
						"_COUNTAB" => array("OUT",0),
						"ALPHA" => array("KEYWORD", -1),
						"//" => array("COMMENT2",0),
						"#" => array("PREPROC", 0),
						"NUMBER" => array("NUM",0),
						"DOT_NUMBER" => array("FLOAT_NUM",0),
						"\"" => array("QUOTE1", 0),
						"'" => array("QUOTE2", 0),
						"/*" => array("COMMENT1",0),
						),
				0,
				null,
				null
				),

	// keyword

			"KEYWORD" => array (
				array(
						"!SAFECHAR" => array("_RET", 0),
					),
				PF_KEYWORD | PF_RECURSION,
				null,
				null
				),


	// NUMBERS

			"NUM" => array(
				array(
						"NUMBER" => array("DEC_NUM",0),
						"x" => array("HEX_NUM",0),
						"." => array("FLOAT_NUM", 0),
						"!NUMBER" => array("_RET",1)	//char back to stream
						),
				PF_RECURSION,
				"cpp-num",
				null),

			"DEC_NUM" => array(
				array(
						"." => array("DEC_NUM", 0),
						"f" => array("DEC_NUM", 0),
						"!NUMBER" => array("_RET",1)	//char back to stream
						),
				0,
				"cpp-num",
				null),

			"FLOAT_NUM" => array(
				array(
						"f" => array("FLOAT_NUM", 0),
						"!NUMBER" => array("_RET",1)	//char back to stream
						),
				PF_RECURSION,
				"cpp-num",
				null),

			"HEX_NUM" => array(
				array(
						"L" => array("HEX_NUM", 0),
						"!HEXNUM" => array("_RET",1)	//char back to stream
						),
				0,
				"cpp-num",
				null),

	// preprocessor (TODO: highlight strings keywords etc...)

			"PREPROC" => array(
				array(
						"\\\n"    => array("PREPROC", 0),		// backslash in preprocessor
						"\t" => array("PREPROC", 0),
						"\\\xd\xa" => array("PREPROC", 0),		// backslash in preprocessor
						"\n" => array("_RET",0),
						),
				PF_RECURSION,
				"cpp-preproc",
				null),

	// CPP quotes BF definition, TODO...

			"QUOTE1" => array(
				array(
						"\\\\" => array("QUOTE1",0),
						"\\\"" => array("QUOTE1",0),
						"_COUNTAB" => array("QUOTE1",0),
						'"' => array("_RET",0),
						),
				PF_RECURSION,
				"cpp-quote",
				null),

			"QUOTE2" => array(
				array(
						"\\'" => array("QUOTE2",0),
						"'" => array("_RET",0),
						"_COUNTAB" => array("QUOTE2",0),
						),
				PF_RECURSION,
				"cpp-quote",
				null),

	// comments

			"COMMENT1" => array(
				array(
						"_COUNTAB" => array("COMMENT1",0),
						"*/" => array("_RET",0),
						),
				PF_RECURSION,
				"cpp-comment",
				null),

			"COMMENT2" => array(
				array(
						"\n" => array("_RET",0),
						"\t" => array("COMMENT2",0),
						),
				PF_RECURSION,
				"cpp-comment",
				null),


		);

		$this->keywords=array(
			"cpp-keywords",
			array(
				'bool' => 1,
				'break' => 1,
				'case' => 1,
				'catch' => 1,
				'char' => 1,
				'class' => 1,
				'const' => 1,
				'const_cast' => 1,
				'continue' => 1,
				'default' => 1,
				'delete' => 1,
				'deprecated' => 1,
				'dllexport' => 1,
				'dllimport' => 1,
				'do' => 1,
				'double' => 1,
				'dynamic_cast' => 1,
				'else' => 1,
				'enum' => 1,
				'explicit' => 1,
				'extern' => 1,
				'false' => 1,
				'float' => 1,
				'for' => 1,
				'friend' => 1,
				'goto' => 1,
				'if' => 1,
				'inline' => 1,
				'int' => 1,
				'long' => 1,
				'mutable' => 1,
				'naked' => 1,
				'namespace' => 1,
				'new' => 1,
				'noinline' => 1,
				'noreturn' => 1,
				'nothrow' => 1,
				'novtable' => 1,
				'operator' => 1,
				'private' => 1,
				'property' => 1,
				'protected' => 1,
				'public' => 1,
				'register' => 1,
				'reinterpret_cast' => 1,
				'return' => 1,
				'selectany' => 1,
				'short' => 1,
				'signed' => 1,
				'sizeof' => 1,
				'static' => 1,
				'static_cast' => 1,
				'struct' => 1,
				'switch' => 1,
				'template' => 1,
				'this' => 1,
				'thread' => 1,
				'throw' => 1,
				'true' => 1,
				'try' => 1,
				'typedef' => 1,
				'typeid' => 1,
				'typename' => 1,
				'union' => 1,
				'unsigned' => 1,
				'using' => 1,
				'uuid' => 1,
				'virtual' => 1,
				'void' => 1,
				'volatile' => 1,
				'__wchar_t' => 1,
				'wchar_t' => 1,
				'while' => 1,
				'__abstract' => 1,
				'__alignof' => 1,
				'__asm' => 1,
				'__assume' => 1,
				'__based' => 1,
				'__box' => 1,
				'__cdecl' => 1,
				'__declspec' => 1,
				'__delegate' => 1,
				'__event' => 1,
				'__except' => 1,
				'__fastcall' => 1,
				'__finally' => 1,
				'__forceinline' => 1,
				'__gc' => 1,
				'__hook' => 1,
				'__identifier' => 1,
				'__if_exists' => 1,
				'__if_not_exists' => 1,
				'__inline' => 1,
				'__int8' => 1,
				'__int16' => 1,
				'__int32' => 1,
				'__int64' => 1,
				'__interface' => 1,
				'__leave' => 1,
				'__m64' => 1,
				'__m128' => 1,
				'__m128d' => 1,
				'__m128i' => 1,
				'__multiple_inheritance' => 1,
				'__nogc' => 1,
				'__noop' => 1,
				'__pin' => 1,
				'__property' => 1,
				'__raise' => 1,
				'__sealed' => 1,
				'__single_inheritance' => 1,
				'__stdcall' => 1,
				'__super' => 1,
				'__try_cast' => 1,
				'__try' => 1,
				'__except' => 1,
				'__finally' => 1,
				'__unhook' => 1,
				'__uuidof' => 1,
				'__value' => 1,
				'__virtual_inheritance' => 1,
				'__w64'  => 1,
			),
			true
		);
	}
}
