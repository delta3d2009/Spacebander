<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Administrador Dashboard</title>
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
					<form id="contactForm" autocomplete="off">
						<div>
							<label>First Name</label>
							<input name="contactfirstname" id="contactfirstname" type="text" size="80" value="" class="form-control" maxlength="80" required/>
						</div>
						<div>
							<label>Last Name</label>
							<input name="contactlastname" id="contactlastname" type="text" size="80" value="" class="form-control" maxlength="80" required/>
						</div>
						<div>
							<label>Email</label>
							<input name="email" id="email" type="email" size="20" value="" class="form-control" maxlength="30" required/>
						</div>
						<div>
							<label>Confirm Email</label>
							<input name="confirmemail" id="confirmemail" type="email" size="20" value="" class="form-control" maxlength="30" required/>
						</div>
						<div>
							<label>Phone</label>
							<input name="phone" id="phone" type="text" size="20" value="" class="form-control" maxlength="20"/>
						</div>	
						<div>
							<label>Message</label>
							<textarea name="message" id="message" class="form-control" rows="5" maxlength="200"></textarea>
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
						<button type="reset" class="btn btn-default">Reset</button>
						<div id="output"></div>
					</form> 
			      </div><!-- End Main component for a primary marketing message or call to action -->
			      <?php include 'includes/footer.php';?>
			 	  <?php include 'includes/interstitial.php';?>
			 </div><!-- End Container -->
    	 </div><!-- End Wrapper -->

    	<!-- Bootstrap core JavaScript
    	================================================= -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.validate.js"></script>
        <!-- Custom Script -->
        <script src="js/core.js"></script>
    </body>
</html>