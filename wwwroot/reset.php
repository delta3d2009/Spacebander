<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Reset Your Password</title>
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
    <?php
		require_once 'php/database_connection.php';
		
		if (isset($_GET['token']) && isset($_GET['email']) && isset($_GET['user']) ) 
		{
			$email = $_GET['email'];
			$token = $_GET['token'];
			$user = $_GET['user'];
			echo "<script src='js/jquery-1.11.0.min.js'></script><script src='js/bootstrap.js'></script><script src='js/jquery.validate.js'></script><script src='js/login.js'></script>";
		}
	      echo "<div class='content-reset'>
	      		<h2>Please fill out this form with the new password.</h2>
	      		<form id='resetForm' autocomplete='off' token='".$token."'>
				<div>
					<label>User</label>
					<input name='user' id='user' type='text' size='30'  value='".$user."' class='form-control' maxlength='30' required/>
				</div>
				<div>
					<label>Email</label>
					<input name='email' id='email' type='text' size='30'  value='".$email."' class='form-control' maxlength='30' required/>
				</div>
				<div>
					<label>Password</label>
					<input name='password' id='password' type='password' size='30' value='' class='form-control' maxlength='30' required/>
				</div>
				<div>
					<label>Confirm Password</label>
					<input name='confirmpassword' id='confirmpassword' type='password' size='30' value='' class='form-control' maxlength='30' required/>
				</div>
				<button type='submit' class='btn-green'>Submit</button>
				<button type='reset' class='btn-orange'>Reset</button>
				<div id='output'></div>
			</form>
    	 <script>setResetForm();</script>
    	 </div>";
    	 ?>
    	 <?php include 'includes/footer.php';?>
		<?php include 'includes/interstitial.php';?>
    </body>
</html>


