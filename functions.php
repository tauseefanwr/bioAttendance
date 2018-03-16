<?php
	function saveLogData($data = array()){
		global $deviceId;
		writeLog(json_encode($data));
		$records = $data["record"];
		$sql = 'Insert INTO tblt_timesheet(punchingcode,date,time,Tid) values';
		$sqlArray = array();
		foreach($records as $record){
				$sqlArray[] = '("'.$record["enrollid"].'","'.date("Y-m-d",strtotime($record["time"])).'","'.date("H:i:s",strtotime($record["time"])).'","'.$deviceId.'")';
		}
		$exec = mysql_query($sql.implode(",",$sqlArray)) or writeLog(mysql_error()." :: ".$sql.implode(",",$sqlArray));
		if($exec){
			$result = '{"ret":"sendlog","result":true,"cloudtime":"2016-03-25 13:49:30"}';
		}else{
			$result = '{"ret":"sendlog","result":false,"reason":1}';			
		}
		return $result;
	}

	function writeLog($msg , $rec = ""){
		error_log(date("Y-m-d H:i:s")." :: ".$msg.PHP_EOL,3,"./logs/error".$rec.".log");
	}


	function setDeviceId($data){
		global $deviceId;
		$deviceId = $data['sn'];
	}
?>
