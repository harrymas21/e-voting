<?php
include 'conn.php';
session_start();
if(isset($_GET['id'])) {
	$id = $_GET['id'];
        $sql = mysql_query("UPDATE `aspirants` SET `status` = '0' WHERE student_id = '$id'") or die(mysql_error());
        $sql1 = mysql_query("DELETE FROM `student_posts` WHERE `std_id`= '$id'");
       
        if($sql AND $sql1){
        header('Location: ../../apply.php?mes=1');
       }
       else {
           header('Location: ../../apply.php?mes=0');
       }
      
}
 else {
           header('Location: ../../apply.php');
       }
       ?>
