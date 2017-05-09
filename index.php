<?php
 include"assets/include/header.php";
 ?>
    <!-- LOGO HEADER END-->
<section class="menu-section" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                    <?php
					 if($role == 0){
						 echo'
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php">Home</a></li>
                            <li><a href="election_set.php">election</a></li>
                            <li><a href="member.php">Members</a></li>
                            <li><a href="results.php">Results</a></li>
                            <li><a href="reports.php">REPORTS</a></li>
                        </ul>';
					//login as student:
					 }else if($role == 1){
						 echo'
						 <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php">Home</a></li>
                            <li><a href="vote.php">Vote</a></li>
                            <li><a href="apply.php">Apply</a></li>
                            <li><a href="results.php">Results</a></li>
							
                        </ul>';
											 
					}
                    $election = mysql_fetch_assoc( mysql_query("SELECT * FROM elections LIMIT 1"));

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
                    <h4 class="page-head-line">Online Voting System</h4>

                </div>

            </div>
            <div class="row ">
                <style>
                    .white{color:white;}
                     h1{
                        
                        font-size: 2em;
                        font-weight: bold;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                    .green{color:green;}
                    h1{
                        
                        font-size: 3em;
                        font-weight: bold;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                </style>
                
                <?php
                $sql = mysql_query("SELECT * FROM `elections` ORDER BY id DESC LIMIT 1 ");
                $nes = mysql_fetch_array($sql);
                $enddate = strtotime($nes['end_date']);
                $date = strtotime($nes['start_date']);
                $remaining = $date - time();
                $days_remaining = floor($remaining/86400);
                $hours_remaining = floor(($remaining % 86400)/3600);
                $minutes_remaining = floor($remaining/60);
                if (time()>=$date){
                    echo '<h1 align="center"><span class="white">TIMER: </span><span class="green">00: 00: 00</span></h1>';
                }
                else {
                echo '
                <h1 align="center"><span class="white">D: </span><span class="green">'.$days_remaining.'</span>
                <span class="white">HRS: </span><span class="green">'.$hours_remaining.'</span>
                    <span class="white">MIN: </span><span class="green">'.$minutes_remaining.'</span>
                    <span class="white">SEC: </span><span class="green">'.$remaining.'</span>
                    <span class="white"> remaining.</span>
                </h1> ';}
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.5s">

                        <img width="300" height="300" src="assets/img/portfolio/tuk5.png" class="img-responsive " alt="" />
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.6s">

                        <img width="300" height="300" src="assets/img/portfolio/tuk6.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                        </div>
                    </div>
                </div>

            <div class="row " style="padding-top: 50px;">
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.7s">

                        <img width="300" height="300"src="assets/img/portfolio/tuk2.png" class="img-responsive " alt="" />
                        <div class="overlay">
                        </div>
                    </div>
                </div>
            </div>
                
             <div class="col-lg-4 col-md-4 ol-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.8s">

                        <img width="300" height="300"src="assets/img/portfolio/tuk1.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.9s">

                        <img width="300" height="300" src="assets/img/portfolio/tuk3.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                        </div>
                    </div>
                </div>

        </div>
    </div>
           
            <div class="row"></div>
            
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
	<?php include"assets/include/adminfooter.php";?>
    <!--/END OF FOOTER-->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"> </script>
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />

</body>
</html>
