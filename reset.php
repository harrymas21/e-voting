<?php
//session_start();
require 'assets/include/conn.php';
require_once("AfricasTalkingGateway.php");
$username = "harryshaulin";
$apiKey = "4e888176b486e1596292a628030fceb874c05f0f389c10281b740ceb20a7215c";
$username2 = $_POST['username'];
$mobile_number = $_POST['mnumber'];
$fees_balance = $_POST['fbalance'];
$id = $_POST['id'];
$sql = mysql_query("SELECT * FROM students WHERE id = '$id' AND username='$username2' AND fees_balance='$fees_balance' AND mobile_number='$mobile_number'");
$numrows=mysql_num_rows($sql);

if($numrows == 0){
	header('location:resetPassword.php');
	}
  //if a user is found      
    else {
        $length = 8;
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
        mysql_query("UPDATE `e_voting`.`students` SET `password` = '$str' WHERE `students`.`id` =$id") or die (mysql_error());
        //start of sms notification.
        while($q = mysql_fetch_array($sql))
                {
            $data[] = $q['mobile_number'];
                }
                $recipients = implode(",",$data);
                $r = mysql_fetch_array($sql);
	        $message = "Hello [".$r['name']."], your new password is: ".$str." .";
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
                          header('location:start.php');
    } 
    ?>