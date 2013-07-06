<?php
/* --------------------------------------------------------------- *
 *        WARNING: ALL CHANGES IN THIS FILE WILL BE LOST
 *
 *   Source language file: W:\_libs\fshl\fshl/lang/NEON_lang.php
 *       Language version: 1.2 (Sign:SHL)
 *
 *            Target file: W:\_libs\fshl\fshl/fshl_cache/NEON_lang.php
 *             Build date: Fri 27.1.2012 17:40:42
 *
 *      Generator version: 0.4.11
 * --------------------------------------------------------------- */
class NEON_lang
{
var $trans,$flags,$data,$delim,$class,$keywords;
var $version,$signature,$initial_state,$ret,$quit;
var $pt,$pti,$generator_version;
var $names;

function NEON_lang () {
	$this->version=1.2;
	$this->signature="SHL";
	$this->generator_version="0.4.11";
	$this->initial_state=0;
	$this->trans=array(0=>array(0=>array(0=>0,1=>0),1=>array(0=>1,1=>-1),2=>array(0=>1,1=>-1),3=>array(0=>1,1=>-1),4=>array(0=>1,1=>-1),5=>array(0=>1,1=>-1),6=>array(0=>1,1=>-1),7=>array(0=>1,1=>-1),8=>array(0=>1,1=>-1),9=>array(0=>1,1=>-1),10=>array(0=>2,1=>0),11=>array(0=>5,1=>0),12=>array(0=>6,1=>0),13=>array(0=>7,1=>0)),1=>array(0=>array(0=>8,1=>0)),2=>array(0=>array(0=>4,1=>0),1=>array(0=>3,1=>0),2=>array(0=>8,1=>1),3=>array(0=>3,1=>0)),3=>array(0=>array(0=>3,1=>0),1=>array(0=>8,1=>1)),4=>array(0=>array(0=>8,1=>1)),5=>array(0=>array(0=>8,1=>0)),6=>array(0=>array(0=>8,1=>0)),7=>array(0=>array(0=>8,1=>0),1=>array(0=>7,1=>0)),9=>null);
	$this->flags=array(0=>0,1=>4,2=>4,3=>0,4=>0,5=>4,6=>4,7=>4,9=>8);
	$this->delim=array(0=>array(0=>"_COUNTAB",1=>".",2=>":",3=>"=",4=>"(",5=>")",6=>"{",7=>"}",8=>"[",9=>"]",10=>"NUMBER",11=>"\"",12=>"'",13=>"#"),1=>array(0=>"!SAFECHAR"),2=>array(0=>"x",1=>".",2=>"!NUMBER",3=>"NUMBER"),3=>array(0=>".",1=>"!NUMBER"),4=>array(0=>"!HEXNUM"),5=>array(0=>"\""),6=>array(0=>"'"),7=>array(0=>"\x0a",1=>"_COUNTAB"),9=>null);
	$this->ret=8;
	$this->quit=9;
	$this->names=array(0=>"OUT",1=>"SYMBOL",2=>"NUM",3=>"DEC_NUM",4=>"HEX_NUM",5=>"QUOTE1",6=>"QUOTE2",7=>"COMMENT2",8=>"_RET",9=>"_QUIT");
	$this->data=array(0=>null,1=>null,2=>null,3=>null,4=>null,5=>null,6=>null,7=>null,9=>null);
	$this->class=array(0=>"js-out",1=>"",2=>"js-num",3=>"js-num",4=>"js-num",5=>"js-quote",6=>"js-quote",7=>"js-comment",9=>"html-tag");
	$this->keywords=null;
}

// OUT
function getw0 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(($c1=="\t"||$c1=="\n")){
			return array(0,$c1,$o,1,$i-$start);
		}
		if($c1=="."){
			return array(1,".",$o,1,$i-$start);
		}
		if($c1==":"){
			return array(2,":",$o,1,$i-$start);
		}
		if($c1=="="){
			return array(3,"=",$o,1,$i-$start);
		}
		if($c1=="("){
			return array(4,"(",$o,1,$i-$start);
		}
		if($c1==")"){
			return array(5,")",$o,1,$i-$start);
		}
		if($c1=="{"){
			return array(6,"{",$o,1,$i-$start);
		}
		if($c1=="}"){
			return array(7,"}",$o,1,$i-$start);
		}
		if($c1=="["){
			return array(8,"[",$o,1,$i-$start);
		}
		if($c1=="]"){
			return array(9,"]",$o,1,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(10,$c1,$o,1,$i-$start);
		}
		if($c1=="\""){
			return array(11,"\"",$o,1,$i-$start);
		}
		if($c1=="'"){
			return array(12,"'",$o,1,$i-$start);
		}
		if($c1=="#"){
			return array(13,"#",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// SYMBOL
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
		if($c1=="x"){
			return array(0,"x",$o,1,$i-$start);
		}
		if($c1=="."){
			return array(1,".",$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(2,$c1,$o,1,$i-$start);
		}
		if(ctype_digit($c1)){
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
		if(!ctype_digit($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// HEX_NUM
function getw4 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(!ctype_xdigit($c1)){
			return array(0,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// QUOTE1
function getw5 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\""){
			return array(0,"\"",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// QUOTE2
function getw6 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="'"){
			return array(0,"'",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// COMMENT2
function getw7 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(1,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

}
