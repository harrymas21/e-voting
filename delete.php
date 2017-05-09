<?php
if(isset($_POST['id'])){
	$id=$_POST['id'];
include 'assets/include/conn.php';
$sql=mysql_query("delete from members where id_no='$id'") or die(mysql_error());
if($sql){
	echo '<div class="alert alert-success">Record successfully deleted</div>';
	}
  }
?>