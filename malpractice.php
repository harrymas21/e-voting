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
                    <h4 class="page-head-line">REPORT AN ELECTION MALPRACTICE</h4>

                </div>

            </div>
            <style>
                    .white{color:white;}
                     h1{
                        
                        font-size: 1em;
                        font-weight: bold;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                    </style>
            <div class="row ">
                <?php
                if(isset($_GET['var']))
	{
		$var = $_GET['var'];
                if ($var == 1){
                    echo "<span class='white'>Election malpractice has been submitted.</span>";
                } elseif ( $var == 0) {
                    echo "<span class='white'>Election malpractice has not been submitted.</span>";
            }
	}
        ?>
                <form action="malpracticeH.php" method="POST" enctype="multipart/form-data" role="form" >
                        <h4> <span class='white'>DESCRIPTION:</span></h4><textarea type="text" name="description" rows="5" cols="40" class="form-control" placeholder="E.g bribery" required></textarea><br/>
                            <h4><span class='white'>UPLOAD EVIDENCE:</span></h4><input type="file" name="evidence"><br/>
         <button class="btn btn-lg btn-primary btn-block" type="submit"><h3>SUBMIT </h3>
                  </button>
                         </form>
             

        </div>
    </div>
           
            <div class="row"></div>
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
