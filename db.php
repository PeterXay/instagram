<?php

$host = "127.0.0.1";
$username = "root";
$password = "L0v3G0ld";
$db = "app";

$connect = new mysqli($host,$username,$password,$db);

global $connect;

if($connect->connect_error)
{
 die("Connection failed: " . $connect->connect_error);
}
?>

