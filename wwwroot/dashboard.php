<?php
	session_start();  
	//echo "------------------ " . $_SESSION["username"]; 
	if (empty($_SESSION["username"])) 
	{
		header("Location: exit.php");
		session_unset($_SESSION["username"]);
		session_destroy ();
	}
?>

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
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <!--<link rel="stylesheet" type="text/css" href="css/mobile.css">-->
        <!-- Google Fonts -->
       <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,300,500,600,700,800,900,200' rel='stylesheet' type='text/css'>
         <!-- Google Maps API -->
        <script src="https://maps.googleapis.com/maps/api/js" type="text/javascript"></script>
    </head>
    <body class="admin-section dashboard-section">
    	 <div id="header" class="purple">
		<?php include 'includes/header.php';?>
	</div>
    	 	<div class="admin-container dashboard">
    	 		<h1>Staff Dashboard.</h1>
	    	  	<!-- Main component for a primary marketing message or call to action -->
			      <div class="content">
			      	<div class="tabs-dashboard">
				        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				        	  <li role="presentation" class="active"><a href="#edit"data-toggle="tab">Directory</a></li>
						  <li role="presentation"><a href="#insert" data-toggle="tab">Add New</a></li>
						  <li role="presentation"><a href="#report" data-toggle="tab">Run Reports </a></li>
						  <a class="link" href="exit.php">Logout</a>
						</ul>
					</div>
					<div id="tab-content" class="tab-content">
						<div class="tab-pane" id="insert">
							<form id="insertForm" autocomplete="off">
								<h3>ADD A NEW PHYSICIAN / PRACTICE:</h3>
								<div class="left-side">
									<div>
										<label>Company</label>
										<input name="mediccompany" id="mediccompany" type="text" size="50" value="" class="form-control" maxlength="80" required/>
									</div>
									<div>
										<label>First Name</label>
										<input name="medicfirstname" id="medicfirstname" type="text" size="80" value="" class="form-control" maxlength="80" required/>
									</div>
									<div>
										<label>Last Name</label>
										<input name="mediclastname" id="mediclastname" type="text" size="80" value="" class="form-control" maxlength="80" required/>
									</div>
									<div>
										<label>Address</label>
										<input name="address" id="address" type="text" size="80" value="" class="form-control" maxlength="80" required/>
									</div>
									<div>
										<label>Suite #</label>
										<input name="suite" id="suite" type="text" size="80" value="" class="form-control" maxlength="80"/>
									</div>
									<div>
										<label>City</label>
										<input name="city" id="city" type="text" size="40" value="" class="form-control" maxlength="40" required/>
									</div>
									<div>
										<label>State</label>
										<input name="state" id="state" type="text" size="2" value="" class="form-control" maxlength="40" required/>
										<?php include 'includes/states.php';?>
									</div>
								</div>
								<div class="right-side">
									<div>
										<label>Zip</label>
										<input name="zip" id="zip" type="text" size="5" value="" class="form-control" maxlength="5" onKeyPress="return numbersonly(this, event)"/>
									</div>
									<div>
										<label>Country</label>
										<?php include 'includes/countries.php';?>
									</div>	
									<div>
										<label>Office Phone</label>
										<input name="phone" id="phone" type="text" size="20" value="" class="form-control" maxlength="20"/>
									</div>
									<div>
										<label>Physician's Cell</label>
										<input name="cell" id="cell" type="text" size="20" value="" class="form-control" maxlength="20"/>
									</div>
									<div>
										<label>Physician's Email</label>
										<input name="email" id="email" type="email" size="20" value="" class="form-control" maxlength="30"/>
									</div>
									<div>
										<label>Physicians' Fax</label>
										<input name="fax" id="fax" type="text" size="20" value="" class="form-control" maxlength="20"/>
									</div>
									<div>
										<label>Office Contact Name</label>
										<input name="office" id="office" type="text" size="20" value="" class="form-control" maxlength="50"/>
									</div>
									<div id="map"></div>
								</div>
								<button type="submit" class="btn-green">Save</button>
								<button type="reset" class="btn-orange">Reset</button>
								<div id="output"></div>
							</form>
						</div>
						<div class="tab-pane active" id="edit">
							<div class="filter">
								<h3>directory of registered physicians and practices:</h3>
								<form id="searchForm" autocomplete="off">
									<input name="parameter" id="parameter" type="text" size="50" value="" maxlength="50"/>
									<button type="submit" class="btn-magnifying-glass"></button>
								</form>
							</div>
							<?php include 'php/searchPhysician.php';?>
						</div>
						<div class="tab-pane" id="report">
							<h3>SELECT FILTERS TO RUN REPORT:</h3>
							<form id="excelForm" autocomplete="off">
								<div class="radios">
									<div class="radio">
									  <input type="radio" name="optionsRadios" id="optionsRadios1" value="Physician" checked>
									  <label for="optionsRadios1">Physicians</label>
									</div>
									<div class="radio">
									  <input type="radio" name="optionsRadios" id="optionsRadios2" value="Subscribers">
									  <label for="optionsRadios2">Subscribers</label>
									</div>
								</div>
								<button type="submit" class="btn-green">Download Excel Spreadsheet</button>
							</form>
						</div>			
					</div> 
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
        <script src="js/jquery.screwdefaultbuttonsV2.js"></script>
        <!-- Custom Script -->
        <script src="js/admin.js"></script>
    </body>
</html>