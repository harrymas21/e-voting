<?php
session_start();
ob_start();
include "assets/include/conn.php";

$ename=$_POST['ename'];
$deadline=$_POST['deadline'];
$startdate=$_POST['startdate'];

$sql = mysql_query("INSERT INTO `e_voting`.`elections` (`election` ,`start_date` , `end_date`)
VALUES ('$ename','$startdate' ,'$deadline')");
if($sql){
	header('Location: election_set.php');
	}

?>