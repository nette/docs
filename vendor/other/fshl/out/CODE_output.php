<?php
/*
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------

   Copyright (C) 2002-2004  Juraj 'hvge' Durech

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
 * CODE_output.php		same as HTML output module, but producing output,
 *						which can be used together with <code> tag
 */

class CODE_output
{
	var $last_class;

	function CODE_output()
	{
		$this->last_class = null;
	}

	function template ($word, $class)
	{
		$word=htmlentities($word);
		$word=str_replace(' ','&nbsp;',$word);
		$word=str_replace("\n","<br />\n",$word);

		if ($this->last_class == $class)
		{
			return $word;
		}
		else
		{
			if($this->last_class == null)
			{
				$this->last_class = $class;
				return '<span class="'.$class.'">'.$word;
			}
			$this->last_class = $class;
			if($class == null) return '</span>'.$word;
			return '</span><span class="'.$class.'">'.$word;
		}
	}

	function template_end()
	{
		if($this->last_class != null) {
			$this->last_class = null;
			return '</span>';
		} else {
			return null;
		}
	}


	function keyword ($word, $class)
	{
		$word=htmlentities($word);
		$word=str_replace(' ','&nbsp;',$word);
		$word=str_replace("\n","<br />\n",$word);

		if ($this->last_class == $class)
		{
			return $word;
		}
		else
		{
			if($this->last_class == null)
			{
				$this->last_class = $class;
				return '<span class="'.$class.'">'.$word;
			}
			$this->last_class = $class;
			if($class == null) return '</span>'.$word;
			return '</span><span class="'.$class.'">'.$word;
		}
	}

} //END class HTML_output
