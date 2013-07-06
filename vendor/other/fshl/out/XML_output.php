<?php
/*
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------

   Copyright (C) 2002-2003  Juraj 'hvge' Durech

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
 * XML output module
 *
 * <fshl>
 *  <class>...</class>
 *  <data>...</data>
 * </fshl>
 *
 * TODO: fix cross language bug
 */

class XML_output
{
	var $last_class;
	var $istext;

	function XML_output()
	{
		$this->last_class="normal";
		$this->istext=0;
	}

	function template ($word, $class)
	{
		$word=htmlentities($word);
		$this->istext=0;

		if($class == null)
			$class = "normal";

		if ($this->last_class == $class)
		{
			return $word;
		}
		else
		{
			if($this->last_class == "normal")
			{
				$this->last_class=$class;
				return "<fshl>\n <class>$class</class>\n <data>".$word;
			}
			$this->last_class=$class;
			return "</data>\n</fshl>\n<fshl>\n <class>$class</class>\n <data>".$word;
		}
	}

	function template_end()
	{
		if($this->istext) {
			$this->last_class="normal";
			return "</data>\n</fshl>";
		} else {
			return null;
		}
	}

	function keyword ($word, $class)
	{
		$word=htmlentities($word);
		$this->istext=0;

		if($class == null)
			$class = "normal";

		if ($this->last_class == $class)
		{
			return $word;
		}
		else
		{
			if($this->last_class == "normal")
			{
				$this->last_class=$class;
				return "<fshl>\n <class>$class</class>\n <data>".$word;
			}
			$this->last_class=$class;
			return "</data>\n</fshl>\n<fshl>\n <class>$class</class>\n <data>".$word;
		}
	}

} //END class XML_output
