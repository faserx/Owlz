<?php
session_start();
include 'core.php';

$CMS = new CMS();
$page_content = "";

if(!$CMS->isLogged())
	header("Location: login.php");

if(isset($_POST['user'], $_POST['pass'], $_POST['email']))
{
	$CMS->newAdmin($_POST['user'], $_POST['pass'], $_POST['email']);
}

if(isset($_POST['logout'])){
	$CMS->logOut();
	header("Location: index.php");
}

if(isset($_POST['ruser']))
	$CMS->deleteAdmin($_POST['ruser']);
	
if(isset($_POST['npgname'], $_POST['npagecontent']))
	$CMS->create_page($_POST['npgname'], $_POST['npagecontent']);

if(isset($_GET['mod_page']) && isset($_POST['pagecontent']))
	$CMS->mod_page($_GET['mod_page'], $_POST['pagecontent']);

if(isset($_GET['logout']))
{
	$CMS->logOut();
	header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$("#adda").hide();
			$("#addp").hide();
			$("#rema").hide();
			$("#alpg").hide();
			$("#alpg2").hide();
			$("#delp").hide();
			$("#addadmin").click(function(){
				$("#addp").hide(150);
				$("#rema").hide(150);
				$("#delp").hide(150);
				$("#alpg").hide(150);
				$("#altpg2").hide(150);
				$("#adda").show(300);
			});
			
			$("#addpage").click(function(){
				$("#adda").hide(150);
				$("#rema").hide(150);
				$("#alpg").hide(150);
				$("#delp").hide(150);
				$("#altpg2").hide(150);
				$("#addp").show(300);
			});
			
			$("#removeadmin").click(function(){
				$("#adda").hide(150);
				$("#addp").hide(150);
				$("#alpg").hide(150);
				$("#altpg2").hide(150);
				$("#delp").hide(150);
				$("#rema").show(300);
			});
			
			$("#alterpage").click(function(){
				$("#adda").hide(150);
				$("#addp").hide(150);
				$("#rema").hide(150);
				$("#delp").hide(150);
				$("#altpg2").hide(150);
				$("#alpg").show(300);
			});
			
			$("#delpage").click(function(){
				$("#adda").hide(150);
				$("#addp").hide(150);
				$("#rema").hide(150);
				$("#alpg").hide(150);
				$("#altpg2").hide(150);
				$("#delp").show(300);
			});
		});
    </script>
    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<li> <a class="navbar-brand" href="#"><?php echo 'Benvenuto: '.$_SESSION['logged']['username'];?></a></li>
            <li><a href="?logout=0" id="logout">Logout</a></li>
            <li><a href="#help">Help</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#home" id="home">Dashboard home <span class="sr-only">(current)</span></a></li>
            <li><a href="#addadmin" id="addadmin">Add Admin</a></li>
            <li><a href="#removeadmin" id="removeadmin" >Remove Admin</a></li>
            <li><a href="#newpage" id="addpage">Add Page</a></li>
            <li><a href="#alterpage" id="alterpage">Alter Page</a></li>
            <li><a href="#delpage" id="delpage">Delete Page</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Welcome in your Dashboard</h1>
			<div id="altpg2"><?php
			if(isset($_GET['mod_page']))
			{
				$CMS->showTextPage($_GET['mod_page']);
			}
			if(isset($_GET['del_page']))
				$CMS->deletePage($_GET['del_page']);
			
			?></div>
			<div id="adda">
				<h2 class="sub-header">Add Admin</h2>
				<div class="col-md-6">
					<form method="POST" action="">
						<input type="text" id="inputUser" class="form-control" placeholder="Username" required="" autofocus="" name="user"><br>
						
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="pass"><br>
						
						<input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email"><br>
						
						<button class="btn  btn-primary btn-block" type="submit">Aggiungi</button>
					</form></div>
			</div>
			<div id="addp">
				<h2 class="sub-header">Add Page</h2>
				<div class="col-md-6">
					<form method="POST" action="">
						<input type="text" id="inputUser" class="form-control" placeholder="Page Name" required="" autofocus="" name="npgname"><br>
						<textarea rows="30" class="form-control" name="npagecontent"></textarea><br>
						
						<button class="btn  btn-primary btn-block" type="submit">Aggiungi</button>
					</form>
				</div>
			</div>
			<div id="alpg">
				<h2 class="sub-header">Alter Page</h2>
				<div class="col-md-6">
						<?php $CMS->showpagemod();?>
				</div>
			</div>
			<div id="delp">
				<h2 class="sub-header">Delete Page</h2>
				<div class="col-md-6">
							<?php $CMS->showpagedel(); ?>
			</div></div >
			<div id="rema">
				
				<h2 class="sub-header">Remove Admin</h2>
				<div class="col-md-6">
				<form method="POST" action="">
							<input type="text" id="inputUser" class="form-control" placeholder="Username" required="" autofocus="" name="ruser"><br>
							
							<button class="btn  btn-primary btn-block" type="submit">Rimuovi</button>
				</form>

			</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="http://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
