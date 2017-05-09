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
                            <li><a href="register.php">Register</a></li>
                            <li><a href="member.php">Members</a></li>
							<li><a href="approve.php">Approve</a></li>
                            <li><a href="results.php">Results</a></li>
                            <li><a href="reports.php">REPORTS</a></li>
                        </ul>';
					//login as MCA:
					 }else if($role == 1){
						 echo'
						 <ul id="menu-top" class="nav navbar-nav navbar-right">
                             <li><a class="menu-top-active" href="index.php">Home</a></li>
                            <li><a class="menu-top-active" href="vote.php">Vote</a></li>
                            <li><a href="apply.php">Apply</a></li>
                            <li><a href="results.php">Results</a></li>
							
                        </ul>';
					//LOGIN AS SPEAKER / D. SPEAKER		
									 
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
                     <style>
                    .white{color:white;}
                     h1{
                        
                        font-size: 2em;
                        font-weight: bold;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                    .red{color:red;}
                     h1{
                        
                        font-size: 2em;
                        font-weight: normal;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                </style>
                     <?php
                $sql = mysql_query("SELECT * FROM `elections` ORDER BY id DESC LIMIT 1 ");
                $nes = mysql_fetch_array($sql);
                
                $date = strtotime($nes['end_date']);
                $starttime = strtotime($nes['start_date']);
                $remaining = $date - time();
                $minutes_remaining = floor($remaining / 60);
                $days_remaining = floor($remaining/86400);
                $hours_remaining = floor(($remaining % 86400)/3600);
                ?>
                    <h4 class="page-head-line">Voting Session [ <?php
                    if (time()>=$date){
                    echo "<span class='white'>".($hours_remaining*(-1))."h : ".($minutes_remaining*(-1))."minutes have passed.</span>";
                    } 
                    elseif (time()>=$starttime) {
                      echo "<span class='white'>".$hours_remaining."hrs :".$minutes_remaining."minutes remaining.</span>";  
                    }
                    else echo "<span class='white'>Voting has not started yet.</span>";
                            ?> ]
                    </h4>
                </div>
            </div>
            <?php  
             if (time()>$starttime){
                 if(time()<$date){
            if($voted==1) {
	          echo '<div class="alert alert-danger" align="center"><i class="fa fa-warning"></i> ERROR : cant vote again. you have already voted</div>';
				}else{?>
            <div class="row">
               <div class="alert alert-info" align="center"><i class="fa fa-exclamation-circle"></i> Select a post to view applicants and vote.<hr />
               	NB:// vote each post a time and finish all post during one session .DO NOT LOGOUT. otherwise no second chances. 
               </div>

              		<!-- Nav tabs -->
		<div id="std-res-chart" >
		<ul class="nav nav-tabs ">
			<?php
			$posts_voted=$_SESSION['posts_voted'];
			//print_r($posts_voted);
			$p=mysql_query("SELECT * FROM posts");
			$posts=array();
			while($ps=mysql_fetch_assoc($p)){
				$posts[]=$ps;
			}
			$pid=array();
			$dfd=mysql_query("select post_id from posts");
			while($psw=mysql_fetch_array($dfd)){
				$pid[]=$psw;
			}
			//echo "string ".count(array_diff($posts_voted, $pid));
			/*if voted all
			if(count(array_diff($posts_voted, $pid))==0){
				echo '<div class="alert alert-warning" align="center"><i class="fa fa-warning"></i> DONE : you have voted for all aspirants. check results for realtime feedback.	</div>';
			}*/
			foreach ($posts as $post) {
				if(in_array($post['post_id'], $posts_voted)){
					//echo "already voted";
					continue;
				}else{
				echo '<li class="' . $post['class_'] . '">
				<a class="cs-tech-cand" href="#cs-cand-' . $post['post_id'] . '" cs-post="' . $post['post_id'] . '"
				data-toggle="tab"><i class="fa fa-user"></i> ' . $post['post'] . '</a>
			</li>';
				}
			}
             
		?>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<?php
			foreach ($posts as $pst) { 
				if(in_array($pst['post_id'], $posts_voted)){
				continue;
				}else{?>
		<div class="tab-pane fade in <?php echo $pst['class_']?>" id="cs-cand-<?php echo $pst['post_id']?>">
		<!--<h5 class="page-header breadcrumb"><i class="fa fa-file"></i> <?php echo strtoupper($pst['post'])?> Candidates </h5>-->
        <div class="<?php echo $pst['class_']?>" id="res-<?php echo $pst['post_id']?>" >
        </div>
		</div>
		<?php } } ?>
		</div>
		</div>                      
           </div>
             <?php 
             
                                }
                 }
                                else echo "<h1><span class='red'><img src='img/LOCKPASS.JPG' height='70' width = '70'>Voting has already ended.</span></h1>";
             }
             else echo "<h1 align='center'><span class='white'><img src='img/LOCKPASS.JPG' height='70' width = '70'>Voting has not started yet.</span></h1>";

             ?>   
            </div><!--/.Container-->
            
            <div class="row"></div>
            <div id="edit-m"></div>
            <div class="row"></div>
        </div>
    </div>
	<?php include"assets/include/footer.php";?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/login.js"></script>
    <script>
    $(document).ready(function(){
    	aspirantsIn(0);
    });
    
	 $(function(){
     $('#vid').attr('type','hidden');
	 $('#btnvote').attr('type','hidden');
	 
     $('#check_yes').click(function(){
         var check = $(this);
         if (check.is (':checked')){
             $('#vid').attr('type','text');
			 $('#btnvote').attr('type','submit');
		 }
	   });
	   
	   $('#check_no').click(function(){
         var check = $(this);
         if (check.is (':checked')){
             $('#vid').attr('type','text');
			 $('#btnvote').attr('type','submit');
		 }
	   });
     });
//modal to read the motion.
    $(".k").on('dblclick',function(){
	var id=$(this).attr('bid');
	console.log(id);
	$.post('view.php',{id:id},function(r){
	  $('#edit-m').html(r);
		$('#vmtn').modal('show');
	  })
    })
	
//AUTO FRESH THE RESULTS DIV-BY ID
/*    $(document).ready(function(){
        var $container = $("#result");
        $container.load("vote.php");
        var refreshId = setInterval(function(){
            $container.load('vote.php');
        }, 1500);
    });
*/	
//load candidates for certain post
$(".cs-tech-cand").click(function(){
	var post=$(this).attr('cs-post');
	//
	aspirantsIn(post);
});
 var aspirantsIn=function(p){
	$.post('aspirants.php',{aspirants:'team nugu',pst:p},function(rs){
 		$("#res-"+p).html(rs);
 	});
 };


</script>
</body>
</html>
