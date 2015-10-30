<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Contact SpaceBander&reg;</title>
        <meta name="description" content="">
        <!-- Viewport tags-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- jQuery for Mobile CSS -->
        <link href="css/jquery.mobile-1.4.5.min.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
        <!-- Google fonts -->
		<link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

    </head>
    <body>
    	<div id="header" class="purple">
		    <nav class="navbar navbar-inverse">
				<div class="container-fluid">
				    <div class="navbar-header">	
				      	<a class="navbar-brand"  href="index.php"><img class="img-responsive" src="img/desktop/spacebander-logo.jpg"></a>
				      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					        	<span class="icon-bar"></span>
					        	<span class="icon-bar"></span>
					       		<span class="icon-bar"></span> 
				      	</button>
				    </div>

				    <div id="myNavbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
					        <li><a href='index.php'>HOME</a></li>
					        <li><a href='about.php'>ABOUT</a></li>
					        <li><a href='find-physicians.php'>FIND A PHYSICIAN</a></li>
					        <li class='active'><a href='contact.php'>CONTACT</a></li>
						</ul>
				    </div>
				</div>
			</nav>
		</div>

	<!-- Header================================================== -->
		<div id="contact-us">
    		<div class="container-fluid">
    			<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1>Contact Us!</h1>
					</div>
				</div>
			</div>
		</div>

	<!-- Header================================================== -->
	<!-- content ================================================== -->
		<div id="contact-us" class="content green">
    		<div class="container-fluid">
    			<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
						
					<div class="contact-container">
						<div class="contact-container-2">
							<img class="logo" src="img/desktop/spacebander-logo-sm.jpg" alt="SpaceBander Logo">
							<h3>Spacebander Corporation</h3>
								<p>Call • 908.334.1323</p>
								<p>Send • PO Box 221, Belmar, NJ 07719</p>
								<p>Email • support@spacebander.com</p>
						</div>
							
						<div>
							<h3>I’m interested.</br>Please send me more information:</h3>
							<h4>Your information is always kept private.</h4>
						</div>

							<form id="contactForm" class="contact-form" autocomplete="off">
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
								<button type="submit" class="btn-green">Submit</button>
								<button type="reset" class="btn-green">Reset</button>
								<div id="output"></div>
							</form> 
						
						<h5>Thanks for your interest.</br>We will contact you shortly!</h5>
							
						</div>

					</div>
				</div>
			</div>
		</div>


		<?php include 'includes/footer.php';?>

	</div>	<!-- END Body===================== -->

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