<?php
include_once __DIR__."/config.inc";
include_once __DIR__."/functions.php";
$conn = mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
if($conn){
	$res = mysql_select_db(DB_NAME,$conn);
}
?>
