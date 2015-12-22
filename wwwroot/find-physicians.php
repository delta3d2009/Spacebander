<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Find a SpaceBander Certified Physician</title>
        <meta name="description" content="">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/tablet.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
        <!-- styles needed by jScrollPane -->
		<link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
        <!-- jQuery for Mobile CSS -->
        <!--<link href="css/jquery.mobile-1.4.5.min.css" rel="stylesheet">-->
        <!-- Google Maps API -->
        <script src="https://maps.googleapis.com/maps/api/js" type="text/javascript"></script>
        <!-- Google fonts -->
		<link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <!-- Viewport tags-->
		<meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
 	    <body class="find-physicians-section">
    	<div id="header" class="purple">
		    <?php include 'includes/header.php';?>
		</div>

	<!-- Header================================================== -->
		<div id="find_header">
    		<div class="container-fluid"> 
    			<div class="row">
					<div class="">
						<div class="banner_bg_find">
							<div class="headline ">
								<h1>Find a SpaceBander<sup>&reg;</sup> Certified Physician in your area!</h1>
								<h2>SpaceBander<sup>&reg;</sup> is inexpensive and completely covered by all insurance companies. Use this tool to find a Certified Physician near you.</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Header================================================== -->

	<!-- content ================================================== -->
		<div id="find-physicians" class="content green">
    		<div class="container-fluid">
    			<div class="row">
					<div>

						<div class="find">
						<h3>Search for Physicians in your area</h3>
						    <p>Are you ready to take the next step?  Find a physician in your area that is knowledgeable about hemorrhoids and certified to conduct the non-surgical SpaceBander<sup>&reg;</sup> procedure in the comfort of his or her office.</p>
							        		
				      	<div class="controls">
				      		
				        <form id="findForm">
				        		<label>SEARCH BY ZIP CODE/CITY</label>
				        		<a class="activate-mobile-location" href="#" onclick="increaseResultsHeight(); searchLocations();">SEARCH BY LOCATION</a>
						    <input type="text" id="addressInput" size="10" class="form-control"/>        
						  <!--  <select id="radiusSelect" class="form-control dropdown-menu" role='menu'> 
						      <option value="25" selected>25mi</option>
						      <option value="100">100mi</option>
						      <option value="200">200mi</option>
						      <option value="200">300mi</option>
						      <option value="200">400mi</option>
						  </select>-->
						  <!--<div class="btn-group">
			                 <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
			                   <span data-bind="label">Select Radius</span>&nbsp;<span class="caret"></span>
			                 </button>
			                 <ul class="dropdown-menu" role="menu">
			                   <li value="25"><a href="#">25 milles</a></li>
			                   <li value="50"><a href="#">50 milles</a></li>
			                   <li value="100"><a href="#">100 milles</a></li>
			                   <li value="200"><a href="#">200 milles</a></li>
			                 </ul>
			            </div>-->			
						    <!--<input type="button" onclick="searchLocations()" value="Search"/>-->
						    <button type="submit" class="search-icon"></button>
						 </form>
						 	<label>PHYSICIANS CLOSEST TO YOUR ZIP CODE</label>
						 	<div class="results scroll-pane"><p>Click the search icon and your results will show here…</p></div>
						    <select id="locationSelect" style="width:100%;visibility:hidden"></select>
						 </div>
						 <div id="map"></div>
						 <div class="instructions">
						 	<h4>HOW TO NAVIGATE THE MAP</h4>
						 	<ol>
							 	<li><strong>CLICK</strong> and <strong>DRAG</strong> to <strong>MOVE</strong> around the area of your map.</li>
							 	<li>To <strong>ZOOM IN</strong> or <strong>ZOOM OUT</strong> use the plus and minus signs: <span class="zoom-icon"></span></br>located in the botton-right corner of the map.</li>
							 	<li>Your search results will show up highlighted in the map with this icon: <span class="pin-icon"></span></li>
							 	<li>Click on this icon to get an address <span class="address-icon"></span></li>
							 	<li>You can toggle the view options of the map in the button located in the top left corner of the map: <span class="toggle-icon"></span></li>
							</ol>
							<div class="current-location">You are in : <span></span></div>
						</div>
					 </div>

					</div>
				</div>
			</div>
		</div>

			      	
	<?php include 'includes/footer.php';?>
    	 </div><!-- End Wrapper -->
    	<!-- Bootstrap core JavaScript
    	================================================= -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <!-- Custom Script -->
        <script src="js/geo-location.js" type="text/javascript"></script>
        <script src="js/core.js" type="text/javascript"></script>
        <!-- the mousewheel plugin - optional to provide mousewheel support -->
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
    </body>
</html>
