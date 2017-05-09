<?php
 include"assets/include/header.php";
 ?>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                    <?php
					//LOGGIN AS ADMIN...
					 if($role == 0){
						 echo'
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="member.php">Members</a></li>
							<li><a class="menu-top-active" href="approve.php">Approve</a></li>
                            <li><a href="results.php">Results</a></li>
                        </ul>';
					//LOGGIN AS A STUDENT
					 }else if($role == 1){
						 echo'
						 <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="vote.php">Vote</a></li>
                            <li><a href="motion.php">Motions</a></li>
                            <li><a href="results.php">Results</a></li>
                        </ul>';
											 
					}else if($role == 2){
						echo'
						<ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a class="menu-top-active" href="approve.php">Approve</a></li>
							<li><a href="house.php">House B/S</a></li>
                            <li><a href="results.php">Results</a></li>
                        </ul>';
					
					}else{
						echo'
						<ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="posted.php">Verify</a></li>
                            <li><a href="results.php">Results</a></li>
                        </ul>';
					}					 
					?>
                        </ul>
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
                    <h4 class="page-head-line">Approve Motion</h4>
                </div>
            </div>
            
            <div class="row">
              <div class="col-md-7 col-sm-3">
                  <div class="panel panel-primary">
                        <div class="panel-heading">
                            <strong>Motion to be Discussed.</strong>				
                        </div>
                        <div class="panel-body">
                         <div class="table-responsive">
                             <table style="cursor: hand" class="table  table-condensed table-hover">
                                 <thead>
                                     <tr>
                                     <th>sn</th>
                                     <th>Subject</th>
                                     <th>Motion</th>
                                     <th></th>
                                     </tr>
                                 </thead>
                                 <tbody >
                                 <?php
                                 include 'assets/include/conn.php';
                                 $comp = mysql_query("SELECT * FROM motion WHERE verify = '1' AND approve = '0' ") or die(mysql_error());
                                 while($rr = mysql_fetch_array($comp)){
									 $bb = $rr['sn'];
                                 ?>
                                     <tr>
                                         <td><?php echo $rr['sn'];?></td>
                                         <td><?php echo $rr['subject'];?></td>
                                         <td><?php echo $rr['motion'];?></td>
                                         <td><i style="color:blue;" class="text-info k" bid="<?php echo $rr['sn'];?>">Double Click Here to View</i></td>
                                     </tr>
                                   <?php
                                 }
                                 ?>
                                 </tbody>
                             </table>
                         </div>
                         <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-3">
                            <div class="alert alert-info">
                        In this session, as the Speaker of the Assembly select the motion for discussion.
                        <br />
                         <strong> Some of instructions include:</strong>
                         <ul>
                            <li>Check the motion to be discussed.</li>
                            <li>Click Post button.</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row"></div>
            <div id="edit-m"></div>
            <div class="row"></div>
        </div>
    </div>
	<?php include"assets/include/footer.php";?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
	$(".k").on('dblclick',function(){
	var id1=$(this).attr('bid');
	console.log(id1);
	$.post('motionapp.php',{id1:id1},function(r){
	  $('#edit-m').html(r);
		$('#rdmtn').modal('show');
	  })
    })
    </script>

</body>
</html>