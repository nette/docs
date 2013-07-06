<?php
/*
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------

   Copyright (C) 2002-2003  Juraj 'hvge' Durech
   Copyright (C) 2006 Drekin <drekin@gmail.com>

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
 * Python - SHL Language File
 *
 * 1.1	- fixed hexadecimal numbers 0X1234
 *
 */
class PY_lang
{
	var $states;
	var $initial_state;
	var $keywords;
	var $version;
	var $signature;

	function PY_lang()
	{
		$this->signature = "SHL";
		$this->version = "1.1";
		$this->initial_state="OUT";
		$this->states = array(

			"OUT" => array (
				array(
						"_COUNTAB" => array("OUT", 0),
						"ALPHA" => array("KEYWORD", -1),
						"_" => array("KEYWORD", -1),
						"'''" => array("DOCSTRING1", 0),
						'"""' => array("DOCSTRING2", 0),
						"'" => array("QUOTE1", 0),
						'"' => array("QUOTE2", 0),
						"#" => array("COMMENT", 0),
						"0x" => array("NUM_HEXADECIMAL", 0),
						"0X" => array("NUM_HEXADECIMAL", 0),
						"DOT_NUMBER" => array("NUM_DECIMAL", 0),
						"NUMBER" => array("NUM_DECIMAL", 0)
						),
				0,
				null,
				null),

			"KEYWORD" => array(
				array(
						"!SAFECHAR" => array("_RET", 0)
						),
				PF_KEYWORD | PF_RECURSION,
				null,
				null),

			"DOCSTRING1" => array(
				array(
						"'''" => array("_RET", 0),
						"\\\\" => array("DOCSTRING1", 0),
						"\'''" => array("DOCSTRING1", 0),
						"_COUNTAB" => array("DOCSTRING1", 0)
						),
				PF_RECURSION,
				"py-docstring",
				null),

			"DOCSTRING2" => array(
				array(
						'"""' => array("_RET", 0),
						"\\\\" => array("DOCSTRING2", 0),
						'\"""' => array("DOCSTRING2", 0),
						"_COUNTAB" => array("DOCSTRING2", 0)
						),
				PF_RECURSION,
				"py-docstring",
				null),

			"QUOTE1" => array(
				array(
						"'" => array("_RET", 0),
						"\\\\" => array("QUOTE1", 0),
						"\'" => array("QUOTE1", 0),
						"_COUNTAB" => array("QUOTE1", 0)
						),
				PF_RECURSION,
				"py-quote",
				null),

			"QUOTE2" => array(
				array(
						'"' => array("_RET", 0),
						"\\\\" => array("QUOTE2", 0),
						'\"' => array("QUOTE2", 0),
						"_COUNTAB" => array("QUOTE2", 0)
						),
				PF_RECURSION,
				"py-quote",
				null),

			"COMMENT" => array(
				array(
						"\n" => array("_RET", 1),
						"\t" => array("COMMENT", 0)
						),
				PF_RECURSION,
				"py-comment",
				null),

			"NUM_HEXADECIMAL" => array(
				array(
						"L" => array("_RET", 0),
						"l" => array("_RET", 0),
						"!HEXNUM" => array("_RET", 1)
						),
				PF_RECURSION,
				"py-number",
				null),

			"NUM_DECIMAL" => array(
				array(
						"." => array("NUM_FRACTION", 0),
						"L" => array("_RET", 0),
						"l" => array("_RET", 0),
						"j" => array("_RET", 0),
						"J" => array("_RET", 0),
						"e-" => array("NUM_EXPONENT", 0),
						"e+" => array("NUM_EXPONENT", 0),
						"e" => array("NUM_EXPONENT", 0),
						"!NUMBER" => array("_RET", 1)
						),
				PF_RECURSION,
				"py-number",
				null),

			"NUM_FRACTION" => array(
				array(
						"j" => array("_RET", 0),
						"J" => array("_RET", 0),
						"e-" => array("NUM_EXPONENT", 0),
						"e+" => array("NUM_EXPONENT", 0),
						"e" => array("NUM_EXPONENT", 0),
						"!NUMBER" => array("_RET", 1)
						),
				0,
				"py-number",
				null),

			"NUM_EXPONENT" => array(
				array(
						"j" => array("_RET", 0),
						"J" => array("_RET", 0),
						"!NUMBER" => array("_RET", 1)
						),
				0,
				"py-number",
				null)
		);

		$this->keywords = array(
			"py-keyword",
			array(
				"and" => 1,
				"as" => 1,
				"assert" => 1,
				"break" => 1,
				"class" => 1,
				"continue" => 1,
				"def" => 1,
				"del" => 1,
				"elif" => 1,
				"else" => 1,
				"except" => 1,
				"exec" => 1,
				"finally" => 1,
				"for" => 1,
				"from" => 1,
				"global" => 1,
				"if" => 1,
				"import" => 1,
				"in" => 1,
				"is" => 1,
				"lambda" => 1,
				"not" => 1,
				"or" => 1,
				"pass" => 1,
				"print" => 1,
				"raise" => 1,
				"return" => 1,
				"try" => 1,
				"while" => 1,
				"with" => 1,
				"yield" => 1,

				"abs" => 2,
				"all" => 2,
				"any" => 2,
				"apply" => 2,
				"basestring" => 2,
				"bool" => 2,
				"buffer" => 2,
				"callable" => 2,
				"chr" => 2,
				"classmethod" => 2,
				"cmp" => 2,
				"coerce" => 2,
				"compile" => 2,
				"complex" => 2,
				"delattr" => 2,
				"dict" => 2,
				"dir" => 2,
				"divmod" => 2,
				"enumerate" => 2,
				"eval" => 2,
				"execfile" => 2,
				"file" => 2,
				"filter" => 2,
				"float" => 2,
				"frozenset" => 2,
				"getattr" => 2,
				"globals" => 2,
				"hasattr" => 2,
				"hash" => 2,
				"hex" => 2,
				"id" => 2,
				"input" => 2,
				"int" => 2,
				"intern" => 2,
				"isinstance" => 2,
				"issubclass" => 2,
				"iter" => 2,
				"len" => 2,
				"list" => 2,
				"locals" => 2,
				"long" => 2,
				"map" => 2,
				"max" => 2,
				"min" => 2,
				"object" => 2,
				"oct" => 2,
				"open" => 2,
				"ord" => 2,
				"pow" => 2,
				"property" => 2,
				"range" => 2,
				"raw_input" => 2,
				"reduce" => 2,
				"reload" => 2,
				"repr" => 2,
				"reversed" => 2,
				"round" => 2,
				"set" => 2,
				"setattr" => 2,
				"slice" => 2,
				"sorted" => 2,
				"staticmethod" => 2,
				"str" => 2,
				"sum" => 2,
				"super" => 2,
				"tuple" => 2,
				"type" => 2,
				"unichr" => 2,
				"unicode" => 2,
				"vars" => 2,
				"xrange" => 2,
				"zip" => 2,

				"ArithmeticError" => 3,
				"AssertionError" => 3,
				"AttributeError" => 3,
				"BaseException" => 3,
				"DeprecationWarning" => 3,
				"EOFError" => 3,
				"Ellipsis" => 3,
				"EnvironmentError" => 3,
				"Exception" => 3,
				"FloatingPointError" => 3,
				"FutureWarning" => 3,
				"GeneratorExit" => 3,
				"IOError" => 3,
				"ImportError" => 3,
				"ImportWarning" => 3,
				"IndentationError" => 3,
				"IndexError" => 3,
				"KeyError" => 3,
				"KeyboardInterrupt" => 3,
				"LookupError" => 3,
				"MemoryError" => 3,
				"NameError" => 3,
				"NotImplemented" => 3,
				"NotImplementedError" => 3,
				"OSError" => 3,
				"OverflowError" => 3,
				"OverflowWarning" => 3,
				"PendingDeprecationWarning" => 3,
				"ReferenceError" => 3,
				"RuntimeError" => 3,
				"RuntimeWarning" => 3,
				"StandardError" => 3,
				"StopIteration" => 3,
				"SyntaxError" => 3,
				"SyntaxWarning" => 3,
				"SystemError" => 3,
				"SystemExit" => 3,
				"TabError" => 3,
				"TypeError" => 3,
				"UnboundLocalError" => 3,
				"UnicodeDecodeError" => 3,
				"UnicodeEncodeError" => 3,
				"UnicodeError" => 3,
				"UnicodeTranslateError" => 3,
				"UnicodeWarning" => 3,
				"UserWarning" => 3,
				"ValueError" => 3,
				"Warning" => 3,
				"WindowsError" => 3,
				"ZeroDivisionError" => 3,

				"BufferType" => 3,
				"BuiltinFunctionType" => 3,
				"BuiltinMethodType" => 3,
				"ClassType" => 3,
				"CodeType" => 3,
				"ComplexType" => 3,
				"DictProxyType" => 3,
				"DictType" => 3,
				"DictionaryType" => 3,
				"EllipsisType" => 3,
				"FileType" => 3,
				"FloatType" => 3,
				"FrameType" => 3,
				"FunctionType" => 3,
				"GeneratorType" => 3,
				"InstanceType" => 3,
				"IntType" => 3,
				"LambdaType" => 3,
				"ListType" => 3,
				"LongType" => 3,
				"MethodType" => 3,
				"ModuleType" => 3,
				"NoneType" => 3,
				"ObjectType" => 3,
				"SliceType" => 3,
				"StringType" => 3,
				"StringTypes" => 3,
				"TracebackType" => 3,
				"TupleType" => 3,
				"TypeType" => 3,
				"UnboundMethodType" => 3,
				"UnicodeType" => 3,
				"XRangeType" => 3,

				"False" => 3,
				"None" => 3,
				"True" => 3,

				"__abs__" => 3,
				"__add__" => 3,
				"__all__" => 3,
				"__author__" => 3,
				"__bases__" => 3,
				"__builtins__" => 3,
				"__call__" => 3,
				"__class__" => 3,
				"__cmp__" => 3,
				"__coerce__" => 3,
				"__contains__" => 3,
				"__debug__" => 3,
				"__del__" => 3,
				"__delattr__" => 3,
				"__delitem__" => 3,
				"__delslice__" => 3,
				"__dict__" => 3,
				"__div__" => 3,
				"__divmod__" => 3,
				"__doc__" => 3,
				"__eq__" => 3,
				"__file__" => 3,
				"__float__" => 3,
				"__floordiv__" => 3,
				"__future__" => 3,
				"__ge__" => 3,
				"__getattr__" => 3,
				"__getattribute__" => 3,
				"__getitem__" => 3,
				"__getslice__" => 3,
				"__gt__" => 3,
				"__hash__" => 3,
				"__hex__" => 3,
				"__iadd__" => 3,
				"__import__" => 3,
				"__imul__" => 3,
				"__init__" => 3,
				"__int__" => 3,
				"__invert__" => 3,
				"__iter__" => 3,
				"__le__" => 3,
				"__len__" => 3,
				"__long__" => 3,
				"__lshift__" => 3,
				"__lt__" => 3,
				"__members__" => 3,
				"__metaclass__" => 3,
				"__mod__" => 3,
				"__mro__" => 3,
				"__mul__" => 3,
				"__name__" => 3,
				"__ne__" => 3,
				"__neg__" => 3,
				"__new__" => 3,
				"__nonzero__" => 3,
				"__oct__" => 3,
				"__or__" => 3,
				"__path__" => 3,
				"__pos__" => 3,
				"__pow__" => 3,
				"__radd__" => 3,
				"__rdiv__" => 3,
				"__rdivmod__" => 3,
				"__reduce__" => 3,
				"__repr__" => 3,
				"__rfloordiv__" => 3,
				"__rlshift__" => 3,
				"__rmod__" => 3,
				"__rmul__" => 3,
				"__ror__" => 3,
				"__rpow__" => 3,
				"__rrshift__" => 3,
				"__rsub__" => 3,
				"__rtruediv__" => 3,
				"__rxor__" => 3,
				"__setattr__" => 3,
				"__setitem__" => 3,
				"__setslice__" => 3,
				"__self__" => 3,
				"__slots__" => 3,
				"__str__" => 3,
				"__sub__" => 3,
				"__truediv__" => 3,
				"__version__" => 3,
				"__xor__" => 3
			),
			true		// case sensitive keywords
		);
	}
}
