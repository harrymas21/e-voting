<?php
if(isset($_POST['id'])){
	
	$id=$_POST['id'];
include 'assets/include/conn.php';
$sql=mysql_query("SELECT * from motion where sn = '$id'") or die(mysql_error());
$row = mysql_fetch_array($sql);
$word = $row['motion'];
}
?>
<!-- modal -->
<div class="modal fade" id="vmtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Read Motion:</h4>
      </div>
      <div class="modal-body">
        <form id="save" method="post" >
        <?php echo"<strong>Subject of motion:</strong> ".$row['subject'];?><br />
        <?php echo"<strong>Constitution Requirement:</strong> ".$row['constitution'];?><br />
        <?php echo"<strong>Motion Proposed by:</strong> ".$row['names'];?><br />
        <hr />
<!--PHP FILE TO READ A WORD DOCUMENT-->
        <?php
	function read_file_docx($filename){
		$striped_content = '';
		$content = '';
		
		if(!$filename || !file_exists($filename)) return false;
		
		$zip = zip_open($filename);
		
		if (!$zip || is_numeric($zip)) return false;
	
	
		while ($zip_entry = zip_read($zip)) {
			
			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
			
			if (zip_entry_name($zip_entry) != "word/document.xml") 
			continue;

			$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			
			zip_entry_close($zip_entry);
		}// end while
	
		zip_close($zip);
		
		echo $content;
	}
			
	$filename = "$word";
	$content = read_file_docx($filename);
	if($content !== false) {
		
		echo nl2br($content);	
	}
	else {
		echo 'Couldn\'t display the file. Please check that file.';
	}
	
?>
        <!--//END OF THE PHP FILE-->
        
        <div class="modal-footer">
        <a data-dismiss="modal" class="btn btn-danger pull-right glyphicon glyphicon-remove">Close</a>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->