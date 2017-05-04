<?php
/**
*@param dateTime $jsdate Date and time in javaScript format
*@return dateTime $ret Date and time in php format
*/
function js2PhpTime($jsdate){
  if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
    $ret = mktime($matches[4], $matches[5], 0, $matches[1], $matches[2], $matches[3]);
    //echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
  }else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
    $ret = mktime(0, 0, 0, $matches[1], $matches[2], $matches[3]);
    //echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
  }
  return $ret;
}
/**
*@param dateTime $phpdate Date and time in php format
*@return dateTime Date and time in javaScript format
*/
function php2JsTime($phpDate){
    //echo $phpDate;
    //return "/Date(" . $phpDate*1000 . ")/";
    return date("m/d/Y H:i", $phpDate);
}
/**
*@param dateTime $jsdate Date and time in php format
*@return dateTime Date and time in MySQL format
*/
function php2MySqlTime($phpDate){
    return date("Y-m-d H:i:s", $phpDate);
}
/**
*@param dateTime $jsdate Date and time in MySQL format
*@return dateTime Date and time in php format
*/
function mySql2PhpTime($sqlDate){
    $arr = date_parse($sqlDate);
    return mktime($arr["hour"],$arr["minute"],$arr["second"],$arr["month"],$arr["day"],$arr["year"]);

}
?>
