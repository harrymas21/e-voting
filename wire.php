<?php
if (isset($_POST['vote'])) {
	//
	include 'assets/include/conn.php';
	session_start();
	//
	$std = $_POST['std'];
	$pst = $_POST['pst'];
	//
	$up = "UPDATE student_posts SET votes=votes+1 WHERE std_id='$std' AND post_id='$pst'";
	if (mysql_query($up)) {
		array_push($_SESSION['posts_voted'], $pst);
		mysql_query("UPDATE students SET voted=1 WHERE id=".$_SESSION['id']."");
		echo "success";
	} else
		echo "fail";
} else
	echo "string";
?>