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
    <body class="body-iframe">
		<div>
    	 	<div class='container'>
	    	  	<!-- Main component for a primary marketing message or call to action -->
			      <div class='jumbotron iframe-jumbotron'>
					<form id='forgotForm' autocomplete='off'>
						<div>
							<label>Email</label>
							<input name='email' id='email' type='email' size='20' value='' class='form-control' maxlength='30'/>
						</div>
						<button type='submit' class='btn btn-primary'>Send</button>
						<button type='reset' class='btn btn-default'>Reset</button>
						<div id='output'></div>
					</form>			
			      </div><!-- End Main component for a primary marketing message or call to action -->
			 </div><!-- End Container -->
    	 </div><!-- End Wrapper -->
    </body>
    <?php include 'includes/interstitial.php';?>
    	<!-- Bootstrap core JavaScript
    	================================================= -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.validate.js"></script>
        <!-- Custom Script -->
        <script src="js/admin.js"></script>
</html>