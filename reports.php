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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="election_set.php">election</a></li>
                            <li><a href="member.php">Members</a></li>
                            <li><a href="results.php">Results</a></li>
                            <li><a class="menu-top-active" href="reports.php">REPORTS</a></li>
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
                    //$election = mysql_fetch_assoc( mysql_query("SELECT * FROM elections LIMIT 1"));

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
                    <h4 class="page-head-line">GRAPHS</h4>

                </div>

            </div>
            <div class="row ">
                <style>
                    .white{color:white;}
                     h1{
                        
                        font-size: 1em;
                        font-weight: bold;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                </style>
               <?php
              $numb = 1;
               $sql = mysql_query("SELECT * from posts");
               while($na = mysql_fetch_array($sql)){
                   echo "<h1><span class='white'><a href='statistics.php?id=".$na['post_id']."'>".$numb.".".$na['post']."</a></span></h1><br>";
                   $numb ++;
               }
               ?>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">REPORTS</h4>

                </div>

            </div>
            <div class="row ">
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                    <a href="printpdf.php">
                        <img src="img/chairman.png" width="200" height="200" class="img-responsive " alt="chairman" /></a>
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                <!--//end of first division-->
                 <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                    <a href="printpdf2.php">
                        <img src="img/deputychair.png" width="200" height="200" class="img-responsive " alt="chairman" /></a>
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                <!--//end of 2nd division-->
                 <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                    <a href="printpdf3.php">
                        <img src="img/secgen.png" width="200" height="200" class="img-responsive " alt="chairman" /></a>
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                 <!--//end of 3rd division-->
                  <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                    <a href="printpdf4.php">
                        <img src="img/schoolrep.png" width="200" height="200" class="img-responsive " alt="chairman" /></a>
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                 <!--//end of 4th division-->
                  <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                    <a href="printpdf5.php">
                        <img src="img/sports.png" width="200" height="200" class="img-responsive " alt="chairman" /></a>
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                 <!--//end of 5th division-->
            </div>

            <div class="row " style="padding-top: 50px;">
            <!--a href="printpdf.php"><img src="img/viewreports.png" height="60" width="170"></a-->
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
