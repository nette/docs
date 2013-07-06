<?php
/* --------------------------------------------------------------- *
 *        WARNING: ALL CHANGES IN THIS FILE WILL BE LOST
 *
 *   Source language file: W:\fshl/lang/CPP_lang.php
 *       Language version: 1.2 (Sign:SHL)
 *
 *            Target file: W:\fshl/fshl_cache/CPP_lang.php
 *             Build date: Mon 24.1.2011 18:17:43
 *
 *      Generator version: 0.4.11
 * --------------------------------------------------------------- */
class CPP_lang
{
var $trans,$flags,$data,$delim,$class,$keywords;
var $version,$signature,$initial_state,$ret,$quit;
var $pt,$pti,$generator_version;
var $names;

function CPP_lang () {
	$this->version=1.2;
	$this->signature="SHL";
	$this->generator_version="0.4.11";
	$this->initial_state=0;
	$this->trans=array(0=>array(0=>array(0=>0,1=>0),1=>array(0=>1,1=>-1),2=>array(0=>10,1=>0),3=>array(0=>6,1=>0),4=>array(0=>2,1=>0),5=>array(0=>4,1=>0),6=>array(0=>7,1=>0),7=>array(0=>8,1=>0),8=>array(0=>9,1=>0)),1=>array(0=>array(0=>11,1=>0)),2=>array(0=>array(0=>3,1=>0),1=>array(0=>5,1=>0),2=>array(0=>4,1=>0),3=>array(0=>11,1=>1)),3=>array(0=>array(0=>3,1=>0),1=>array(0=>3,1=>0),2=>array(0=>11,1=>1)),4=>array(0=>array(0=>4,1=>0),1=>array(0=>11,1=>1)),5=>array(0=>array(0=>5,1=>0),1=>array(0=>11,1=>1)),6=>array(0=>array(0=>6,1=>0),1=>array(0=>6,1=>0),2=>array(0=>6,1=>0),3=>array(0=>11,1=>0)),7=>array(0=>array(0=>7,1=>0),1=>array(0=>7,1=>0),2=>array(0=>7,1=>0),3=>array(0=>11,1=>0)),8=>array(0=>array(0=>8,1=>0),1=>array(0=>11,1=>0),2=>array(0=>8,1=>0)),9=>array(0=>array(0=>9,1=>0),1=>array(0=>11,1=>0)),10=>array(0=>array(0=>11,1=>0),1=>array(0=>10,1=>0)));
	$this->flags=array(0=>0,1=>5,2=>4,3=>0,4=>4,5=>0,6=>4,7=>4,8=>4,9=>4,10=>4);
	$this->delim=array(0=>array(0=>"_COUNTAB",1=>"ALPHA",2=>"//",3=>"#",4=>"NUMBER",5=>"DOT_NUMBER",6=>"\"",7=>"'",8=>"/*"),1=>array(0=>"!SAFECHAR"),2=>array(0=>"NUMBER",1=>"x",2=>".",3=>"!NUMBER"),3=>array(0=>".",1=>"f",2=>"!NUMBER"),4=>array(0=>"f",1=>"!NUMBER"),5=>array(0=>"L",1=>"!HEXNUM"),6=>array(0=>"\\\x0a",1=>"\x09",2=>"\\\x0d\x0a",3=>"\x0a"),7=>array(0=>"\\\\",1=>"\\\"",2=>"_COUNTAB",3=>"\""),8=>array(0=>"\\'",1=>"'",2=>"_COUNTAB"),9=>array(0=>"_COUNTAB",1=>"*/"),10=>array(0=>"\x0a",1=>"\x09"));
	$this->ret=11;
	$this->quit=12;
	$this->names=array(0=>"OUT",1=>"KEYWORD",2=>"NUM",3=>"DEC_NUM",4=>"FLOAT_NUM",5=>"HEX_NUM",6=>"PREPROC",7=>"QUOTE1",8=>"QUOTE2",9=>"COMMENT1",10=>"COMMENT2",11=>"_RET",12=>"_QUIT");
	$this->data=array(0=>null,1=>null,2=>null,3=>null,4=>null,5=>null,6=>null,7=>null,8=>null,9=>null,10=>null);
	$this->class=array(0=>null,1=>null,2=>"cpp-num",3=>"cpp-num",4=>"cpp-num",5=>"cpp-num",6=>"cpp-preproc",7=>"cpp-quote",8=>"cpp-quote",9=>"cpp-comment",10=>"cpp-comment");
	$this->keywords=array(0=>"cpp-keywords",1=>array("bool"=>1,"break"=>1,"case"=>1,"catch"=>1,"char"=>1,"class"=>1,"const"=>1,"const_cast"=>1,"continue"=>1,"default"=>1,"delete"=>1,"deprecated"=>1,"dllexport"=>1,"dllimport"=>1,"do"=>1,"double"=>1,"dynamic_cast"=>1,"else"=>1,"enum"=>1,"explicit"=>1,"extern"=>1,"false"=>1,"float"=>1,"for"=>1,"friend"=>1,"goto"=>1,"if"=>1,"inline"=>1,"int"=>1,"long"=>1,"mutable"=>1,"naked"=>1,"namespace"=>1,"new"=>1,"noinline"=>1,"noreturn"=>1,"nothrow"=>1,"novtable"=>1,"operator"=>1,"private"=>1,"property"=>1,"protected"=>1,"public"=>1,"register"=>1,"reinterpret_cast"=>1,"return"=>1,"selectany"=>1,"short"=>1,"signed"=>1,"sizeof"=>1,"static"=>1,"static_cast"=>1,"struct"=>1,"switch"=>1,"template"=>1,"this"=>1,"thread"=>1,"throw"=>1,"true"=>1,"try"=>1,"typedef"=>1,"typeid"=>1,"typename"=>1,"union"=>1,"unsigned"=>1,"using"=>1,"uuid"=>1,"virtual"=>1,"void"=>1,"volatile"=>1,"__wchar_t"=>1,"wchar_t"=>1,"while"=>1,"__abstract"=>1,"__alignof"=>1,"__asm"=>1,"__assume"=>1,"__based"=>1,"__box"=>1,"__cdecl"=>1,"__declspec"=>1,"__delegate"=>1,"__event"=>1,"__except"=>1,"__fastcall"=>1,"__finally"=>1,"__forceinline"=>1,"__gc"=>1,"__hook"=>1,"__identifier"=>1,"__if_exists"=>1,"__if_not_exists"=>1,"__inline"=>1,"__int8"=>1,"__int16"=>1,"__int32"=>1,"__int64"=>1,"__interface"=>1,"__leave"=>1,"__m64"=>1,"__m128"=>1,"__m128d"=>1,"__m128i"=>1,"__multiple_inheritance"=>1,"__nogc"=>1,"__noop"=>1,"__pin"=>1,"__property"=>1,"__raise"=>1,"__sealed"=>1,"__single_inheritance"=>1,"__stdcall"=>1,"__super"=>1,"__try_cast"=>1,"__try"=>1,"__unhook"=>1,"__uuidof"=>1,"__value"=>1,"__virtual_inheritance"=>1,"__w64"=>1),2=>true);
}

// OUT
function getw0 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if(($c1=="\t"||$c1=="\n")){
			return array(0,$c1,$o,1,$i-$start);
		}
		if(ctype_alpha($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		if($c2=="//"){
			return array(2,"//",$o,2,$i-$start);
		}
		if($c1=="#"){
			return array(3,"#",$o,1,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(4,$c1,$o,1,$i-$start);
		}
		if($c1=='.'&&ctype_digit($c2[1])){
			return array(5,$c1,$o,2,$i-$start);
		}
		if($c1=="\""){
			return array(6,"\"",$o,1,$i-$start);
		}
		if($c1=="'"){
			return array(7,"'",$o,1,$i-$start);
		}
		if($c2=="/*"){
			return array(8,"/*",$o,2,$i-$start);
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

// NUM
function getw2 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(ctype_digit($c1)){
			return array(0,$c1,$o,1,$i-$start);
		}
		if($c1=="x"){
			return array(1,"x",$o,1,$i-$start);
		}
		if($c1=="."){
			return array(2,".",$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(3,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// DEC_NUM
function getw3 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="."){
			return array(0,".",$o,1,$i-$start);
		}
		if($c1=="f"){
			return array(1,"f",$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(2,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// FLOAT_NUM
function getw4 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="f"){
			return array(0,"f",$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// HEX_NUM
function getw5 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="L"){
			return array(0,"L",$o,1,$i-$start);
		}
		if(!ctype_xdigit($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// PREPROC
function getw6 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p++];
		$c3=$c2.$s[$p];
		if($c2=="\\\x0a"){
			return array(0,"\\\x0a",$o,2,$i-$start);
		}
		if($c1=="\x09"){
			return array(1,"\x09",$o,1,$i-$start);
		}
		if($c3=="\\\x0d\x0a"){
			return array(2,"\\\x0d\x0a",$o,3,$i-$start);
		}
		if($c1=="\x0a"){
			return array(3,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// QUOTE1
function getw7 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c2=="\\\\"){
			return array(0,"\\\\",$o,2,$i-$start);
		}
		if($c2=="\\\""){
			return array(1,"\\\"",$o,2,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(2,$c1,$o,1,$i-$start);
		}
		if($c1=="\""){
			return array(3,"\"",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// QUOTE2
function getw8 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c2=="\\'"){
			return array(0,"\\'",$o,2,$i-$start);
		}
		if($c1=="'"){
			return array(1,"'",$o,1,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(2,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// COMMENT1
function getw9 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if(($c1=="\t"||$c1=="\n")){
			return array(0,$c1,$o,1,$i-$start);
		}
		if($c2=="*/"){
			return array(1,"*/",$o,2,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// COMMENT2
function getw10 (&$s, $i, $l) {
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

}
