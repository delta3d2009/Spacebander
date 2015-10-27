<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Find </title>
        <meta name="description" content="">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
        <!-- styles needed by jScrollPane -->
		<link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
        <!-- Google Maps API -->
        <script src="https://maps.googleapis.com/maps/api/js" type="text/javascript"></script>
        <!-- Viewport tags-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Google Fonts -->
       <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,300,500,600,700,800,900,200' rel='stylesheet' type='text/css'>
    </head>
 	<body>
    	 <div id="wrapper" >
    	 	<div class="container">
	    	  	<?php include 'includes/header.php';?>
	    	  	<!-- Main component for a primary marketing message or call to action -->
			      <div class="jumbotron">
			      	<div class='banner'>
			      		<div class="content-banner">
			      			<h1>This is how your patients will benefit from this treatment.</h1>
					         <h2>Curabitur sed nulla eu diam dictum accumsan Aliquam accumsan tincidunt mollised quis.</h2>
					    </div>
			      	</div>
			      	<div class="find">
				      	<div class="controls">
				      		<h3>How this tool works.</h3>
				      		<p>Brief explanation how this tool should works and instructions lorem ipsum.</p>
				        <form>
				        		<label>SEARCH BY ZIP CODE</label>
						        <input type="text" id="addressInput" size="10" class="form-control"/>
						        <a class="activate-mobile-location" href="#" onclick="searchLocations()">SEARCH BY LOCATION</a>
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
						    <button type="button" onclick="searchLocations()" class="btn btn-default"><span class="search-icon"></span></button>
						 </form>
						 	<label>PHYSICIANS CLOSEST TO YOUR ZIP CODE</label>
						 	<div class="results scroll-pane"></div>
						    <select id="locationSelect" style="width:100%;visibility:hidden"></select>
						 </div>
						 <div id="map"></div>
						 <div class="instructions">
						 	<h4>HOW TO NAVIGATE THE MAP</h4>
						 	<p>1. <strong>CLICK</strong> and <strong>DRAG</strong> to <strong>MOVE</strong> around the area of your map.</p>
						 	<p>2. To <strong>ZOOM IN</strong> or <strong>ZOOM OUT</strong> use the plus and minus signs: <span class="zoom-icon"></span></br>located in the botton-right corner of the map.</p>
						 	<p>3. You search results will show up highlighted with this icon: <span class="pin-icon"></span></p>
						 	<p>4. Click on the icon to get an Address<span class="address-icon"></span></p>
						 	<p>5. You can toggle the view options of the map in the button located in the top left corner of the map:<span class="toggle-icon"></span></p>
						 </div>
					 </div>
			      </div><!-- End Main component for a primary marketing message or call to action -->
			 </div><!-- End Container -->
			 <?php include 'includes/footer.php';?>
    	 </div><!-- End Wrapper -->
    	<!-- Bootstrap core JavaScript
    	================================================= -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <!-- Custom Script -->
        <script src="js/geo-location.js" type="text/javascript"></script>
        <!-- the mousewheel plugin - optional to provide mousewheel support -->
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
    </body>
</html>
