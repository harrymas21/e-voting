// JavaScript Document
$(document).ready(function(){
$('#btnsave').click(function(ev){
	ev.preventDefault();
//declare all the variables from the form.
var fname = $("#fname").val();
var idno = $("#idno").val();
var rol = $("#rol").val();
var username = $("#username").val();
var password = $("#regnumber").val();
	var sch = $("#sch").val();

if(fname=='' && idno=='' && username=='' && password==''){
$('input[type="text"],input[type="password"], select').css("border","2px solid red","block");
}
else if( fname ==''){
$('input[type="text"],input[type="password"],select').css("border","2px solid blue");
$('#name-err').html('<p style="color: #ff0000;">First name field cannot be empty</p>');
}
else if( idno ==''){
$('input[type="text"],input[type="password"],select').css("border","2px solid blue");
$('#num-err1').html('<p style="color: #ff0000;">Enter ID/Passport number</p>');
}
else if( username ==''){
$('input[type="text"],input[type="password"],select').css("border","2px solid blue");
$('#username-er').html('<p style="color: #ff0000;">Username cant be empty</p>');
}

else if( password ==''){
$('input[type="text"],input[type="password"],select').css("border","2px solid blue");
$('#password-er').html('<p style="color: #ff0000;">Password cant be empty</p>');
}
else{
 $.post('reg.php',{fname:fname,idno:idno,rol:rol,username:username,sch:sch, regnumber:password},function(v){
	 $('#msg').html('<div class="alert alert-success">Record Successifully Saved!!</div>');
	 //$('#tt').load(location.href+'#tt*');
	 $("#ttt").trigger('reset');
	 setInterval(function(){
		$('#msg').html('');
	},5000);
 });}
});
});

//posts
$(document).ready(function(){
$('#btnmotion').click(function(ev){
	ev.preventDefault();
	
//declare all the variables from the form.
var subject = $("#subject").val();
var cap = $("#cap").val();
var file= $("#file").val();

if(subject=='' && cap=='' && file==''){
$('input[type="text"], input[type="file"]').css("border","2px solid red");
$('#mmc').html('<div class="alert alert-success">Kindly Fill all the Fields</div>');
}
if( subject ==''){
$('input[type="text"],input[type="file"]').css("border","2px solid blue");
$('#subj-err').html('<p style="color: #ff0000;">* Enter the Motion Subject</p>');
}
if( file ==''){
$('input[type="text"],input[type="file"]').css("border","2px solid blue");
$('#file-err').html('<p style="color: #ff0000;">* This field cannot be empty</p>');
}
if(cap =='')
{
$('input[type="text"],input[type="file"]').css("border","2px solid blue");
$('#cap-err').html('<p style="color: #ff0000;">* Upolad a Word Document</p>');
}
});
});
