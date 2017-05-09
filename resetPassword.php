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
                        <h4 class="page-head-line">RESET PASSWORD</h4>
                    </div>
				</div>
                    <div class="row">
                        <div class="col-md-6">
                                <div id="login-header">
								Confirm your details to send a new password:
								</div>
								<hr/>
                     <form action="reset.php" method="POST" role="form" >     
         <h4>USERNAME:</h4><input type="text" name="username" class="form-control" placeholder="x/000" required autofocus><br/>
         <h4> ID:</h4><input type="password" name="id" class="form-control" placeholder="000" required><br/>
             <h4> MOBILE NUMBER:</h4><input type="text" name="mnumber" class="form-control" placeholder="+2547xxxxxxxx" required><br/>
                 <h4> FEES BALANCE:</h4><input type="text" name="fbalance" class="form-control" placeholder="500" required><br/>
                         <button class="btn btn-lg btn-primary btn-block" type="submit"><h3>RESET PASSWORD </h3>
                         </button>
                         </form><br>
                                <br/><br/>
	<img src="img/mission.jpg" id="mission" alt="tukmission"/>
		
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-info">
							    <div id="myCarousel" class="carousel slide">
                                    <!-- Indicators--> 
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
							        <div class="carousel-inner">
		                                <div class="item active">
                                            <div class="fill" ></div>
                                                <div class="carousel-caption">
                                                    <h3>welcome to satuk<br>online voting platform</h3>
                                                </div>
                                            </div>
											
											<div class="item">
                                                <div class="fill" ></div>
                                                    <div class="carousel-caption">
                                                        <h3>read instructions carefully&nbsp; <strong>!</strong></h3> 
                                                    </div>
                                            </div>
											
			                                <div class="item">
                                                <div class="fill" ></div>
                                                    <div class="carousel-caption">
                                                        <h3>again&nbsp;<strong>!</strong> <br/>read instructions carefully&nbsp;<strong>!</strong></h3> 
                                                    </div>
                                            </div>
											
			                                <div class="item">
                                                <div class="fill" ></div>
                                                    <div class="carousel-caption">
                                                        <h3>Only registered students will vote<br/><i class="fa fa-eye"></i> <em>Watching you!</em></h3> 
                                                    </div>
                                            </div>
											
											<div class="item">
                                                <div class="fill" ></div>
                                                    <div class="carousel-caption">
                                                        <h3>a student will vote only once <br/><i class="fa fa-eye"></i> <em>Watching you!</em></h3> 
                                                    </div>
                                            </div>
											
											<div class="item">
                                                <div class="fill" ></div>
                                                    <div class="carousel-caption">
                                                        <h3>instructions below<br/><img src="img/direction.png" id="direction"></img></h3> 
                                                    </div>
                                            </div>
											
											<div class="item">
                                                <div class="fill" ></div>
                                                    <div class="carousel-caption">
                                                        <h3>Keep in touch with us for any query.<br/><i class="fa fa-thumbs-up"></i>Thank you</h3> 
                                                    </div>
                                            </div>	
			                        </div>
							    </div>                     
                            </div> 
                            <img src="img/details.jpg" id="instructions" alt="instructions"></img>
							
                        </div>
                    </div>
			</div>
        </div>
	<!--END BODY-->
    <!-- FOOTER-->
    <?php include"assets/include/footer.php"; ?>
	<!--END FOOTER-->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/login.js"></script>
	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/khs.js"></script>
</body>
</html>
