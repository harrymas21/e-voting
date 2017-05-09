<?php
require"assets/include/conn.php";
if(isset($_POST['fname'],$_POST['idno'],$_POST['rol'],$_POST['username'])){
//define the variables
$fnm = $_POST['fname'];
$idn = $_POST['idno'];
	$sch = $_POST['sch'];
$rol = $_POST['rol'];
$user = $_POST['username'];
$pass = $_POST['idno'];
$active = 0;
$vtd = 0;

$sql = mysql_query("INSERT INTO students VALUES ('$idn','$fnm','$user',sha1('$pass'),'$active','$vtd','$rol','$sch')")
or die(mysql_error());
	
	}

?>
