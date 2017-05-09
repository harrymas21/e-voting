<?php 
require"assets/include/conn.php";
$name = $_SESSION['name'];
	$id = $_SESSION['id'];
	$sch = $_SESSION['sch'];
	$role = $_SESSION['role'];
	$act = $_SESSION['act'];
	$voted = $_SESSION['voted'];
	$usr = $_SESSION['username'];
	$pwd  = $_SESSION['password'];
//condition for the student
if($role == 0){
$rol = "System Administrator:";
$dec = "System Admin";	
}else if($role == 1){
$rol = "Registered Voter";
$dec = "Student";	
}
//SQL statement to select details of the logged student
$sql = mysql_query("SELECT * FROM students WHERE id = '$id'") or die (mysql_error());
$row = mysql_fetch_array($sql);
?>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fa fa-user-plus" color="yellow" style="font-size: 25px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a id="c" class="media-left" href="#">
                                        <img src="assets/img/logo.png" alt="" width="70" height="95" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $name ?></h4>
                                        <h5><?php echo $dec ?></h5>

                                    </div>
                                </div>
                                <hr />
                                <p>
                                 <?php echo $rol;?>
                                </p>
                                <hr />
                                <a href="#prof" data-toggle="modal" class="btn btn-info btn-sm">FULL PROFILE</a>
                                <hr>
                                <?php
                                if($role == 1){
                                echo '<a href="malpractice.php" class="btn btn-info btn-sm">REPORT MALPRACTICE</a>';
                                }
                                else {
                                    echo '<a href="malpractices.php" class="btn btn-info btn-sm">SEE MALPRACTICES</a>'; 
                                    
                                }
                                ?>
                                <hr>
                                <?php
                                echo '<a href="authenticate.php?action=logout" class="btn btn-danger btn-sm">LOGOUT</a>';
			?>
                                </div>
                        </li>                        
                      </ul>
                </div>
            </div>
<!-- modal -->
<div class="modal fade" id="prof">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Personal Details:</h4>
      </div>
      <div class="modal-body">
        <form id="save" method="post" >
        <fieldset>
        <div class="form-group">
            <label>Full Names:</label>
            <input type="text" class="form-control" disabled="disabled" value="<?php echo $name;?>" />
        </div>
        <div class="form-group">
            <label>ID:</label>
            <input type="text" class="form-control" disabled="disabled" value="<?php echo $id;?>"/>
        </div>
		 <div class="form-group">
            <label>School:</label>
            <input type="text" class="form-control" disabled="disabled" value="<?php echo $sch;?>"/>
        </div>
        <div class="form-group">
            <label>Member Role:</label>
            <input type="text" class="form-control" disabled="disabled" value="<?php echo $dec ;?>"/>
        </div>
        </fieldset>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-danger pull-right glyphicon glyphicon-remove">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->