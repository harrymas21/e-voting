<?php
$bb = $_POST['idd'];
if(isset($_POST['idd'])){
include 'conn.php';
$sql = mysql_query("UPDATE `motion` SET verify = '1' WHERE `motion`.`sn` = '$bb' LIMIT 1") or die(mysql_error());
}
?>