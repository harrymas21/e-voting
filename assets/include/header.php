<?php
	session_start();
	//ob_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['username'],$_SESSION['password']))
	{
		header('Location: start.php?err=2');		
	}
	else
	{ //Continue to current page
		header( 'Content-Type: text/html; charset=utf-8' );
	}

	$name = $_SESSION['name'];
	$id = $_SESSION['id'];
	$role = $_SESSION['role'];
	$act = $_SESSION['act'];
	$voted = $_SESSION['voted'];
	$usr = $_SESSION['username'];
	$pwd  = $_SESSION['password'];
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="assets/img/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="TUK OVS" />
    <meta name="author" content="M.E.K" />
    <title>OVS | TUK</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="../js/dataTables/dataTables.bootstrap.css" />
    <link href="../css/example.css" />
    <style type="text/css">
        small{
           background-color:#f7f7f9 ;
        }
    </style>
</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">
                    <img src="assets/img/logo.png" alt="tuklogo" width="110" height="110" class="img-rounded" />
                </a>

            </div>
            <?php include"assets/include/profile.php";?>

    </div>
