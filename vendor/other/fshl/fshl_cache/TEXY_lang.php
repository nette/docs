<?php
/* --------------------------------------------------------------- *
 *        WARNING: ALL CHANGES IN THIS FILE WILL BE LOST
 *
 *   Source language file: W:\fshl/lang/TEXY_lang.php
 *       Language version: 0.1 (Sign:SHL)
 *
 *            Target file: W:\fshl/fshl_cache/TEXY_lang.php
 *             Build date: Mon 24.1.2011 18:17:43
 *
 *      Generator version: 0.4.11
 * --------------------------------------------------------------- */
class TEXY_lang
{
var $trans,$flags,$data,$delim,$class,$keywords;
var $version,$signature,$initial_state,$ret,$quit;
var $pt,$pti,$generator_version;
var $names;

function TEXY_lang () {
	$this->version=0.1;
	$this->signature="SHL";
	$this->generator_version="0.4.11";
	$this->initial_state=2;
	$this->trans=array(0=>array(0=>array(0=>8,1=>0),1=>array(0=>9,1=>0),2=>array(0=>1,1=>0)),1=>array(0=>array(0=>3,1=>0),1=>array(0=>2,1=>-1)),2=>array(0=>array(0=>4,1=>0),1=>array(0=>4,1=>0),2=>array(0=>4,1=>0),3=>array(0=>4,1=>0),4=>array(0=>0,1=>-1)),3=>array(0=>array(0=>3,1=>0),1=>array(0=>4,1=>0),2=>array(0=>4,1=>0),3=>array(0=>7,1=>0),4=>array(0=>7,1=>0),5=>array(0=>7,1=>0),6=>array(0=>7,1=>0),7=>array(0=>0,1=>-1)),4=>array(0=>array(0=>4,1=>0),1=>array(0=>4,1=>0),2=>array(0=>4,1=>0),3=>array(0=>4,1=>0),4=>array(0=>4,1=>0),5=>array(0=>3,1=>0),6=>array(0=>5,1=>-1)),5=>array(0=>array(0=>6,1=>0),1=>array(0=>6,1=>0),2=>array(0=>6,1=>0),3=>array(0=>6,1=>0),4=>array(0=>3,1=>0)),6=>array(0=>array(0=>3,1=>0)),7=>array(0=>array(0=>0,1=>-1)),8=>array(0=>array(0=>15,1=>0),1=>array(0=>19,1=>0),2=>array(0=>10,1=>0),3=>array(0=>11,1=>0),4=>array(0=>0,1=>-1)),9=>array(0=>array(0=>0,1=>-1)),10=>array(0=>array(0=>0,1=>-1)),11=>array(0=>array(0=>12,1=>-1)),12=>array(0=>array(0=>13,1=>0)),13=>array(0=>array(0=>14,1=>0),1=>array(0=>12,1=>-1)),14=>array(0=>array(0=>0,1=>-1)),15=>array(0=>array(0=>16,1=>-1)),16=>array(0=>array(0=>17,1=>0)),17=>array(0=>array(0=>18,1=>0),1=>array(0=>16,1=>-1)),18=>array(0=>array(0=>0,1=>-1)),19=>array(0=>array(0=>20,1=>-1)),20=>array(0=>array(0=>21,1=>0)),21=>array(0=>array(0=>22,1=>0),1=>array(0=>20,1=>-1)),22=>array(0=>array(0=>0,1=>-1)));
	$this->flags=array(0=>0,1=>0,2=>0,3=>"texy-err",4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0,13=>0,14=>0,15=>0,16=>0,17=>0,18=>0,19=>0,20=>0,21=>0,22=>0);
	$this->delim=array(0=>array(0=>"/---",1=>"\\---",2=>"\x0a"),1=>array(0=>"\x0a",1=>"!SPACE"),2=>array(0=>"##",1=>"**",2=>"==",3=>"--",4=>"_ALL"),3=>array(0=>"\x0a",1=>"##",2=>"==",3=>"--",4=>"- -",5=>"**",6=>"* *",7=>"_ALL"),4=>array(0=>"=",1=>"#",2=>"-",3=>"*",4=>"\x0d",5=>"\x0a",6=>"_ALL"),5=>array(0=>"=",1=>"#",2=>"-",3=>"*",4=>"\x0a"),6=>array(0=>"\x0a"),7=>array(0=>"\x0a"),8=>array(0=>"html",1=>"code",2=>"div",3=>"text",4=>"_ALL"),9=>array(0=>"_ALL"),10=>array(0=>"_ALL"),11=>array(0=>"\x0a"),12=>array(0=>"\x0a"),13=>array(0=>"\\---",1=>"_ALL"),14=>array(0=>"_ALL"),15=>array(0=>"\x0a"),16=>array(0=>"\x0a"),17=>array(0=>"\\---",1=>"_ALL"),18=>array(0=>"_ALL"),19=>array(0=>"\x0a"),20=>array(0=>"\x0a"),21=>array(0=>"\\---",1=>"_ALL"),22=>array(0=>"_ALL"));
	$this->ret=23;
	$this->quit=24;
	$this->names=array(0=>"LineBODY",1=>"NewLineTypeSelector",2=>"SingleNewLine",3=>"DoubleNewLine",4=>"HeaderIN",5=>"HeaderBody",6=>"HeaderOUT",7=>"HorizontalLine",8=>"BlockIN",9=>"BlockOUT",10=>"BlockDUMMY",11=>"BlockTEXT",12=>"BlockTEXTBody",13=>"BlockTEXTBodyNL",14=>"BlockTEXTBodyOUT",15=>"BlockHTML",16=>"BlockHTMLBody",17=>"BlockHTMLBodyNL",18=>"BlockHTMLBodyOUT",19=>"BlockCODE",20=>"BlockCODEBody",21=>"BlockCODEBodyNL",22=>"BlockCODEBodyOUT",23=>"_RET",24=>"_QUIT");
	$this->data=array(0=>null,1=>null,2=>null,3=>null,4=>null,5=>null,6=>null,7=>null,8=>null,9=>null,10=>null,11=>null,12=>null,13=>null,14=>null,15=>null,16=>null,17=>null,18=>null,19=>null,20=>null,21=>null,22=>null);
	$this->class=array(0=>null,1=>null,2=>null,3=>null,4=>"texy-hlead",5=>"texy-hbody",6=>"texy-hlead",7=>"texy-hr",8=>"texy-hr",9=>"texy-hr",10=>"texy-hr",11=>"texy-hr",12=>"texy-text",13=>"texy-text",14=>"texy-hr",15=>"texy-hr",16=>"texy-html",17=>"texy-html",18=>"texy-hr",19=>"texy-hr",20=>"texy-code",21=>"texy-code",22=>"texy-hr");
	$this->keywords=null;
}

// LineBODY
function getw0 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$p=$i;
		$c1=$s[$p++];
		$c2=$c1.$s[$p++];
		$c3=$c2.$s[$p++];
		$c4=$c3.$s[$p];
		if($c4=="/---"){
			return array(0,"/---",$o,4,$i-$start);
		}
		if($c4=="\\---"){
			return array(1,"\\---",$o,4,$i-$start);
		}
		if($c1=="\x0a"){
			return array(2,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// NewLineTypeSelector
function getw1 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		if(!ctype_space($c1)){
			return array(1,$c1,$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// SingleNewLine
function getw2 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$p=$i;
	$c1=$s[$p++];
	$c2=$c1.$s[$p];
	if($c2=="##"){
		return array(0,"##",$o,2,$i-$start);
	}
	if($c2=="**"){
		return array(1,"**",$o,2,$i-$start);
	}
	if($c2=="=="){
		return array(2,"==",$o,2,$i-$start);
	}
	if($c2=="--"){
		return array(3,"--",$o,2,$i-$start);
	}
	return array(4,$c1,false,$i-$start);
}

// DoubleNewLine
function getw3 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$p=$i;
	$c1=$s[$p++];
	$c2=$c1.$s[$p++];
	$c3=$c2.$s[$p];
	if($c1=="\x0a"){
		return array(0,"\x0a",$o,1,$i-$start);
	}
	if($c2=="##"){
		return array(1,"##",$o,2,$i-$start);
	}
	if($c2=="=="){
		return array(2,"==",$o,2,$i-$start);
	}
	if($c2=="--"){
		return array(3,"--",$o,2,$i-$start);
	}
	if($c3=="- -"){
		return array(4,"- -",$o,3,$i-$start);
	}
	if($c2=="**"){
		return array(5,"**",$o,2,$i-$start);
	}
	if($c3=="* *"){
		return array(6,"* *",$o,3,$i-$start);
	}
	return array(7,$c1,false,$i-$start);
}

// HeaderIN
function getw4 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$c1=$s[$i];
	if($c1=="="){
		return array(0,"=",$o,1,$i-$start);
	}
	if($c1=="#"){
		return array(1,"#",$o,1,$i-$start);
	}
	if($c1=="-"){
		return array(2,"-",$o,1,$i-$start);
	}
	if($c1=="*"){
		return array(3,"*",$o,1,$i-$start);
	}
	if($c1=="\x0d"){
		return array(4,"\x0d",$o,1,$i-$start);
	}
	if($c1=="\x0a"){
		return array(5,"\x0a",$o,1,$i-$start);
	}
	return array(6,$c1,false,$i-$start);
}

// HeaderBody
function getw5 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="="){
			return array(0,"=",$o,1,$i-$start);
		}
		if($c1=="#"){
			return array(1,"#",$o,1,$i-$start);
		}
		if($c1=="-"){
			return array(2,"-",$o,1,$i-$start);
		}
		if($c1=="*"){
			return array(3,"*",$o,1,$i-$start);
		}
		if($c1=="\x0a"){
			return array(4,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// HeaderOUT
function getw6 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// HorizontalLine
function getw7 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// BlockIN
function getw8 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$p=$i;
	$c1=$s[$p++];
	$c2=$c1.$s[$p++];
	$c3=$c2.$s[$p++];
	$c4=$c3.$s[$p];
	if($c4=="html"){
		return array(0,"html",$o,4,$i-$start);
	}
	if($c4=="code"){
		return array(1,"code",$o,4,$i-$start);
	}
	if($c3=="div"){
		return array(2,"div",$o,3,$i-$start);
	}
	if($c4=="text"){
		return array(3,"text",$o,4,$i-$start);
	}
	return array(4,$c1,false,$i-$start);
}

// BlockOUT
function getw9 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$c1=$s[$i];
	return array(0,$c1,false,$i-$start);
}

// BlockDUMMY
function getw10 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$c1=$s[$i];
	return array(0,$c1,false,$i-$start);
}

// BlockTEXT
function getw11 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// BlockTEXTBody
function getw12 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// BlockTEXTBodyNL
function getw13 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$p=$i;
	$c1=$s[$p++];
	$c2=$c1.$s[$p++];
	$c3=$c2.$s[$p++];
	$c4=$c3.$s[$p];
	if($c4=="\\---"){
		return array(0,"\\---",$o,4,$i-$start);
	}
	return array(1,$c1,false,$i-$start);
}

// BlockTEXTBodyOUT
function getw14 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$c1=$s[$i];
	return array(0,$c1,false,$i-$start);
}

// BlockHTML
function getw15 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// BlockHTMLBody
function getw16 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// BlockHTMLBodyNL
function getw17 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$p=$i;
	$c1=$s[$p++];
	$c2=$c1.$s[$p++];
	$c3=$c2.$s[$p++];
	$c4=$c3.$s[$p];
	if($c4=="\\---"){
		return array(0,"\\---",$o,4,$i-$start);
	}
	return array(1,$c1,false,$i-$start);
}

// BlockHTMLBodyOUT
function getw18 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$c1=$s[$i];
	return array(0,$c1,false,$i-$start);
}

// BlockCODE
function getw19 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// BlockCODEBody
function getw20 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	while($i<$l) {
		$c1=$s[$i];
		if($c1=="\x0a"){
			return array(0,"\x0a",$o,1,$i-$start);
		}
		$o.=$c1;
		$i++;
	}
	return array(-1,-1,$o,-1,-1);
}

// BlockCODEBodyNL
function getw21 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$p=$i;
	$c1=$s[$p++];
	$c2=$c1.$s[$p++];
	$c3=$c2.$s[$p++];
	$c4=$c3.$s[$p];
	if($c4=="\\---"){
		return array(0,"\\---",$o,4,$i-$start);
	}
	return array(1,$c1,false,$i-$start);
}

// BlockCODEBodyOUT
function getw22 (&$s, $i, $l) {
	$o = false;
	$start = $i;
	$c1=$s[$i];
	return array(0,$c1,false,$i-$start);
}

}
