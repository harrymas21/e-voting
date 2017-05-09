<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="assets/img/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="TUK OVS" />
    <meta name="author" content="M.E.K" />
    <title>OVS | TUK</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
	<link href="css/khs.css" rel="stylesheet">  
</head>
<body>
    <!-- BEGIN HEADER SECTION MENU-->
         <div class="start-header">
	        <img src="img/tuklogo.jpg" alt="start-header" class="start-nav"></img>
        </div>
    <!-- END -->
	<!-- BEGIN BODY CONTENTS -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-head-line">Administrator</h4>
                    </div>
				</div>
				 
                    <div class="row">
                        <div class="col-md-6">
                                <div id="login-header">
                                <p>
                                <?php 
                                $errors = array(
                                    1=>"Invalid user name or password, Try again",
                                    2=>"Please login to access this area"
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="fans">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="fans">'.$errors[$error_id].'</p>';
                                    }
                               ?>       
                                </p>
								Login
								</div>
								<hr/>
								 <form action="authenticateadmin.php" method="POST" role="form" >     
         <h4>USERNAME:</h4><input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br/>
         <h4> PASSWORD:</h4><input type="password" name="password" class="form-control" placeholder="Id" required><br/>
                         <button class="btn btn-lg btn-primary btn-block" type="submit"><h3>LOG IN </h3>
                         </button>
                         </form>
                                <br /><br />
								
								
								<!--PASSWORD RESET NOT APPLICABLE FOR NOW-->
                                <!--<a href="#" id="forgot-pass"> forgot password </a>
                                <hr />
                                <div id="pass-reset" class="alert alert-info">
                                    <table>
                        	            <tr>
										    <td><input type="text" id="id-number" class="form-control" placeholder="enter your id number"/></td>
                        	                <td><button class="form-control btn btn-default btn-sm" id="btn-res" ><i class="fa fa-send"></i> submit</button></td>	
                        	            </tr>
                                    </table>
                                </div>-->
								<!--END PASSWORD RESET-->
								
                        </div>
                    </div>
			</div>
        </div>
		
	<!--END BODY-->
    <!-- FOOTER-->
    <?php include"assets/include/adminfooter.php"; ?>
	<!--END FOOTER-->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/login.js"></script>
	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/khs.js"></script>
</body>
</html>
