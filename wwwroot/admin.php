<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Staff Dashboard Login</title>
        <meta name="description" content="">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <!--<link rel="stylesheet" type="text/css" href="css/mobile.css">-->
        <!-- Google Fonts -->
       <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,300,500,600,700,800,900,200' rel='stylesheet' type='text/css'>
    </head>
    <body class="admin-section login-section">
  		<div id="header" class="purple">
			<?php include 'includes/header.php';?>
		</div>
		<div class="admin-container">
	    	  	<h1>Staff Dashboard</h1>
	    	  	<!-- Main component for a primary marketing message or call to action -->
			      <div class="content">
			        <form id="signin">
			        	<h2>ENTER YOUR USERNAME AND PASSWORD TO LOGIN:</h2>
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
						<button class="btn-green btn-login" href="#" role="button" type="submit">LOGIN</button>
						<a class="link" href="#" onClick='configModalForgot(); return false;'>Problems login in? Click here.</a>
						<div id="output"></div>
					</form>					
			      </div><!-- End Content -->
			 </div><!-- End Container -->
			 <?php include 'includes/footer.php';?>
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