$('#btnlogin').click(function() {
	var user = $("#user1").val();
	var pass = $("#pass1").val();

	if (pass == '' && user == '') {
		$('input[type="password"],input[type="text"]').css("border", "2px solid red");
		//alert("Please Fill All Fields");
		//$('input[type="password"],input[type="text"]').css("box-shadow","0 0 3px red");
		$('#pass-err').html('<p style="color: red;">password field cannot be empty</p>');
		$('#user-err').html('<p style="color: red;">username field cannot be empty</p>');
	} else if (user == '') {
		$('input[type="text"]').css("border", "2px solid red");
		$('input[type="text"]').css("box-shadow", "0 0 3px red");
		$('input[type="password"]').css({
			"border" : "2px solid #00F5FF",
			"box-shadow" : "0 0 5px #00F5FF"
		});
		$('#user-err').html('<p style="color: #ff0000;">username field cannot be empty</p>');
		$('#pass-err').html('');
	} else if (pass == '') {
		$('input[type="password"]').css("border", "2px solid red");
		$('input[type="password"]').css("box-shadow", "0 0 3px red");
		$('input[type="text"]').css({
			"border" : "2px solid #00F5FF",
			"box-shadow" : "0 0 5px #00F5FF"
		});
		$('#pass-err').html('<p style="color: red;">password field cannot be empty</p>');
		$('#user-err').html('');
	} else {
		$.post('login.php', {
			user : user,
			pass : pass
		}, function(data) {
			console.log(data);
			if (data == 'success')
			 {
				//alert('you have successfuly logged in');
				$(location).attr('href', 'index.php');
			} 
			else if (data == 'fail')
			 {
				$('#messages').html('<div class="alert alert-danger">password or username does not exist</div>');
				$('#user-err').html('');
				$('#pass-err').html('');
				$('input[type="password"]').css({
					"border" : "2px solid #00F5FF",
					"box-shadow" : "0 0 5px #00F5FF"
				});
				$('input[type="text"]').css({
					"border" : "2px solid #00F5FF",
					"box-shadow" : "0 0 5px #00F5FF"
				});
				
			}
			else {
				$(location).attr('href', 'startpage_2.php');
				}
		}).error(function() {
			alert('an error occured');
		});
	}
});
$(document).ready(function() {
	$("#pass-reset").hide();
});
//reset password
$("#forgot-pass").click(function() {
	$("#pass-reset").show();
	//
	$("#id-number").focus();
});
$("#btn-res").click(function() {
	var id = $("#id-number").val();
	if (id == '') {
		alert('ERR: enter ID number first kid !');
		$("#id-number").focus();
	} else {
		$.post('cassign.php', {
			id : id
		}, function(res) {
			if (res.trim() == 'success') {
				$("#pass-reset").html('<i class="fa fa-check-circle"></i> SUCCESS :  password has been reset to <b>123456</b>');
			} else {
				$("#pass-reset").html('<i class="fa fa-warning"></i> ERROR :  password reset failed. contact admin.');
			}
			//
			setInterval(function() {
				$("#pass-reset").hide();
			}, 10000);
		});
	}
	//
});
