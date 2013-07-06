<?php
/* --------------------------------------------------------------- *
 *        WARNING: ALL CHANGES IN THIS FILE WILL BE LOST
 *
 *   Source language file: W:\fshl/lang/PY_lang.php
 *       Language version: 1.1 (Sign:SHL)
 *
 *            Target file: W:\fshl/fshl_cache/PY_lang.php
 *             Build date: Mon 24.1.2011 18:17:43
 *
 *      Generator version: 0.4.11
 * --------------------------------------------------------------- */
class PY_lang
{
var $trans,$flags,$data,$delim,$class,$keywords;
var $version,$signature,$initial_state,$ret,$quit;
var $pt,$pti,$generator_version;
var $names;

function PY_lang () {
	$this->version=1.1;
	$this->signature="SHL";
	$this->generator_version="0.4.11";
	$this->initial_state=0;
	$this->trans=array(0=>array(0=>array(0=>0,1=>0),1=>array(0=>1,1=>-1),2=>array(0=>1,1=>-1),3=>array(0=>2,1=>0),4=>array(0=>3,1=>0),5=>array(0=>4,1=>0),6=>array(0=>5,1=>0),7=>array(0=>6,1=>0),8=>array(0=>7,1=>0),9=>array(0=>7,1=>0),10=>array(0=>8,1=>0),11=>array(0=>8,1=>0)),1=>array(0=>array(0=>11,1=>0)),2=>array(0=>array(0=>11,1=>0),1=>array(0=>2,1=>0),2=>array(0=>2,1=>0),3=>array(0=>2,1=>0)),3=>array(0=>array(0=>11,1=>0),1=>array(0=>3,1=>0),2=>array(0=>3,1=>0),3=>array(0=>3,1=>0)),4=>array(0=>array(0=>11,1=>0),1=>array(0=>4,1=>0),2=>array(0=>4,1=>0),3=>array(0=>4,1=>0)),5=>array(0=>array(0=>11,1=>0),1=>array(0=>5,1=>0),2=>array(0=>5,1=>0),3=>array(0=>5,1=>0)),6=>array(0=>array(0=>11,1=>1),1=>array(0=>6,1=>0)),7=>array(0=>array(0=>11,1=>0),1=>array(0=>11,1=>0),2=>array(0=>11,1=>1)),8=>array(0=>array(0=>9,1=>0),1=>array(0=>11,1=>0),2=>array(0=>11,1=>0),3=>array(0=>11,1=>0),4=>array(0=>11,1=>0),5=>array(0=>10,1=>0),6=>array(0=>10,1=>0),7=>array(0=>10,1=>0),8=>array(0=>11,1=>1)),9=>array(0=>array(0=>11,1=>0),1=>array(0=>11,1=>0),2=>array(0=>10,1=>0),3=>array(0=>10,1=>0),4=>array(0=>10,1=>0),5=>array(0=>11,1=>1)),10=>array(0=>array(0=>11,1=>0),1=>array(0=>11,1=>0),2=>array(0=>11,1=>1)));
	$this->flags=array(0=>0,1=>5,2=>4,3=>4,4=>4,5=>4,6=>4,7=>4,8=>4,9=>0,10=>0);
	$this->delim=array(0=>array(0=>"_COUNTAB",1=>"ALPHA",2=>"_",3=>"'''",4=>"\"\"\"",5=>"'",6=>"\"",7=>"#",8=>"0x",9=>"0X",10=>"DOT_NUMBER",11=>"NUMBER"),1=>array(0=>"!SAFECHAR"),2=>array(0=>"'''",1=>"\\\\",2=>"\\'''",3=>"_COUNTAB"),3=>array(0=>"\"\"\"",1=>"\\\\",2=>"\\\"\"\"",3=>"_COUNTAB"),4=>array(0=>"'",1=>"\\\\",2=>"\\'",3=>"_COUNTAB"),5=>array(0=>"\"",1=>"\\\\",2=>"\\\"",3=>"_COUNTAB"),6=>array(0=>"\x0a",1=>"\x09"),7=>array(0=>"L",1=>"l",2=>"!HEXNUM"),8=>array(0=>".",1=>"L",2=>"l",3=>"j",4=>"J",5=>"e-",6=>"e+",7=>"e",8=>"!NUMBER"),9=>array(0=>"j",1=>"J",2=>"e-",3=>"e+",4=>"e",5=>"!NUMBER"),10=>array(0=>"j",1=>"J",2=>"!NUMBER"));
	$this->ret=11;
	$this->quit=12;
	$this->names=array(0=>"OUT",1=>"KEYWORD",2=>"DOCSTRING1",3=>"DOCSTRING2",4=>"QUOTE1",5=>"QUOTE2",6=>"COMMENT",7=>"NUM_HEXADECIMAL",8=>"NUM_DECIMAL",9=>"NUM_FRACTION",10=>"NUM_EXPONENT",11=>"_RET",12=>"_QUIT");
	$this->data=array(0=>null,1=>null,2=>null,3=>null,4=>null,5=>null,6=>null,7=>null,8=>null,9=>null,10=>null);
	$this->class=array(0=>null,1=>null,2=>"py-docstring",3=>"py-docstring",4=>"py-quote",5=>"py-quote",6=>"py-comment",7=>"py-number",8=>"py-number",9=>"py-number",10=>"py-number");
	$this->keywords=array(0=>"py-keyword",1=>array("and"=>1,"as"=>1,"assert"=>1,"break"=>1,"class"=>1,"continue"=>1,"def"=>1,"del"=>1,"elif"=>1,"else"=>1,"except"=>1,"exec"=>1,"finally"=>1,"for"=>1,"from"=>1,"global"=>1,"if"=>1,"import"=>1,"in"=>1,"is"=>1,"lambda"=>1,"not"=>1,"or"=>1,"pass"=>1,"print"=>1,"raise"=>1,"return"=>1,"try"=>1,"while"=>1,"with"=>1,"yield"=>1,"abs"=>2,"all"=>2,"any"=>2,"apply"=>2,"basestring"=>2,"bool"=>2,"buffer"=>2,"callable"=>2,"chr"=>2,"classmethod"=>2,"cmp"=>2,"coerce"=>2,"compile"=>2,"complex"=>2,"delattr"=>2,"dict"=>2,"dir"=>2,"divmod"=>2,"enumerate"=>2,"eval"=>2,"execfile"=>2,"file"=>2,"filter"=>2,"float"=>2,"frozenset"=>2,"getattr"=>2,"globals"=>2,"hasattr"=>2,"hash"=>2,"hex"=>2,"id"=>2,"input"=>2,"int"=>2,"intern"=>2,"isinstance"=>2,"issubclass"=>2,"iter"=>2,"len"=>2,"list"=>2,"locals"=>2,"long"=>2,"map"=>2,"max"=>2,"min"=>2,"object"=>2,"oct"=>2,"open"=>2,"ord"=>2,"pow"=>2,"property"=>2,"range"=>2,"raw_input"=>2,"reduce"=>2,"reload"=>2,"repr"=>2,"reversed"=>2,"round"=>2,"set"=>2,"setattr"=>2,"slice"=>2,"sorted"=>2,"staticmethod"=>2,"str"=>2,"sum"=>2,"super"=>2,"tuple"=>2,"type"=>2,"unichr"=>2,"unicode"=>2,"vars"=>2,"xrange"=>2,"zip"=>2,"ArithmeticError"=>3,"AssertionError"=>3,"AttributeError"=>3,"BaseException"=>3,"DeprecationWarning"=>3,"EOFError"=>3,"Ellipsis"=>3,"EnvironmentError"=>3,"Exception"=>3,"FloatingPointError"=>3,"FutureWarning"=>3,"GeneratorExit"=>3,"IOError"=>3,"ImportError"=>3,"ImportWarning"=>3,"IndentationError"=>3,"IndexError"=>3,"KeyError"=>3,"KeyboardInterrupt"=>3,"LookupError"=>3,"MemoryError"=>3,"NameError"=>3,"NotImplemented"=>3,"NotImplementedError"=>3,"OSError"=>3,"OverflowError"=>3,"OverflowWarning"=>3,"PendingDeprecationWarning"=>3,"ReferenceError"=>3,"RuntimeError"=>3,"RuntimeWarning"=>3,"StandardError"=>3,"StopIteration"=>3,"SyntaxError"=>3,"SyntaxWarning"=>3,"SystemError"=>3,"SystemExit"=>3,"TabError"=>3,"TypeError"=>3,"UnboundLocalError"=>3,"UnicodeDecodeError"=>3,"UnicodeEncodeError"=>3,"UnicodeError"=>3,"UnicodeTranslateError"=>3,"UnicodeWarning"=>3,"UserWarning"=>3,"ValueError"=>3,"Warning"=>3,"WindowsError"=>3,"ZeroDivisionError"=>3,"BufferType"=>3,"BuiltinFunctionType"=>3,"BuiltinMethodType"=>3,"ClassType"=>3,"CodeType"=>3,"ComplexType"=>3,"DictProxyType"=>3,"DictType"=>3,"DictionaryType"=>3,"EllipsisType"=>3,"FileType"=>3,"FloatType"=>3,"FrameType"=>3,"FunctionType"=>3,"GeneratorType"=>3,"InstanceType"=>3,"IntType"=>3,"LambdaType"=>3,"ListType"=>3,"LongType"=>3,"MethodType"=>3,"ModuleType"=>3,"NoneType"=>3,"ObjectType"=>3,"SliceType"=>3,"StringType"=>3,"StringTypes"=>3,"TracebackType"=>3,"TupleType"=>3,"TypeType"=>3,"UnboundMethodType"=>3,"UnicodeType"=>3,"XRangeType"=>3,"False"=>3,"None"=>3,"True"=>3,"__abs__"=>3,"__add__"=>3,"__all__"=>3,"__author__"=>3,"__bases__"=>3,"__builtins__"=>3,"__call__"=>3,"__class__"=>3,"__cmp__"=>3,"__coerce__"=>3,"__contains__"=>3,"__debug__"=>3,"__del__"=>3,"__delattr__"=>3,"__delitem__"=>3,"__delslice__"=>3,"__dict__"=>3,"__div__"=>3,"__divmod__"=>3,"__doc__"=>3,"__eq__"=>3,"__file__"=>3,"__float__"=>3,"__floordiv__"=>3,"__future__"=>3,"__ge__"=>3,"__getattr__"=>3,"__getattribute__"=>3,"__getitem__"=>3,"__getslice__"=>3,"__gt__"=>3,"__hash__"=>3,"__hex__"=>3,"__iadd__"=>3,"__import__"=>3,"__imul__"=>3,"__init__"=>3,"__int__"=>3,"__invert__"=>3,"__iter__"=>3,"__le__"=>3,"__len__"=>3,"__long__"=>3,"__lshift__"=>3,"__lt__"=>3,"__members__"=>3,"__metaclass__"=>3,"__mod__"=>3,"__mro__"=>3,"__mul__"=>3,"__name__"=>3,"__ne__"=>3,"__neg__"=>3,"__new__"=>3,"__nonzero__"=>3,"__oct__"=>3,"__or__"=>3,"__path__"=>3,"__pos__"=>3,"__pow__"=>3,"__radd__"=>3,"__rdiv__"=>3,"__rdivmod__"=>3,"__reduce__"=>3,"__repr__"=>3,"__rfloordiv__"=>3,"__rlshift__"=>3,"__rmod__"=>3,"__rmul__"=>3,"__ror__"=>3,"__rpow__"=>3,"__rrshift__"=>3,"__rsub__"=>3,"__rtruediv__"=>3,"__rxor__"=>3,"__setattr__"=>3,"__setitem__"=>3,"__setslice__"=>3,"__self__"=>3,"__slots__"=>3,"__str__"=>3,"__sub__"=>3,"__truediv__"=>3,"__version__"=>3,"__xor__"=>3),2=>true);
}

// OUT
function getw0 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p++];
		$c3=$c2.$s[$p];
		if(($c1=="\t"||$c1=="\n")){
			return array(0,$c1,$o,1,$i-$start);
		}
		if(ctype_alpha($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		if($c1=="_"){
			return array(2,"_",$o,1,$i-$start);
		}
		if($c3=="'''"){
			return array(3,"'''",$o,3,$i-$start);
		}
		if($c3=="\"\"\""){
			return array(4,"\"\"\"",$o,3,$i-$start);
		}
		if($c1=="'"){
			return array(5,"'",$o,1,$i-$start);
		}
		if($c1=="\""){
			return array(6,"\"",$o,1,$i-$start);
		}
		if($c1=="#"){
			return array(7,"#",$o,1,$i-$start);
		}
		if($c2=="0x"){
			return array(8,"0x",$o,2,$i-$start);
		}
		if($c2=="0X"){
			return array(9,"0X",$o,2,$i-$start);
		}
		if($c1=='.'&&ctype_digit($c2[1])){
			return array(10,$c1,$o,2,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(11,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// KEYWORD
function getw1 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(!($c1=='_'||ctype_alnum($c1))){
			return array(0,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// DOCSTRING1
function getw2 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p++];
		$c3=$c2.$s[$p++];
		$c4=$c3.$s[$p];
		if($c3=="'''"){
			return array(0,"'''",$o,3,$i-$start);
		}
		if($c2=="\\\\"){
			return array(1,"\\\\",$o,2,$i-$start);
		}
		if($c4=="\\'''"){
			return array(2,"\\'''",$o,4,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(3,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// DOCSTRING2
function getw3 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p++];
		$c3=$c2.$s[$p++];
		$c4=$c3.$s[$p];
		if($c3=="\"\"\""){
			return array(0,"\"\"\"",$o,3,$i-$start);
		}
		if($c2=="\\\\"){
			return array(1,"\\\\",$o,2,$i-$start);
		}
		if($c4=="\\\"\"\""){
			return array(2,"\\\"\"\"",$o,4,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(3,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// QUOTE1
function getw4 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c1=="'"){
			return array(0,"'",$o,1,$i-$start);
		}
		if($c2=="\\\\"){
			return array(1,"\\\\",$o,2,$i-$start);
		}
		if($c2=="\\'"){
			return array(2,"\\'",$o,2,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(3,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// QUOTE2
function getw5 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c1=="\""){
			return array(0,"\"",$o,1,$i-$start);
		}
		if($c2=="\\\\"){
			return array(1,"\\\\",$o,2,$i-$start);
		}
		if($c2=="\\\""){
			return array(2,"\\\"",$o,2,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(3,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// COMMENT
function getw6 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		if($c1=="\x09"){
			return array(1,"\x09",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// NUM_HEXADECIMAL
function getw7 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="L"){
			return array(0,"L",$o,1,$i-$start);
		}
		if($c1=="l"){
			return array(1,"l",$o,1,$i-$start);
		}
		if(!ctype_xdigit($c1)){
			return array(2,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// NUM_DECIMAL
function getw8 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c1=="."){
			return array(0,".",$o,1,$i-$start);
		}
		if($c1=="L"){
			return array(1,"L",$o,1,$i-$start);
		}
		if($c1=="l"){
			return array(2,"l",$o,1,$i-$start);
		}
		if($c1=="j"){
			return array(3,"j",$o,1,$i-$start);
		}
		if($c1=="J"){
			return array(4,"J",$o,1,$i-$start);
		}
		if($c2=="e-"){
			return array(5,"e-",$o,2,$i-$start);
		}
		if($c2=="e+"){
			return array(6,"e+",$o,2,$i-$start);
		}
		if($c1=="e"){
			return array(7,"e",$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(8,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// NUM_FRACTION
function getw9 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c1=="j"){
			return array(0,"j",$o,1,$i-$start);
		}
		if($c1=="J"){
			return array(1,"J",$o,1,$i-$start);
		}
		if($c2=="e-"){
			return array(2,"e-",$o,2,$i-$start);
		}
		if($c2=="e+"){
			return array(3,"e+",$o,2,$i-$start);
		}
		if($c1=="e"){
			return array(4,"e",$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(5,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// NUM_EXPONENT
function getw10 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="j"){
			return array(0,"j",$o,1,$i-$start);
		}
		if($c1=="J"){
			return array(1,"J",$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(2,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

}
