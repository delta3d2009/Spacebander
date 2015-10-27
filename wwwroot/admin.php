<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Administrador Login</title>
        <meta name="description" content="">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
    </head>
    <body>
    	 <div id="wrapper" >
    	 	<div class="container">
	    	  	<?php include 'includes/header.php';?>
	    	  	<!-- Main component for a primary marketing message or call to action -->
			      <div class="jumbotron">
			        <form id="signin">
						<div id="username">
							<span class="required">*</span>
							<label>User</label>
							<input name="user" type="text" size="16" value="" class="form-control"/>
						</div>
						<div id="password">
							<span class="required">*</span>
							<label>Password</label>
							<input name="pass" type="password" size="32" value="" class="form-control"/>
						</div>
						<button type="submit" class="btn btn-default">Log In</button>
						<div id="output"></div>
					</form>
					<a href="#" onClick='configModalForgot(); return false;'>Forgot Your Password</a>
			      </div><!-- End Main component for a primary marketing message or call to action -->
			 </div><!-- End Container -->
			 <?php include 'includes/footer.php';?>
    	 </div><!-- End Wrapper -->
    	 <?php include 'includes/interstitial.php';?>
    	<!-- Bootstrap core JavaScript
    	================================================= -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.validate.js"></script>
        <!-- Custom Script -->
        <script src="js/login.js"></script>
    </body>
</html>