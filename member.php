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
					 if($role == 0){
						 echo'
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                           <li><a class="menu-top-active" href="index.php">Home</a></li>
                            <li><a href="election_set.php">election</a></li>
                            <li><a class="menu-top-active" href="member.php">Members</a></li>
                            <li><a href="results.php">Results</a></li>
                            <li><a href="reports.php">REPORTS</a></li>
                        </ul>';
                                                  
					//login as student
					 }else if($role == 1){
						 echo'
						 <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="vote.php">Vote</a></li>
                            <li><a href="motion.php">Motions</a></li>
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
            <div class="row" id="all-members">
                <div class="col-md-12">
                <h4 class="page-head-line">All Users of the System.<!-- <button class="btn btn-danger pull-right"><i class="fa fa-plus-circle"></i> ADD NEW POST</button>--></h4>
                <button class="btn btn-success" id="btn-save-post"><i class="fa fa-save"></i> SAVE POST</button> <i id="xx" style="color: red;"></i>
                <div class="col-md-6">
                    <hi><span class='white'>ADD AN ELECTION POST: </span></hi>
        <input type="text" placeholder="Enter post name e.g. chairman" id="post-name" class="form-control"/>
             
                
                </div>
               <hr />
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#mca" data-toggle="tab"><strong>Students Record</strong></a>
                                </li>
                                <li class=""><a href="#oca" data-toggle="tab"><strong>Aspirants</strong></a>
                                </li>
                               <!-- <li class=""><a href="#admin" data-toggle="tab"><strong>System Administrator</strong></a>
                                </li>-->
                              </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="mca">                                    
                                    <p>
                                    
                        <div class="panel panel-default">
                            <div class="table-responsive">
                            <?php 
								$mbrs = mysql_query("SELECT * FROM students WHERE role = 1") or die (mysql_error());								
							echo'
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID/Passport No:</th>
                                            <th>Names:</th>
                                            <th>Vote Status:</th>
                                        </tr>
                                    </thead>
									';
								while($row = mysql_fetch_array($mbrs)){								
								$nam = $row['name'];
								$actd = $row['active'];							
								$vtd = $row['voted'];
								$no_id = $row['id'];
								
							//student status:
								/*if($actd == 0){
									$active =  "<a class='btn-xs btn-warning'>pending</a>";
								}else{
									$active = "<a class='btn-xs btn-info'>active</a>";
								}*/
							//student voting status
								if($vtd == 0){
									$vote =  "<a class='btn-xs btn-danger'>not voted</a>";
								}else{
									$vote = "<a class='btn-xs btn-success'>voted</a>";
								}

									echo'
                                    <tbody>';
									  echo "<tr>";
									  echo "<td>" . $no_id . "</td>";
									  echo "<td>" . $nam . "</td>";
									  //echo "<td>" . $active. "</td>";
									  echo "<td>" . $vote. "</td>";  
									  echo "</tr>";  
									  }
                                   echo' </tbody>';
                                echo '</table>';
								?>
                            </div>
                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="oca">
                                    <p>
                            <?php 
								$asp = mysql_query("SELECT s.id,s.name,p.post_id,p.post,a.status FROM students s, posts p, aspirants a WHERE s.id =a.student_id 
AND  p.post_id=a.post_id") or die (mysql_error());								
							echo'
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Student ID:</th>
                                            <th>Student Name:</th>
                                            <th>Post ID:</th>
                                            <th>Post Name:</th>
                                            
                                        </tr>
                                    </thead>
									';
								while($row = mysql_fetch_array($asp)){								
								$sid = $row['id'];
								$nm = $row['name'];
								$pstd = $row['post_id'];							
								$pst = $row['post'];
								//$status = $row['status'];
								//<th>Post Status:</th>
								
							//check the post status:
							/*
								if($status == 0){
									$sts =  "<a class='ap btn-xs btn-danger' bid=".$sid." option='approve'  pid=".$pstd." title='click to approve aspirant'>Not Approved</a>";
								}else{
									$sts = "<a class='ap btn-xs btn-success' bid=".$sid." option='disapprove'  pid=".$pstd." title='click to withdraw aspirant'>Approved</a>";
								}*/

									echo'
                                    <tbody>';
									  echo "<tr>";
									  echo "<td>" . $sid . "</td>";
									  echo "<td>" . $nm . "</td>";
									  echo "<td>" . $pstd . "</td>";
									  echo "<td>" . $pst . "</td>";
									  echo "<td>" . $sts. "</td>";    
									  }
                                   echo' </tbody>';
                                echo '</table>';
								?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="admin">
                                    <p>
                            <?php 
								$adm= mysql_query("SELECT * FROM students WHERE role = 0") or die (mysql_error());
								
							echo'
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>ID/Passport No:</th>
                                            <th>A/C Status:</th>
                                            <th></th>
                                        </tr>
                                    </thead>
									';
								while($row = mysql_fetch_array($adm)){								
								$mn = $row['name'];						
								$acs = $row['active'];
								$no_id = $row['id'];
								
							//student status:
								if($acs == 0){
									$activ =  "<a class='btn-xs btn-warning'>pending</a>";
								}else{
									$activ = "<a class='btn-xs btn-info'>approved</a>";
								}

									echo'
                                    <tbody>';
									  echo "<tr>";
									  echo "<td>" . $mn . "</td>";
									  echo "<td>" . $no_id. "</td>";
									  echo "<td>" . $activ. "</td>";
									  echo "</tr>";  
									  }
                                   echo' </tbody>';
                                echo '</table>';
								?>
                                    </p>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
            
            <!--<div class="row"></div>
            <div class="row"></div>
           
            <div class="row"></div>-->
        </div>
    </div>
    <div id="edit-m"></div>
    <!-- CONTENT-WRAPPER SECTION END-->
	<?php include"assets/include/footer.php";?>
    <!--/END OF FOOTER-->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/bootstrap.js"></script>
        <script>
/*$(".a").click(function(){
	var id=$(this).attr('bid');
	console.log(id);
	  $.post('edit.php',{id:id},function(r){
	    $('#edit-m').html(r);
		  $("#edit-modal").modal("show");
	 })
})
		
$(".c").click(function(){
	var id=$(this).attr('bid');
	//console.log(id);
	  if (confirm('Are you sure you want to delete this record???')) {
		$.post('delete.php',{id:id}, function(r){
			  $(location).attr('href','members.php');
			  $('#msg').html(r);
		    })
	     } else {
	   return false;
	 }
});*/

$(".ap").click(function(){
	var pp = $(this).attr('bid');
	var qq=$(this).attr('pid');
	var opt=$(this).attr('option');
	  if (confirm('Are you sure you want to '+opt+' this Aspirant ???')) {
		$.post('assets/include/app.php',{pp:pp,qq:qq,option:opt}, function(r){
			  $(location).attr('href','member.php');
			 //console.log(r);
			  $('#msg').html(r);
		    })
	     } else {
	   return false;
	 }
});
//new post
$("#btn-save-post").click(function(){
var pst=$("#post-name").val();
if(pst==''){
	alert("ERR : please enter post name first");
	$("#post-name").focus();
}else{
	$.post('cassign.php',{newp:'pro',pst:pst},function(r){
		$("#post-name").val('');
		$("#xx").html(r);
		setInterval(function(){
		$("#xx").html('');	
		},5000);
	});
}
});
			//
$(".cassign").click(function(){
	var std=$(this).attr('bid');
	if(confirm("Do you really want to delete this student ?")){
		$.post('cassign.php',{delete:'kid',std:std},function(r){
			if(r.trim()=='success'){
				$(location).attr("href","member.php");
			}else{
				alert("Delete operation failed . Try again later :( ")
			}
		});
		
	}else{
		return false;
	}
});
</script>  

</body>
</html>
