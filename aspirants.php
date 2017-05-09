<?php
require 'assets/include/conn.php';
session_start();
$sch=$_SESSION['sch'];
if(isset($_POST['aspirants'])){
     $p=$_POST['pst'];
	//
     $sq="SELECT * FROM cassign_aspirants_view WHERE post_id='$p' AND status=1 ";
         if($p==5){
            //echo $sch."this is school";
		//$sq="SELECT * FROM cassign_aspirants_view WHERE post_id='$p' AND status=1 AND sch = $_SESSION[sch]";
               // $sq="SELECT * FROM cassign_aspirants_view WHERE post_id='$p' AND status=1 AND sch = '$sch'";
	$sq .= "AND sch='$sch'";   
         }
	$query=mysql_query($sq." ORDER BY name");
	if(mysql_num_rows($query)>0){
	 //$myguy=mysql_fetch_assoc($query);
		?><br />
	    <div class="panel panel-default">
                   <div class="panel-heading">
                       Please select your candidate to vote
                   </div>
                  <div id="result" class="panel-body">
                  	
                	<?php
						while($row = mysql_fetch_assoc($query)){
					?>
					<div class="col-lg-3">
					<fugure class="thumbnail">
                                            <img src='<?php echo $row['img']?>' height='100' width='100' class='img-responsive thumbnail'>
						
							<p>Name: <?php echo $row['name'];?></p>
							<p>Position: <?php echo $row['post'];?></p>
							<hr />
						<label>Select to Vote:</label> <input type="radio" class="vote-now" name="vote-<?php echo $p ?>" id="check_yes" cs-post="<?php echo $row['post_id'];?>" cs-std="<?php echo $row['id'];?>" >
					</fugure>
					</div>
					<?php
						}
					                	
                	?>
                	</div>
                	<div class="panel-footer" align="center">
                		<button class="btn btn-info" id="cassign-vote-<?php echo $p ?>">Submit Vote</button>
                	</div>
                </div>
                <script>
                	//
                	$("#cassign-vote-<?php echo $p ?>").click(function(){
                	   // var pst=0,std=0;
                	    pst=$('input[name="vote-<?php echo $p ?>"]:checked').attr('cs-post');
                	    std=$('input[name="vote-<?php echo $p ?>"]:checked').attr('cs-std');
                		if(pst ==null || std ==null){
                			alert("select the aspirant you want to vote first");
                		}else{
                			if(confirm("Are you sure you want to vote for this aspirant ?"))
							{$.post('wire.php',{vote:'4 cassign',std:std,pst:pst},function(f){
                				$(location).attr('href','vote.php?'+f);
                				
                			});
							}
							else return false;
                		}
                		
                	});
                </script>
		
		<?php
		
	}else{
		echo '<br/><div class="alert alert-info" align="center"><i class="fa fa-exclamation-circle"></i> no aspirants found for this position</div>';
	}
}
/////get results
else if(isset($_POST['results'])) {
	$p=$_POST['results'];
		//
        if($p==5){
            //echo $sch."this is school";
		//$sq="SELECT * FROM cassign_aspirants_view WHERE post_id='$p' AND status=1 AND sch = $_SESSION[sch]";
                $query=mysql_query("SELECT * FROM cassign_aspirants_view WHERE post_id='$p' AND status=1 AND sch = '$sch' ORDER BY votes DESC");
	}
        else
	$query=mysql_query("SELECT * FROM cassign_aspirants_view WHERE post_id='$p' AND status=1 ORDER BY votes DESC");
	//
	$total=mysql_result(mysql_query("SELECT SUM(votes) FROM cassign_aspirants_view WHERE post_id='$p' GROUP BY post_id"),0);
	if(mysql_num_rows($query)>0){
	 //$myguy=mysql_fetch_assoc($query);
		?><br />
	    <div class="panel panel-default">
                   <div class="panel-heading">
                       Preliminary results as at <?php echo date('l,jS M Y H:i:s a') ?>
                   </div>
                  <div id="result" class="panel-body">
                  	
                	<?php
						while($row = mysql_fetch_assoc($query)){
					?>
					<div class="col-lg-3">
					<fugure class="thumbnail">
						<img src='<?php echo $row['img']?>' height='100' width='100' class='img-responsive thumbnail'>
						
							<p>Name: <?php echo $row['name'];?></p>
							<p>Position: <?php echo $row['post'];?></p>
							<p>School: <?php echo $row['sch'];?></p>
							<hr />
						 <button class="btn btn-primary">Votes : <?php echo $row['votes'] ?> <i>out of </i> <?php echo $total ?> Est.=> <?php echo number_format((($row['votes']/$total)*100),2 )?>%</button>
					</fugure>
					</div>
					<?php
						}
					                	
                	?>
                	</div>
                </div>
		<script>
			$(document).ready(function(){
			$("#cassign-hide-this-<?php echo $p ?>").hide();	
			});
		</script>
		<?php
		
	}else{
		echo '<br/><div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> no votes found for this position yet.</div>';
	}
	
	
	
	
}

else{
	echo "string";
}
?>
