<?php
if(isset($_POST['pp'])) {
	$ida = $_POST['pp'];
	$pst = $_POST['qq'];
	$option = $_POST['option'];
	include 'conn.php';
	if ($option == 'approve'){
		$sql = mysql_query("UPDATE `aspirants` SET `status` = '1' WHERE student_id = '$ida'") or die(mysql_error());
	$sql = mysql_query("INSERT INTO `student_posts` ( `std_id`, `post_id`) VALUES ( '$ida', '$pst');") or die(mysql_error());
}else{
        $sql = mysql_query("UPDATE `aspirants` SET `status` = '0' WHERE student_id = '$ida'") or die(mysql_error());
        $sql = mysql_query("DELETE FROM `student_posts` WHERE `std_id`= '$ida' AND `post_id`= '$pst');");
	}
  }else echo "string";
?>
