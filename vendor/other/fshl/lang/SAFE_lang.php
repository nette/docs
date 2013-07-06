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
 * SAFE - SHL Language File
 *
 */
class SAFE_lang
{
	var $states;
	var $initial_state;
	var $keywords;
	var $version;
	var $signature;

	function SAFE_lang()
	{
		$this->signature = "SHL";
		$this->version = "1.0";
		$this->initial_state="OUT";
		$this->states = array(

			"OUT" => array (
				array(
						"_COUNTAB" => array("OUT",0),
						),
				0,
				null,
				null
				),
		);

		$this->keywords=null;
	}
}
