<?php
error_reporting(0);
$server='localhost';
$user='root';
$pass='';
$db='e_voting';
$conn = mysql_connect($server,$user,$pass) or die ('error connecting to database');
$selectdb = mysql_select_db($db);
?>
