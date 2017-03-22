<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Contact SpaceBander</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- jQuery for Mobile CSS -->
        <link href="css/jquery.mobile-1.4.5.min.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/tablet.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
        <!-- Google fonts -->
		    <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		    <!-- Viewport tags-->
		    <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'includes/favicons.php';?>
    </head>
    <body class="contact-section">
    	<div id="header" class="purple">
		    <?php include 'includes/header.php';?>
		</div>

	<!-- Header================================================== -->
		<div id="contact-us">
    		<div class="container-fluid">
    			<div class="row">
					<div class="title">
						<h1>Contact Us!</h1>
					</div>
				</div>
			</div>
		</div>

	<!-- Header================================================== -->
	<!-- content ================================================== -->
		<div id="contact-us" class="content green">
    		<div class="container-fluid">
					<div class="contact-container">
						<div class="contact-container-2">
							<img class="logo" src="img/desktop/spacebander-logo-sm.jpg" alt="SpaceBander Logo">
							<h3>Spacebander Corporation</h3>
								<p>Phone: <a href="tel:855-853-6100">855-853-6100</a></p>
								<p>Address: PO Box 221, Belmar, NJ 07719</p>
								<p><a href="mailto:support@spacebander.com">support@spacebander.com</a></p>
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
									<input name="confirmemail" id="confirmemail" type="email" size="50" value="" class="form-control" maxlength="50" required/>
								</div>
								<div>
									<label>Phone (<em>optional</em>)</label>
									<input name="phone" id="phone" type="text" size="20" value="" class="form-control" maxlength="20"/>
								</div>
								<div>
									<label>Message</label>
									<textarea name="message" id="message" class="form-control" rows="5" maxlength="200"></textarea>
								</div>
								<button type="submit" class="btn-green">Submit</button>
								<button type="reset" class="btn-green green-reset">Reset</button>
								<div id="output"></div>
							</form>

						<h5>Thanks for your interest.</br>We will contact you shortly!</h5>

					</div>
			</div>
		</div>


		<?php include 'includes/footer.php';?>
		<?php include 'includes/interstitial.php';?>
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
