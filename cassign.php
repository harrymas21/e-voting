<?php
include 'assets/include/conn.php';
//reset kid password
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$check = mysql_query("SELECT name FROM students WHERE id='$id' ");
	if (mysql_num_rows($check) > 0) {
		$query = "UPDATE students SET password='123456' WHERE id='$id'";
		if (mysql_query($query))
			echo "success";
		else
			echo "string";
	} else
		echo "string";

} 
else if (isset($_POST['newp'])) {
	$pst = $_POST['pst'];
	$check = mysql_query("SELECT post FROM posts WHERE post='$pst' ");
	if (mysql_num_rows($check) > 0) {
		echo "ERR: post <b>  ".$pst." </b> already exist.";
	} else{
		$query = "INSERT INTO posts (`post`) VALUES ('$pst')";
		if (mysql_query($query))
			echo "OK : post <b>  ".$pst." </b> saved successfully.";
		else
			echo "ERR: post <b> ".$pst." </b> not saved.try later.";
	}
		

}

//delete this kid
else if (isset($_POST['delete'])) {
	$std = $_POST['std'];
	if (mysql_query("DELETE FROM students WHERE id='$std'")) {
		echo "success";
	} else{
		echo "failed";
	}


}
else
	echo "string";

//(c) Copyright 2016 CassignPro. All Rights Reserved.
?>
