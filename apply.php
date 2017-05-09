<?php
 include"assets/include/header.php";
 require_once("AfricasTalkingGateway.php");
 $username = "harryshaulin";
 $apiKey = "4e888176b486e1596292a628030fceb874c05f0f389c10281b740ceb20a7215c";
?>
   <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
					 if($role == 0){
						 echo'
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="member.php">Members</a></li>
							<li><a href="posted.php">Verify</a></li>
							<li><a href="approve.php">Approve</a></li>
                            <li><a href="results.php">Results</a></li>
                            <li><a href="reports.php">REPORTS</a></li>
                        </ul>';
					//login as student
					 }else if($role == 1){
						 echo'
						 <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php">Home</a></li>
                            <li><a href="vote.php">Vote</a></li>
                           <li><a class="menu-top-active" href="apply.php">Apply</a></li>	
                            <li><a class="menu-top-active" href="results.php">Results</a></li>
							
                        </ul>';
					// end		
					 			 
					}					 
					?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Student Post's Application </h4>
                </div>
            </div>
            
            <div class="row">
              <div class="col-md-7 col-sm-3">
                  <?php echo '
                  <a href="assets/include/pullout.php?id='.$_SESSION[id].'"><img src="img/election.png" height="50" width="190"/></a><br><br>
';                 
?>
                          <div class="panel panel-primary">
                        <div class="panel-heading">
                            <strong>Apply for a Student Position:</strong>				
                        </div>
                        <div class="panel-body">
                        <div id="mmc"></div>
                            <p> 
                            
                     <?php
					require"assets/include/conn.php";
					
					if(isset($_POST['submit'])){
					
					$allowedExts = array(
					  "png","jpeg","jpg"
					); 
					$allowedMimeTypes = array( 
					  'image/png','image/jpeg','image/jpg'
					);
					
					$extension = end(explode(".", $_FILES["file"]["name"]));
					
					if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
						//echo "ms word";
						$file = $_FILES["file"]["name"];
						$filePath = "img/" . $file;    
						move_uploaded_file($_FILES["file"]["tmp_name"],$filePath); 
						
					//get vararibles form
					$psts = $_POST['post'];
					$status = 1;
									
					//store details
					$ques = mysql_query("select * from students where id = '$_SESSION[id]'");
					$que = mysql_fetch_array($ques);
					$current_year = (date("Y")-$que['registration_year']);
					$time_remaining = $que['course_duration']-$current_year;
                                        
                                        $sql = mysql_query("SELECT * FROM `elections` ORDER BY id DESC LIMIT 1 ");
                $nes = mysql_fetch_array($sql); 
                $date = strtotime($nes['start_date']);
                if (time()<$date){
					if ($que['fees_balance']<1 and $que['discipline_cases']<1 and $time_remaining>1)
					{
					$q=mysql_query("SELECT id FROM aspirants WHERE student_id='$id' ");
					if(mysql_num_rows($q)>0){
					$msg = " ERROR : Seems you have applied for a post already"."<br/></br/>";	
					}
					else{
					$sql1 = mysql_query("INSERT INTO aspirants VALUES ('','$id','$psts','$status','$filePath')") or die(mysql_error());
					$sql3 = mysql_query("INSERT INTO `student_posts` ( `std_id`, `post_id`) VALUES ( '$id', '$psts')") or die(mysql_error());
					
					$msg = "Thanks ".$name.", Application Submitted and Approved:"."<br/></br/>";
					//start of sms notification.
					$query = "SELECT * FROM students WHERE id = '$_SESSION[id]'";
			 $que = mysql_query($query);
			 
			 while($q = mysql_fetch_array($que))
			 {
				 $data[] = $q['mobile_number'];
				 }
				 
				 $recipients = implode(",",$data);
				// echo $recipients."........<br>";
			//echo "jhghfhggh";
			//echo $message."<br>";
			$quen = mysql_query($query);
			$r = mysql_fetch_array($quen);
			$mess = "SELECT post_id FROM aspirants WHERE student_id = '$_SESSION[id]'";
			$mes = mysql_query($mess);
			$me = mysql_fetch_array($mes);
			$post_id = $me['post_id'];
			
			$gess = "SELECT post FROM posts WHERE post_id = '$post_id'";
			$ges = mysql_query($gess);
			$ge = mysql_fetch_array($ges);
			$post_name = $ge['post'];
			
			$message = "Hello ".$r['name'].", Your application for [".$post_name."] has been submitted and approved.";
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
					}
					
					}
					else echo "<p style='color:red'>Hello ".$name.", your application was unsuccessfull.<br/> Fees Balance: Kshs".$que['fees_balance'].
					"<br/>Disciplined cases: ".$que['discipline_cases']."<br/>Time remaining(years): ".$time_remaining."</p>";
                }else echo "<p style='color:red'>Can not apply for a post now. Election has started.</p>";
//start of sms notification.
					 /*
			$less = "SELECT * FROM students WHERE id = '$_SESSION[id]'";
			 $les = mysql_query($less);
			 
			 while($le = mysql_fetch_array($les))
			 {
				 $data1[] = $le['mobile_number'];
				 }
				 
				 $recipients = implode(",",$data1);
				// echo $recipients."........<br>";
			//echo "jhghfhggh";
			//echo $message."<br>";
			 $quen = mysql_query($query);
			$r = mysql_fetch_array($quen);
			 $message = "Hey ".$name.", you have pending fee balance and discipine cases.";
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
			 } */
			 //end of sms notification.
					
					}
                    else{
						$msg = "Kindly upload a png, jpeg or jpg image Only.";
						}
					}
                                        if (isset($_GET['mes']))
                                        {
                                        $message = $_GET['mes'];
                                  
                                        if ($message ==1){
                                            $msg = "Successfuly pulled out of the race.";
                                        }
                                        else if($message ==0){
                                            $msg = "You are not an aspirant.";
                                        }
                                        }
					?>
                                   <div style="color:red"><?php echo @$msg?></div>
                                <form method="post" enctype="multipart/form-data">
                               <!--Select position-->
                                <div class="form-group">
                                	<span style="color: Red;">* </span>
                                	<label>Select Position:</label>
                                <select class="form-control" name="post">
									<?php 
									$pst1 = mysql_query("SELECT * FROM posts ") or die(mysql_error());
									while ($row = mysql_fetch_array($pst1))
									{
									    echo "<option value=".$row['post_id'].">".$row['post']."</option>";
									}
									?>        
									</select>
                                </div>
                                
                                <div class="form-group">
                                <span style="color: Red;">* </span>
                                  <label for="motion">Upload your picture</label>
                                  <input type="file" required id="file" name="file">
                                  <span id="file-err" style="color: Red;"></span>
                                </div>
                                <br/> 
                                <div class="form-group">
                                  <input id="btnmotion" type="submit" name="submit" class="btn btn-info pull-left" value="Apply:"/>
                                </div>
                                </form>                            
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-4">
				
                        <div class="panel-body">
                            <br><br><br><img src="img/instructions1.jpg"  width="445px" height="315px" alt=" Post apply instructions">                           
                    </div>
                  </div>                        
                </div>
            </div>
            
            <div class="row"></div>           
            <div class="row"></div>
        </div>
    </div>
	<?php include"assets/include/footer.php";?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <!--<script src="assets/js/register.js"></script>-->
</body>
</html>