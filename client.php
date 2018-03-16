<?php
 $host = "localhost";
$port = 7788;

$message = "test content";


$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Error: SOCKET\n");
$result = socket_connect($socket, $host, $port) or die("Error: JARINGAN\n");


socket_write($socket, $message, strlen($message)) or die("Error: DATA\n");
$result = socket_read($socket, 2048) or die("Error: RESP\n");
echo "\n Withdrawl :" . $result;

 

?>
