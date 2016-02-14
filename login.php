<?php
session_start();
include 'core.php';

$CMS = new CMS();

if(isset($_POST['user'], $_POST['pass']))
{
	if($CMS->login($_POST['user'], $_POST['pass']))
		header("Location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Piero Aiello Dev ispired at bootstrap Basic Theme">
    <meta name="author" content="Piero Aiello">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Login</title>
    
    <link href="assets/css/bootstrap.css" rel="stylesheet">
     <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="assets/js/jquery.min.js"></script>
   
			
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>


  </head>
  <body>
	<div class="container">
	<form class="form-signin" method="POST" action="">
		<input type="text" id="inputUser" class="form-control" placeholder="Username" required="" autofocus="" name="user" id="user">
		<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="pass" id="pass">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form></div>
  </body>
