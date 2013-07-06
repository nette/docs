<?php
/* --------------------------------------------------------------- *
 *        WARNING: ALL CHANGES IN THIS FILE WILL BE LOST
 *
 *   Source language file: W:\fshl/lang/SQL_lang.php
 *       Language version: 1.0 (Sign:SHL)
 *
 *            Target file: W:\fshl/fshl_cache/SQL_lang.php
 *             Build date: Mon 24.1.2011 18:17:43
 *
 *      Generator version: 0.4.11
 * --------------------------------------------------------------- */
class SQL_lang
{
var $trans,$flags,$data,$delim,$class,$keywords;
var $version,$signature,$initial_state,$ret,$quit;
var $pt,$pti,$generator_version;
var $names;

function SQL_lang () {
	$this->version=1.0;
	$this->signature="SHL";
	$this->generator_version="0.4.11";
	$this->initial_state=0;
	$this->trans=array(0=>array(0=>array(0=>2,1=>0),1=>array(0=>3,1=>0),2=>array(0=>3,1=>0),3=>array(0=>3,1=>0),4=>array(0=>4,1=>0),5=>array(0=>5,1=>0),6=>array(0=>6,1=>0),7=>array(0=>1,1=>-1),8=>array(0=>7,1=>0),9=>array(0=>0,1=>0)),1=>array(0=>array(0=>11,1=>1)),2=>array(0=>array(0=>11,1=>0),1=>array(0=>2,1=>0)),3=>array(0=>array(0=>11,1=>0),1=>array(0=>3,1=>0)),4=>array(0=>array(0=>4,1=>0),1=>array(0=>11,1=>0),2=>array(0=>4,1=>0)),5=>array(0=>array(0=>5,1=>0),1=>array(0=>11,1=>0),2=>array(0=>5,1=>0)),6=>array(0=>array(0=>6,1=>0),1=>array(0=>11,1=>0),2=>array(0=>6,1=>0)),7=>array(0=>array(0=>9,1=>0),1=>array(0=>8,1=>0),2=>array(0=>11,1=>1)),8=>array(0=>array(0=>11,1=>1)),9=>array(0=>array(0=>11,1=>1)),10=>array(0=>array(0=>10,1=>0),1=>array(0=>10,1=>0),2=>array(0=>10,1=>0),3=>array(0=>10,1=>0),4=>array(0=>10,1=>0)));
	$this->flags=array(0=>1,1=>5,2=>4,3=>4,4=>4,5=>4,6=>4,7=>4,8=>0,9=>0,10=>4);
	$this->delim=array(0=>array(0=>"/*",1=>"//",2=>"#",3=>"--",4=>"\"",5=>"'",6=>"`",7=>"ALPHA",8=>"NUMBER",9=>"_COUNTAB"),1=>array(0=>"!SAFECHAR"),2=>array(0=>"*/",1=>"_COUNTAB"),3=>array(0=>"\x0a",1=>"_COUNTAB"),4=>array(0=>"\\\"",1=>"\"",2=>"_COUNTAB"),5=>array(0=>"\\'",1=>"'",2=>"_COUNTAB"),6=>array(0=>"\\`",1=>"`",2=>"_COUNTAB"),7=>array(0=>"x",1=>"NUMBER",2=>"!NUMBER"),8=>array(0=>"!NUMBER"),9=>array(0=>"!HEXNUM"),10=>array(0=>"BLOB",1=>"TEXT",2=>"INTEGER",3=>"CHAR",4=>"DATE"));
	$this->ret=11;
	$this->quit=12;
	$this->names=array(0=>"OUT",1=>"FUNCTION",2=>"COMMENT",3=>"COMMENT1",4=>"QUOTE",5=>"QUOTE1",6=>"QUOTE3",7=>"NUM",8=>"DEC_NUM",9=>"HEX_NUM",10=>"OPTION",11=>"_RET",12=>"_QUIT");
	$this->data=array(0=>null,1=>null,2=>null,3=>null,4=>null,5=>null,6=>null,7=>null,8=>null,9=>null,10=>null);
	$this->class=array(0=>null,1=>null,2=>"sql-comment",3=>"sql-comment",4=>"sql-value",5=>"sql-value",6=>"sql-value",7=>"sql-num",8=>"sql-num",9=>"sql-num",10=>"sql-option");
	$this->keywords=array(0=>"sql-keyword",1=>array("a"=>1,"abs"=>2,"acos"=>2,"add"=>1,"add_months"=>1,"after"=>1,"all"=>1,"alter"=>1,"an"=>1,"and"=>1,"any"=>1,"array"=>1,"as"=>1,"asc"=>1,"ascii"=>2,"asin"=>2,"atan"=>2,"atan2"=>2,"avg"=>2,"before"=>1,"begin"=>1,"between"=>1,"bigint"=>3,"binary"=>1,"bind"=>1,"binding"=>1,"bit"=>1,"by"=>1,"call"=>1,"cascade"=>1,"case"=>1,"cast"=>1,"ceiling"=>2,"char"=>3,"char_length"=>2,"character"=>2,"character_length"=>2,"chartorowid"=>1,"check"=>1,"chr"=>1,"cleanup"=>1,"close"=>1,"clustered"=>1,"coalesce"=>1,"colgroup"=>1,"collate"=>1,"commit"=>1,"complex"=>1,"compress"=>1,"concat"=>2,"connect"=>1,"constraint"=>1,"contains"=>1,"continue"=>1,"convert"=>1,"cos"=>2,"count"=>2,"create"=>1,"cross"=>1,"curdate"=>2,"current"=>1,"cursor"=>1,"curtime"=>2,"cvar"=>1,"database"=>1,"datapages"=>1,"date"=>2,"dayname"=>2,"dayofmonth"=>2,"dayofweek"=>2,"dayofyear"=>2,"db_name"=>1,"dba"=>1,"dec"=>3,"decimal"=>3,"declaration"=>1,"declare"=>1,"decode"=>2,"default"=>1,"definition"=>1,"degrees"=>1,"delete"=>1,"desc"=>1,"describe"=>1,"descriptor"=>1,"dhtype"=>1,"difference"=>1,"distinct"=>1,"double"=>3,"drop"=>1,"each"=>1,"else"=>1,"end"=>1,"escape"=>1,"exclusive"=>1,"exec"=>1,"execute"=>1,"exists"=>1,"exit"=>1,"exp"=>2,"explicit"=>1,"extent"=>1,"fetch"=>1,"field file"=>1,"float"=>3,"floor"=>2,"for"=>1,"foreign"=>1,"found"=>1,"from"=>1,"full"=>1,"go"=>1,"goto"=>1,"grant"=>1,"greatest"=>2,"group"=>1,"hash"=>1,"having"=>1,"hour"=>1,"identified"=>1,"ifnull"=>2,"immediate"=>1,"in"=>1,"index"=>1,"indexpages"=>1,"indicator"=>1,"initcap"=>1,"inner"=>1,"inout"=>1,"input"=>1,"insert"=>1,"instr"=>1,"int"=>3,"integer"=>3,"interface"=>1,"intersect"=>1,"into"=>1,"is"=>1,"isnull"=>2,"join"=>1,"key"=>1,"last_day"=>2,"lcase"=>2,"least"=>2,"left"=>2,"length"=>2,"like"=>1,"link"=>1,"list"=>1,"locate"=>1,"lock"=>1,"log"=>2,"log10"=>2,"long"=>1,"longblob"=>3,"longtext"=>3,"lower"=>1,"lpad"=>1,"ltrim"=>2,"lvarbinary"=>1,"lvarchar"=>1,"main"=>1,"max"=>2,"metadata_only"=>1,"min"=>2,"minus"=>2,"minute"=>2,"mod"=>2,"mode"=>1,"modify"=>1,"money"=>1,"month"=>2,"monthname"=>2,"months_between"=>2,"name"=>1,"national"=>1,"natural"=>1,"nchar"=>1,"newrow"=>1,"next_day"=>1,"nocompress"=>1,"not"=>1,"now"=>1,"nowait"=>1,"null"=>1,"nullif"=>1,"nullvalue"=>1,"number"=>1,"numeric"=>1,"nvl"=>1,"object_id"=>1,"odbc_convert"=>1,"odbcinfo"=>1,"of"=>1,"oldrow"=>1,"on"=>1,"open"=>1,"option"=>1,"or"=>1,"order"=>1,"out"=>1,"outer"=>1,"output"=>1,"pctfree"=>1,"pi"=>1,"power"=>1,"precision"=>1,"prefix"=>1,"prepare"=>1,"primary"=>1,"privileges"=>1,"procedure"=>1,"public"=>1,"quarter"=>2,"radians"=>2,"rand"=>2,"range"=>2,"raw"=>1,"real"=>3,"record"=>1,"references"=>1,"referencing"=>1,"rename"=>1,"repeat"=>2,"replace"=>1,"resource"=>1,"restrict"=>1,"result"=>1,"return"=>2,"revoke"=>2,"right"=>2,"rollback"=>1,"row"=>2,"rowid"=>2,"rowidtochar"=>2,"rownum"=>2,"rpad"=>2,"rtrim"=>2,"searched_case"=>1,"second"=>1,"section"=>1,"select"=>1,"service"=>1,"set"=>1,"share"=>1,"short"=>1,"sign"=>1,"simple_case"=>1,"sin"=>2,"size"=>2,"smallint"=>3,"some"=>1,"soundex"=>1,"space"=>1,"sql"=>1,"sql_bigint"=>3,"sql_binary"=>3,"sql_bit"=>3,"sql_char"=>3,"sql_date"=>3,"sql_decimal"=>3,"sql_double"=>3,"sql_float"=>1,"sql_integer"=>3,"sql_longvarbinary"=>3,"sql_longvarchar"=>3,"sql_numeric"=>3,"sql_real"=>3,"sql_smallint"=>3,"sql_time"=>3,"sql_timestamp"=>1,"sql_tinyint"=>3,"sql_tsi_day"=>3,"sql_tsi_frac_second"=>3,"sql_tsi_hour"=>3,"sql_tsi_minute"=>3,"sql_tsi_month"=>3,"sql_tsi_quarter"=>3,"sql_tsi_second"=>3,"sql_tsi_week"=>3,"sql_tsi_year"=>3,"sql_varbinary"=>3,"sql_varchar"=>3,"sqlerror"=>1,"sqlwarning"=>1,"sqrt"=>1,"start"=>1,"statement"=>1,"statistics"=>1,"stop"=>1,"storage_attributes"=>1,"storage_manager"=>1,"store_in_progress"=>1,"substr"=>2,"substring"=>2,"suffix"=>2,"sum"=>2,"suser_name"=>2,"synonym"=>2,"sysdate"=>2,"systime"=>2,"systimestamp"=>2,"table"=>1,"tan"=>2,"then"=>1,"time"=>2,"timeout"=>2,"timestamp"=>3,"timestampadd"=>2,"timestampdiff"=>2,"tinyint"=>3,"to"=>2,"to_char"=>2,"to_date"=>2,"to_number"=>2,"to_time"=>2,"to_timestamp"=>2,"tpe"=>1,"transaction"=>1,"translate"=>1,"trigger"=>1,"type"=>1,"ucase"=>1,"uid"=>1,"union"=>1,"unique"=>1,"unsigned"=>1,"update"=>1,"upper"=>1,"user"=>1,"user_id"=>1,"user_name"=>1,"using"=>1,"uuid"=>1,"values"=>1,"varbinary"=>1,"varchar"=>3,"variables"=>1,"varying"=>1,"version"=>1,"view"=>1,"week"=>2,"when"=>1,"whenever"=>1,"where"=>1,"with"=>1,"work"=>1,"year"=>1,"blob"=>3,"text"=>3,"string"=>3,"boolean"=>3,"longvarchar"=>3,"java_object"=>3,"longvarbinary"=>3,"tran"=>1,"top"=>1,"mediumint"=>3),2=>false);
}

// OUT
function getw0 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c2=="/*"){
			return array(0,"/*",$o,2,$i-$start);
		}
		if($c2=="//"){
			return array(1,"//",$o,2,$i-$start);
		}
		if($c1=="#"){
			return array(2,"#",$o,1,$i-$start);
		}
		if($c2=="--"){
			return array(3,"--",$o,2,$i-$start);
		}
		if($c1=="\""){
			return array(4,"\"",$o,1,$i-$start);
		}
		if($c1=="'"){
			return array(5,"'",$o,1,$i-$start);
		}
		if($c1=="`"){
			return array(6,"`",$o,1,$i-$start);
		}
		if(ctype_alpha($c1)){
			return array(7,$c1,$o,1,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(8,$c1,$o,1,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(9,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// FUNCTION
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

// COMMENT
function getw2 (&$s, $i, $l) {
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

// COMMENT1
function getw3 (&$s, $i, $l) {
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

// QUOTE
function getw4 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c2=="\\\""){
			return array(0,"\\\"",$o,2,$i-$start);
		}
		if($c1=="\""){
			return array(1,"\"",$o,1,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(2,$c1,$o,1,$i-$start);
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

// QUOTE3
function getw6 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p];
		if($c2=="\\`"){
			return array(0,"\\`",$o,2,$i-$start);
		}
		if($c1=="`"){
			return array(1,"`",$o,1,$i-$start);
		}
		if(($c1=="\t"||$c1=="\n")){
			return array(2,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// NUM
function getw7 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="x"){
			return array(0,"x",$o,1,$i-$start);
		}
		if(ctype_digit($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		if(!ctype_digit($c1)){
			return array(2,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// DEC_NUM
function getw8 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if(!ctype_digit($c1)){
			return array(0,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// HEX_NUM
function getw9 (&$s, $i, $l) {
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

// OPTION
function getw10 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p++];
		$c3=$c2.$s[$p++];
		$c4=$c3.$s[$p++];
		$c5=$c4.$s[$p++];
		$c6=$c5.$s[$p++];
		$c7=$c6.$s[$p];
		if($c4=="BLOB"){
			return array(0,"BLOB",$o,4,$i-$start);
		}
		if($c4=="TEXT"){
			return array(1,"TEXT",$o,4,$i-$start);
		}
		if($c7=="INTEGER"){
			return array(2,"INTEGER",$o,7,$i-$start);
		}
		if($c4=="CHAR"){
			return array(3,"CHAR",$o,4,$i-$start);
		}
		if($c4=="DATE"){
			return array(4,"DATE",$o,4,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

}
