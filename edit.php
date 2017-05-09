<?php
if(isset($_POST['id'])){
	
	$id=$_POST['id'];
include 'assets/include/conn.php';
$sql=mysql_query("SELECT * from members where id_no = '$id'") or die(mysql_error());
$row = mysql_fetch_array($sql);
}
?>
<!--edit modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Member Details:</h4>
      </div>
      <div class="modal-body">
        <form id="frm-edit" >
        <fieldset>
        <div class="form-group">
          <label>First Name:</label>
          <input type="text" class="form-control" id="fname1" value="<?php echo $row['first_name'];?>" />
        </div>
        <div class="form-group">
          <label for="">Second Name:</label>
          <input type="text" class="form-control" id="sname1" value="<?php echo $row['sec_name'];?>" />
        </div>
        <div class="form-group">
          <label for="">Telephone Number:</label>
          <input type="text" class="form-control" maxlength="15" id="tel1" value="<?php echo $row['telephone'];?>"/>
        </div>
        <div class="form-group">
          <label for="">Email Address:</label>
          <input type="text" class="form-control" id="email1" value="<?php echo $row['email'];?>" />
        </div>
        <div class="form-group">
          <label for="">ID Number:</label>
          <input type="text" maxlength="8" disabled class="form-control" id="idno1" value="<?php echo $row['id_no'];?>" />
        </div>
        </fieldset>
        <br />
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" type="submit" id="btnupdate" class="btn btn-primary pull-left glyphicon glyphicon-save"> Update</button>
        <button data-dismiss="modal" class="btn btn-danger pull-right glyphicon glyphicon-remove">Close</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$('#btnupdate').click(function(ev){
	ev.preventDefault();
	
//declare all the variables from the form.
var fname1 = $("#fname1").val();
var sname1 = $("#sname1").val();
var tel1 = $("#tel1").val();
var email1= $("#email1").val();
var idno1 = $("#idno1").val();

 $.post('userupdate.php',{fname1:fname1,sname1:sname1,tel1:tel1,email1:email1,idno1:idno1},function(v){
	 $('#msg').html('<div class="alert alert-success">Record Successifully Updated!!</div>');
	 console.log(idno1);
	  $("#all-members").load("member.php #all-members");
	   setInterval(function(){
		$('#msg').html('');
	},5000);
  });
 });
</script>