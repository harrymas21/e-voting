<?php
//start session and pull the following records form the db
//first_name,sec_name,id_no,voting_status,role,username and password
session_start();
ob_start();
include "assets/include/conn.php";
//include files for Bulky SMS
require_once("AfricasTalkingGateway.php");
$username = "harryshaulin";
$apiKey = "4e888176b486e1596292a628030fceb874c05f0f389c10281b740ceb20a7215c";


if(isset($_POST['username']))
{
		$username2 = $_POST['username'];
		
	}
	//echo $username2.".....<br>";
if (isset($_POST['id']))
	{
		$sid = $_POST['id'];
		
	}
	//echo $sid.".....<br>";
	 $sql=mysql_query("SELECT * FROM students  WHERE username='$username2' and id='$sid' and role = 1") or die (mysql_error());
	 
	 $numrows=mysql_num_rows($sql);
	 
	 if($numrows == 0){
		header('Location: start.php?err=1');
	}
	
	else {	
     $row=mysql_fetch_array($sql);
	 // if ($numrows==1) {
	//variables from the database
		 $id = $row['id'];
		 $name = $row['name'];
		 $role  = $row['role'];
		 $vote = $row['voted'];
		 $act = $row['active'];
         $usr =$row['username'];
		 $pwd = $row['password'];
	//create session variables to be passed
		 $_SESSION['name']= $name;
		 $_SESSION['id']= $id;
		 $_SESSION['role']= $role;
		 $_SESSION['act']= $act;
		 $_SESSION['voted'] = $vote;
     	 $_SESSION['username']= $usr;
		 $_SESSION['password']= $pwd;
		 $_SESSION['sch']=$row['sch'];
		 $_SESSION['posts_voted']=array();
	 }
	 
	  if ($numrows==1 and $row['is_user']==1)
	 {
		header('location:startpage_2.php?uname='.$username2.'&std='.$sid);
		 }
	//if user is not in the system yet. 
	 if ($numrows==1 and $row['is_user']==0)
	 {
		 $length = 6;
		 $str = "";
		 $characters = array_merge(
		 range('A','Z'),
		 range('a','z'),
		 range('0','9'));
		 $max = count($characters) - 1;
		 for ($i = 0; $i < $length; $i++)
		 {
			 $rand = mt_rand(0,$max);
			 $str .= $characters[$rand];
			 }
			 // save pass key to database:
			 mysql_query("UPDATE `e_voting`.`students` SET `password` = '$str',`is_user` = '1' WHERE `students`.`id` =$sid") or die (mysql_error());
			 //start of sms notification.
			$query = "SELECT * FROM students WHERE id = '$sid'";
			 $que = mysql_query($query);
			 
			 while($q = mysql_fetch_array($que))
			 {
				 $data[] = $q['mobile_number'];
				 }
				 
				 $recipients = implode(",",$data);
			 $quen = mysql_query($query);
			$r = mysql_fetch_array($quen);
			 $message = "Hello [".$r['name']."], use the following password: ".$str."to log into the OVS system.";
			$gateway  = new AfricasTalkingGateway($username, $apiKey);
			try
			{
				$results = $gateway->sendMessage($recipients, $message);
				}
			 //...........
			catch
		 (AfricasTalkingGatewayException $e)
		 {
			 echo "<p class='fans'>Encountered an error while sending: </p>". $e -> getMessage();
			 }
			 //end of sms notification.
			 //shift to next authentication page.
			header('location:startpage_2.php?uname='.$username2.'&std='.$sid);
			 
		 }
if (@$_GET['action']=='logout') {
session_destroy();
header('location:start.php');
}

?>
