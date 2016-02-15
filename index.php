<?php

include 'core.php';

$CMS = new CMS;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Piero Aiello Dev ispired at bootstrap Basic Theme">
    <meta name="author" content="Piero Aiello">
    <link rel="icon" href="http://faserx.it/assets/img/favicon.ico">
    <title>Your Title</title>
	<!-- for navbar -->
    <link href="assets/css/grayscale.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- ionicons css for icons -->
    <link href="assets/css/ionicons.min.css" rel="stylesheet">
    
    <link href="assets/css/skillbar.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">


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
  
  <body  id="home" data-spy="scroll" data-target=".navbar-fixed-top" >

    <div id="h">
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
		<div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#home">
                    <span class="light">Your Title</span> 
                </a>
            </div>
           <div class="navbar-collapse navbar-right navbar-main-collapse collapse" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <li class="hidden active">
                        <a href="#home"></a>
                    </li>
                    <?php $CMS->show_menu(); ?>
                    <li >
                        <a href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
            </div></nav>
      <div class="logo"></div>
      <div class="container centered">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1Your Slogqn.</h1>
          </div>
        </div><!--/row-->

        <div class="row mt">
          <div class="col-sm-4">
            <i class="ion-ios7-monitor-outline"></i>
            <h3>Web Design</h3>
          </div><!--/col-md-4-->

          <div class="col-sm-4">
            <i class="ion-ios7-browsers-outline"></i>
            <h3>UI Development</h3>
          </div><!--/col-md-4-->

          <div class="col-sm-4">
            <i class="ion-ios7-copy-outline"></i>
            <h3>APP Development</h3>
          </div><!--/col-md-4-->
        
        </div><!--/row-->
      </div>
    </div><!--H-->

    <?php $CMS->show_page(); ?>
    
     
   
    <div id="g">
    <div class="container mt">
        <div class="row clients centered">
		   <p class="mb">Powered by</p>
          <div class="col-sm-2 col-sm-offset-1">
            <img src="assets/img/client2.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="assets/img/client4.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="assets/img/23735.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="assets/img/css3.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="assets/img/client5.png" alt="">
          </div>
        </div><!--/row-->
      </div></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/retina-1.1.0.js"></script>
    <script src="assets/js/custom.js"></script>
    <!--for navbar effect -->
	<script src="assets/js/grayscale.js"></script>
	<script src="assets/js/jquery.easing.min.js"></script>
  </body>
</html>
