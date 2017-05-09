<?php
$bb = $_POST['idd1'];
if(isset($_POST['idd1'])){
include 'conn.php';
$sql = mysql_query("UPDATE `motion` SET approve = '1' WHERE `motion`.`sn` = '$bb' LIMIT 1") or die(mysql_error());
}
?>