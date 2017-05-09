<?php include"assets/include/header.php";?>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                    <?php
					 if($role == 0){
						 echo'
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php">Home</a></li>
                            <li><a href="election_set.php">election</a></li>
                            <li><a href="member.php">Members</a></li>
                            <li><a class="menu-top-active" href="results.php">Results</a></li>
                            <li><a href="reports.php">REPORTS</a></li>
                        </ul>';
					//login as student
					 }else if($role == 1){
						 echo'
						 <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php">Home</a></li>
                            <li><a href="vote.php">Vote</a></li>
                            <li><a href="apply.php">Apply</a></li>
                            <li><a class="menu-top-active" href="results.php">Results</a></li>
							
                        </ul>';
						
					//end						 
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
                    <h4 class="page-head-line">ELECTION RESULTS</h4>
                </div>
            </div>
             <style>
                    .red{color:white;}
                     h1{
                        
                        font-size: 2em;
                        font-weight: bold;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                    </style>
            <?php
			$sql = mysql_query("SELECT * FROM `elections` ORDER BY id DESC LIMIT 1 ");
                        $nes = mysql_fetch_array($sql);
                        $enddate = strtotime($nes['end_date']);
                        if (time()>$enddate)
                        {
                            ?>
            <div class="row">
             <div class="alert alert-info" align="center"><i class="fa fa-exclamation-circle"></i> Select a post to view the results</div>

              		<!-- Nav tabs -->
		<div id="std-res-chart" >
		<ul class="nav nav-tabs ">
			<?php
			$p=mysql_query("SELECT * FROM posts");
			$posts=array();
			while($ps=mysql_fetch_assoc($p)){
				$posts[]=$ps;
			}
			foreach ($posts as $post) {
				echo '<li class="' . $post['class_'] . '">
				<a class="cs-tech-cand" href="#cs-cand-' . $post['post_id'] . '" cs-post="' . $post['post_id'] . '"
				data-toggle="tab"><i class="fa fa-user"></i> ' . $post['post'] . '</a>
			</li>';
			}
		?>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<?php
			foreach ($posts as $pst) { ?>
		<div class="tab-pane fade in <?php echo $pst['class_']?>" id="cs-cand-<?php echo $pst['post_id']?>">
        <p style="color:#FFF">
		<?php echo strtoupper($pst['post'])?> Candidates</h5><br></p>
        <div class="<?php echo $pst['class_']?>" id="res-<?php echo $pst['post_id']?>" >
        
        </div>
        
		</div>
		<?php 
                        } 
                        }
 else {
     //ECHO time()."<BR>";
     //ECHO $enddate;
     echo "<h1 align='center'><img src='img/info.jpg' height='80' width='80'><span class='red'>Results will be available when the election is over.</span></h1>";
 }
                        ?>
		</div>
		</div> 
                            
           </div>
                
            </div><!--/.Container-->
            
            <div class="row"></div>
            <div id="edit-m"></div>
            <div class="row"></div>
        </div>
	<?php include"assets/include/footer.php"; ?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
     $(document).ready(function(){
    	resultsFor(1);
    });
    
    
	
    $(".u").on('dblclick',function(){
	var id=$(this).attr('bid');
	console.log(id);
	$.post('view.php',{id:id},function(r){
	  $('#edit-m').html(r);
		$('#vmtn').modal('show');
	  })
    })
	
	
	//view results
$(".cs-tech-cand").click(function(){
	var post=$(this).attr('cs-post');
	//
	resultsFor(post);
});
 var resultsFor=function(p){
 	$.post('aspirants.php',{results:p},function(rs){
 		$("#res-"+p).html(rs);
 	});
 };

	</script>
</body>
</html>
