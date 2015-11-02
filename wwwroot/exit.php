<?php
	session_start();  
	session_unset($_SESSION["username"]);
	session_destroy();
?>

<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Your session has finished please login again.</title>
        <meta name="description" content="">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
    </head>
    <body class="admin-section">
    	<div id="header" class="purple">
			<?php include 'includes/header.php';?>
		</div>
		<div class="content-exit">
    		<h3>Your session has finished please login again.</h3>
    		<button class="btn-green btn-login" onclick="window.location.href='admin.php'" role="button">LOGIN</button>
		</div>
		 <?php include 'includes/footer.php';?>
    </body>
</html>



