<?php  
session_start();
ob_start();
include "assets/include/conn.php"; 
	
$description=$_POST['description'];
$id=$_SESSION['id'];
$ima= $_FILES['evidence']['name'];
$imup=$_FILES['evidence']['tmp_name'];

$path="files/$ima";
move_uploaded_file($imup,$path);

$sql = mysql_query("INSERT INTO `e_voting`.`malpractice` (
`id` ,
`description` ,
`evidence`
)
VALUES (
'$id', '$description', '$path'
)");
if ($sql){
    header('Location: malpractice.php?var=1');
} 
else {
    header('Location: malpractice.php?var=0');
}
?>