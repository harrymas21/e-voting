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
                  //  $election = mysql_fetch_assoc( mysql_query("SELECT * FROM elections LIMIT 1"));

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
                    <h4 class="page-head-line">REPORTED ELECTION MALPRACTICES</h4>

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
                <div class="panel panel-default">
                            <div class="table-responsive">
               <?php
               $number = 1;
               $mess = mysql_query("SELECT * FROM malpractice") or die (mysql_error());
               echo'
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th></th>
                                            <th>ID No:</th>
                                            <th>Name</th>
                                            <th>Description:</th>
                                            <th>Evidence:</th>
                                        </tr>
                                    </thead>
                                    ';
               while($row = mysql_fetch_array($mess)){
                $zess = mysql_query("SELECT * FROM students where id='".$row['id']."'") or die (mysql_error());
		$ro= mysql_fetch_array($zess);						
                $id = $row['id'];
                $name = $ro['name'];
                $desc = $row['description'];
                $evi = $row['evidence'];
                echo "<tbody>"; 
                echo "<tr>";
                echo "<td>" . $number . "</td>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $name . "</td>";
                echo "<td>" . $desc . "</td>";
                echo "<td><a href='http://localhost/e-voting/$row[evidence]' download='filename'>Download evidence.</a></td>";
                 echo "</tr>"; 
                 $number++;
               }
               echo "</tbody></table>"; 

               ?>
             

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
