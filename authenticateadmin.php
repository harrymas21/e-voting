<?php
session_start();
ob_start();
include "assets/include/conn.php";

if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
if (isset($_POST['password'])) {
	$password = $_POST['password'];
	}
$password2 = sha1($password);
$sql=mysql_query("SELECT * FROM students WHERE username = '$username' AND password = '$password2'") or die (mysql_error());
$numrows=mysql_num_rows($sql);
if($numrows == 0){
	header('Location: admin.php?err=1');
	}
else {
	$row=mysql_fetch_array($sql);
	//create session variables to be passed
		 $_SESSION['name']= $row['name'];
		 $_SESSION['id']= $row['id'];
		 $_SESSION['role']= $row['role'];
		 $_SESSION['act']= $row['active'];
		 $_SESSION['voted'] = $row['voted'];
     	 $_SESSION['username']= $row['username'];
		 $_SESSION['password']=$row['password'];
		 $_SESSION['sch']=$row['sch'];
		 $_SESSION['posts_voted']=array();
		 header('location:index.php');
	 }
	 
?>