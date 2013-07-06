<?php
/* --------------------------------------------------------------- *
 *        WARNING: ALL CHANGES IN THIS FILE WILL BE LOST
 *
 *   Source language file: W:\fshl/lang/JAVA_lang.php
 *       Language version: 1.2 (Sign:SHL)
 *
 *            Target file: W:\fshl/fshl_cache/JAVA_lang.php
 *             Build date: Mon 24.1.2011 18:17:43
 *
 *      Generator version: 0.4.11
 * --------------------------------------------------------------- */
class JAVA_lang
{
var $trans,$flags,$data,$delim,$class,$keywords;
var $version,$signature,$initial_state,$ret,$quit;
var $pt,$pti,$generator_version;
var $names;

function JAVA_lang () {
	$this->version=1.2;
	$this->signature="SHL";
	$this->generator_version="0.4.11";
	$this->initial_state=0;
	$this->trans=array(0=>array(0=>array(0=>1,1=>-1),1=>array(0=>2,1=>0),2=>array(0=>5,1=>0),3=>array(0=>6,1=>0),4=>array(0=>7,1=>0),5=>array(0=>8,1=>0),6=>array(0=>0,1=>0)),1=>array(0=>array(0=>9,1=>0)),2=>array(0=>array(0=>4,1=>0),1=>array(0=>3,1=>0),2=>array(0=>3,1=>0),3=>array(0=>9,1=>1)),3=>array(0=>array(0=>3,1=>0),1=>array(0=>9,1=>1)),4=>array(0=>array(0=>9,1=>1)),5=>array(0=>array(0=>5,1=>0),1=>array(0=>5,1=>0),2=>array(0=>5,1=>0),3=>array(0=>9,1=>0)),6=>array(0=>array(0=>6,1=>0),1=>array(0=>6,1=>0),2=>array(0=>6,1=>0),3=>array(0=>9,1=>0)),7=>array(0=>array(0=>9,1=>0),1=>array(0=>7,1=>0)),8=>array(0=>array(0=>9,1=>0),1=>array(0=>8,1=>0)));
	$this->flags=array(0=>0,1=>5,2=>4,3=>0,4=>0,5=>4,6=>4,7=>4,8=>4);
	$this->delim=array(0=>array(0=>"ALPHA",1=>"NUMBER",2=>"\"",3=>"'",4=>"/*",5=>"//",6=>"_COUNTAB"),1=>array(0=>"!SAFECHAR"),2=>array(0=>"x",1=>".",2=>"NUMBER",3=>"!NUMBER"),3=>array(0=>".",1=>"!NUMBER"),4=>array(0=>"!HEXNUM"),5=>array(0=>"\\\\",1=>"\\\"",2=>"_COUNTAB",3=>"\""),6=>array(0=>"\\\\",1=>"\\'",2=>"_COUNTAB",3=>"'"),7=>array(0=>"*/",1=>"_COUNTAB"),8=>array(0=>"\x0a",1=>"\x09"));
	$this->ret=9;
	$this->quit=10;
	$this->names=array(0=>"OUT",1=>"KEYWORD",2=>"NUM",3=>"DEC_NUM",4=>"HEX_NUM",5=>"QUOTE1",6=>"QUOTE2",7=>"COMMENT1",8=>"COMMENT2",9=>"_RET",10=>"_QUIT");
	$this->data=array(0=>null,1=>null,2=>null,3=>null,4=>null,5=>null,6=>null,7=>null,8=>null);
	$this->class=array(0=>null,1=>null,2=>"java-num",3=>"java-num",4=>"java-num",5=>"java-quote",6=>"java-quote",7=>"java-comment",8=>"java-comment");
	$this->keywords=array(0=>"java-keywords",1=>array("abstract"=>1,"double"=>1,"int"=>1,"strictfp"=>1,"boolean"=>1,"else"=>1,"interface"=>1,"super"=>1,"break"=>1,"extends"=>1,"long"=>1,"switch"=>1,"byte"=>1,"final"=>1,"native"=>1,"synchronized"=>1,"case"=>1,"finally"=>1,"new"=>1,"this"=>1,"catch"=>1,"float"=>1,"package"=>1,"throw"=>1,"char"=>1,"for"=>1,"private"=>1,"throws"=>1,"class"=>1,"goto"=>1,"protected"=>1,"transient"=>1,"const"=>1,"if"=>1,"public"=>1,"try"=>1,"continue"=>1,"implements"=>1,"return"=>1,"void"=>1,"default"=>1,"import"=>1,"short"=>1,"volatile"=>1,"do"=>1,"instanceof"=>1,"static"=>1,"while"=>1),2=>true);
}

// OUT
function getw0 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if(ctype_alpha($c1)){
			return array(0,$c1,$o,1,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		if($c1=="\""){
			return array(2,"\"",$o,1,$i-$start);
		}
		if($c1=="'"){
			return array(3,"'",$o,1,$i-$start);
		}
		if($c2=="/*"){
			return array(4,"/*",$o,2,$i-$start);
		}
		if($c2=="//"){
			return array(5,"//",$o,2,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(6,$c1,$o,1,$i-$start);
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
		if($c1=="x"){
			return array(0,"x",$o,1,$i-$start);
		}
		if($c1=="."){
			return array(1,".",$o,1,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(2,$c1,$o,1,$i-$start);
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
function getw6 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c2=="\\\\"){
			return array(0,"\\\\",$o,2,$i-$start);
		}
		if($c2=="\\'"){
			return array(1,"\\'",$o,2,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(2,$c1,$o,1,$i-$start);
		}
		if($c1=="'"){
			return array(3,"'",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// COMMENT1
function getw7 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c2=="*/"){
			return array(0,"*/",$o,2,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(1,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// COMMENT2
function getw8 (&$s, $i, $l) {
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
