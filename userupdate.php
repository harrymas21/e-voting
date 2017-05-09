<?php
require"assets/include/conn.php";
if(isset($_POST['fname1'],$_POST['sname1'],$_POST['email1'],$_POST['idno1'],$_POST['tel1'])){
//define the variables
$fnm = $_POST['fname1'];
$snm = $_POST['sname1'];
$mail= $_POST['email1'];
$idn = $_POST['idno1'];
$tel = $_POST['tel1'];

$sql = mysql_query("UPDATE members SET first_name='$fnm',sec_name='$snm',email='$mail',telephone='$tel' WHERE id_no = $idn") or die(mysql_error());
	}
?>