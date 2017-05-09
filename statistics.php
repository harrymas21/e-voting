<?php
include"assets/include/header.php";
include("libchart/libchart/classes/libchart.php");
$id =$_GET['id'];
echo $id;
$kess = mysql_query("SELECT post FROM posts WHERE post_id='$id'");
$ke = mysql_fetch_array($kess);
$post_name = $ke['post'] ;
             
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

					?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <style>
                    .white{color:white;}
                     h1{
                        
                        font-size: 1em;
                        font-weight: bold;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                    </style>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">GRAPH FOR <?php echo "<span class='white'>".$post_name."</span>" ?></h4>

                </div>

            </div>
            <div class="row ">
           <?php
                //start of graph
           echo $id;
$rows=mysql_query("SELECT * FROM `cassign_aspirants_view` WHERE post_id = $id");
$chart=new VerticalBarChart(600,400);
$dataset=new XYDataSet();
while ($row = mysql_fetch_array($rows))
	{
$dataset->addPoint(new Point($row['name'],$row['votes']));
	}
$chart->setDataSet($dataset);
//$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle($row['post']." STATISTICS");
$chart->render('libchart/statistics.png');
//end of graph.
                ?>
                <img src='libchart/statistics.png'><br>
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
