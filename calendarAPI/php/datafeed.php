<?php

session_start();
$uid = $_SESSION['uid'];

date_default_timezone_set('America/Denver');

include_once("dbconfig.php");
include_once("functions.php");

/**
*@param dateTime $st Start time of the new event
*@param dateTime $et End time of the new event
*@param string $sub Subject of the new event
*@param string $ade For all day events, makes start and end times irrelavant
*@param string $uid Unique auto-increment id for all users to save independent events
*@return string $ret Success or Failure report message
*/

function addCalendar($st, $et, $sub, $ade, $uid){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "insert into `jqcalendar` (`subject`, `starttime`, `endtime`, `isalldayevent`, `uid`) values ('"
      .mysql_real_escape_string($sub)."', '"
      .php2MySqlTime(js2PhpTime($st))."', '"
      .php2MySqlTime(js2PhpTime($et))."', '"
      .mysql_real_escape_string($ade)."', '"
      .$uid."' )";
    //echo($sql);
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'add success';
      $ret['Data'] = mysql_insert_id();
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}

/**
*@param dateTime $st Start time of the new event
*@param dateTime $et End time of the new event
*@param string $sub Subject of the new event
*@param string $ade For all day events, makes start and end times irrelavant
*@param string $uid Unique auto-increment id for all users to save independent events
*@param string $dscr Description of the new event
*@param string $loc Location of the new event
*@param string $color Color to help organize visually
*@return string $ret Success or Failure report message
*/

function addDetailedCalendar($st, $et, $sub, $ade, $dscr, $loc, $color, $tz, $uid){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "insert into `jqcalendar` (`subject`, `starttime`, `endtime`, `isalldayevent`, `description`, `location`, `color`, `uid`) values ('"
      .mysql_real_escape_string($sub)."', '"
      .php2MySqlTime(js2PhpTime($st))."', '"
      .php2MySqlTime(js2PhpTime($et))."', '"
      .mysql_real_escape_string($ade)."', '"
      .mysql_real_escape_string($dscr)."', '"
      .mysql_real_escape_string($loc)."', '"
      .mysql_real_escape_string($color)."', '"
      .$uid."' )";

    //echo($sql);
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'add success';
      $ret['Data'] = mysql_insert_id();
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}
/**
*@param dateTime $sd Start date of the new event for loading purposes
*@param dateTime $ed End date of the new event for loading purposes
*@param string $uid User ID for all unique users to load inpependent events
*@return array $ret Info about all events in given range for user
*/
function listCalendarByRange($sd, $ed, $uid){
  $ret = array();
  $ret['events'] = array();
  $ret["issort"] =true;
  $ret["start"] = php2JsTime($sd);
  $ret["end"] = php2JsTime($ed);
  $ret['error'] = null;
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "select * from `jqcalendar` where (`starttime` between '"
      .php2MySqlTime($sd)."' and '". php2MySqlTime($ed)."' and `uid` = '" . $uid ."') ORDER BY starttime ASC";
    $handle = mysql_query($sql);
    //echo $sql;
    while ($row = mysql_fetch_object($handle)) {
      //$ret['events'][] = $row;
      //$attends = $row->AttendeeNames;
      //if($row->OtherAttendee){
      //  $attends .= $row->OtherAttendee;
      //}
      //echo $row->StartTime;
      $ret['events'][] = array(
        $row->Id,
        $row->Subject,
        php2JsTime(mySql2PhpTime($row->StartTime)),
        php2JsTime(mySql2PhpTime($row->EndTime)),
        $row->IsAllDayEvent,
        ($row->IsAllDayEvent!=1 && date("Y-m-d",mySql2PhpTime($row->EndTime))>date("Y-m-d",mySql2PhpTime($row->StartTime))?1:0), //more than one day event
        //$row->InstanceType,
        0,//Recurring event,
        $row->Color,
        1,//editable
        $row->Location,
        ''//$attends
      );
    }
	}catch(Exception $e){
     $ret['error'] = $e->getMessage();
  }
  return $ret;
}

/**
*@param dateTime $day Day parameter to find the date, the week, or month on display
*@param string $type Either month, week, or day to set the calendar view
*@param string $uid Unique user id to load only users events
*/

function listCalendar($day, $type, $uid){
  $phpTime = js2PhpTime($day);
  //echo $phpTime . "+" . $type;
  switch($type){
    case "month":
      $st = mktime(0, 0, 0, date("m", $phpTime), 1, date("Y", $phpTime));
      $et = mktime(0, 0, -1, date("m", $phpTime)+1, 1, date("Y", $phpTime));
      break;
    case "week":
      //suppose first day of a week is monday
      $monday  =  date("d", $phpTime) - date('N', $phpTime) + 1;
      //echo date('N', $phpTime);
      $st = mktime(0,0,0,date("m", $phpTime), $monday, date("Y", $phpTime));
      $et = mktime(0,0,-1,date("m", $phpTime), $monday+7, date("Y", $phpTime));
      break;
    case "day":
      $st = mktime(0, 0, 0, date("m", $phpTime), date("d", $phpTime), date("Y", $phpTime));
      $et = mktime(0, 0, -1, date("m", $phpTime), date("d", $phpTime)+1, date("Y", $phpTime));
      break;
  }
  //echo $st . "--" . $et;
  return listCalendarByRange($st, $et, $uid);
}
/**
*@param dateTime $st Start time of the new event
*@param dateTime $et End time of the new event
*@param int $id The unique id for each calendar event to find quickly
*@return string $ret Success or Failure report message
*/
function updateCalendar($id, $st, $et){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "update `jqcalendar` set"
      . " `starttime`='" . php2MySqlTime(js2PhpTime($st)) . "', "
      . " `endtime`='" . php2MySqlTime(js2PhpTime($et)) . "' "
      . "where `id`=" . $id;
    //echo $sql;
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}

/**
*@param dateTime $st Start time of the new event
*@param dateTime $et End time of the new event
*@param string $sub Subject of the new event
*@param string $ade For all day events, makes start and end times irrelavant
*@param string $uid Unique auto-increment id for all users
*@param string $dscr Description of the new event
*@param string $loc Location of the new event
*@return string $ret Success or Failure report message
*/

function updateDetailedCalendar($id, $st, $et, $sub, $ade, $dscr, $loc, $color, $tz){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "update `jqcalendar` set"
      . " `starttime`='" . php2MySqlTime(js2PhpTime($st)) . "', "
      . " `endtime`='" . php2MySqlTime(js2PhpTime($et)) . "', "
      . " `subject`='" . mysql_real_escape_string($sub) . "', "
      . " `isalldayevent`='" . mysql_real_escape_string($ade) . "', "
      . " `description`='" . mysql_real_escape_string($dscr) . "', "
      . " `location`='" . mysql_real_escape_string($loc) . "', "
      . " `color`='" . mysql_real_escape_string($color) . "' "
      . "where `id`=" . $id;
    //echo $sql;
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}

/**
*@param int $id Unique event id for quickly finding event
*@return string $ret Success or Failure report message
*/
function removeCalendar($id){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "delete from `jqcalendar` where `id`=" . $id;
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}




header('Content-type:text/javascript;charset=UTF-8');
$method = $_GET["method"];
switch ($method) {
    case "add":
        $ret = addCalendar($_POST["CalendarStartTime"], $_POST["CalendarEndTime"], $_POST["CalendarTitle"], $_POST["IsAllDayEvent"], $uid);
        break;
    case "list":
        $ret = listCalendar($_POST["showdate"], $_POST["viewtype"], $uid);
        break;
    case "update":
        $ret = updateCalendar($_POST["calendarId"], $_POST["CalendarStartTime"], $_POST["CalendarEndTime"]);
        break;
    case "remove":
        $ret = removeCalendar( $_POST["calendarId"]);
        break;
    case "adddetails":
        $st = $_POST["stpartdate"] . " " . $_POST["stparttime"];
        $et = $_POST["etpartdate"] . " " . $_POST["etparttime"];
        if(isset($_GET["id"])){
            $ret = updateDetailedCalendar($_GET["id"], $st, $et,
                $_POST["Subject"], isset($_POST["IsAllDayEvent"])?1:0, $_POST["Description"],
                $_POST["Location"], $_POST["colorvalue"], $_POST["timezone"]);
        }else{
            $ret = addDetailedCalendar($st, $et,
                $_POST["Subject"], isset($_POST["IsAllDayEvent"])?1:0, $_POST["Description"],
                $_POST["Location"], $_POST["colorvalue"], $_POST["timezone"], $uid);
        }
        break;


}
echo json_encode($ret);



?>
