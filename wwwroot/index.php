<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en-US"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome to SpaceBander</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- jQuery for Mobile CSS -->
        <link href="css/jquery.mobile-1.4.5.min.css" rel="stylesheet">
        <!-- Video JS Styles -->
        <link rel='stylesheet prefetch' href='css/vendor/video-js.css'>
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/tablet.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
        <link rel="stylesheet" type="text/css" href="css/video-player.css">
        <!-- Google fonts -->
		    <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		    <!-- Viewport tags-->
		    <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'includes/favicons.php';?>
    </head>
    <body class="homepage-section">
    	<div id="header" class="purple">
		    <?php include 'includes/header.php';?>
		</div>

		<div id="slider">
    		<div class="container-fluid">

	         <!-- Carousel ================================================== -->
					<div id="myCarousel" class="carousel slide " data-ride="carousel">
					      <!-- Indicators -->
					    <ol class="carousel-indicators">
					        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					        <li data-target="#myCarousel" data-slide-to="1"></li>
					        <li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>

					     <div class="carousel-inner" role="listbox">
					        <div class="item active">
					            <img class="first-slide" src="img/desktop/brandbox-1.jpg" alt="Say goodbye to your hemorrhoids">
					            <div class="container">
						            <div class="carousel-caption">
						              <h1 class="slide1">Say goodbye to your hemorrhoids</h1>
						              <h2 class="slide1">Permanently eliminate your hemorrhoids with the non-surgical SpaceBander<sup>&reg;</sup></h2>
						              <a class="btn-green" href="about.php" role="button">LEARN MORE</a>
						            </div>
					            </div>
					        </div>

					        <div class="item">
					            <img class="second-slide" src="img/desktop/brandbox-2.jpg" alt="SpaceBander<sup>&reg;</sup> is quick, effective, and painless">
					            <div class="container">
						            <div class="carousel-caption">
						                <h1 class="slide2">SpaceBander<sup>&reg;</sup> is quick, effective, and painless</h1>
						                <h2 class="slide2">Eliminate your hemorrhoids in less than 2 minutes in the comfort of a doctor’s office</h2>
						                <a class="btn-green" href="about.php" role="button">LEARN MORE</a>
						            </div>
					       		 </div>
							</div>

					        <div class="item">
					            <img class="third-slide" src="img/desktop/brandbox-3.jpg" alt="No more ineffective creams or painful surgery">
					            <div class="container">
						            <div class="carousel-caption">
						                <h1 class="slide3">No more ineffective creams or painful surgery</h1>
						                <h2 class="slide3">SpaceBander<sup>&reg;</sup> is an effective and painless procedure with no need for recovery time</h2>
						                <a class="btn-green" href="about.php" role="button">LEARN MORE</a>
						            </div>
					            </div>
					        </div>
					    </div>

					    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					        <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					        <span class="sr-only">Next</span>
					    </a>
					</div>
	         <!-- Carousel ================================================== -->


			</div>
		</div><!--  slider================================================== -->

    <!--  Video Player ================================================== -->
    <div class="see-how container-fluid">
      <div class="copy-container">
        <div class="headline">Why is it hard to talk about hemorroids?</div>
        <div class="info">It should be very simple.</div>
        <p>Solve the root of the problem, with a quick,<br class="show-in-tablet"/> easy, painless and inexpensive solution.</p>
        <a href="#" onclick="return false;" class="play-video">Watch this video and see how! <span>></span></a>
      </div>
      <div id="video-player-container">
      <!--<script src="https://player.vimeo.com/api/player.js"></script>
      <script>
          var options = {
              id: "https://player.vimeo.com/video/201723679",
              width: 1024,
              height: 576,
              color: "61d7d5"
          };
          var player = new Vimeo.Player('video-player-container', options);
          player.setVolume(0);
          player.on('play', function() {
              console.log('played the video!');
          });
      </script>-->
        <video id="video-homepage" class="video-js small-player" controls preload="none" width="184px" height="160px"
         poster="img/desktop/video-homepage-poster.jpg" data-setup='{ "aspectRatio":"640:360", "playbackRates": [1, 1.5, 2] }'>
           <source src="videos/Spacebander_60secPatient_08_HD.mp4" type='video/mp4'>
           <source src="videos/Spacebander_60secPatient_08_Web.webm" type='video/webm'>
         </video>
       </div>
   </div>
    <!--  Video Player ================================================== -->
		<div id="callouts" class="container-fluid">
    		<div class="callouts row">

	        	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	        		<a href="about.php" class="callout thumbnail ">
	        			<div>
	        				<h3>About Hemorrhoids</h3>
	        				<p>If you have symptoms of rectal bleeding, itching, discomfort, or anal pain, you may be one of the millions of people experiencing symptoms of hemorrhoids. Hemorrhoids are swollen veins in the lower rectum and are very common.</p>
	        				<div class="btn-green" role="button">MORE</div>
	        			</div>
	    			</a>
	    		</div>
	    		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	        		<a href="about.php" class="callout thumbnail">
	        			<div>
	        				<h3>What is SpaceBander<sup>&reg;</sup>?</h3>
	        				<p>SpaceBander<sup>&reg;</sup> is a small plastic device that deploys a tiny rubber band around the base of your hemorrhoid.  The procedure is painless, non-surgical, takes less than 2 minutes in a doctor’s office, and will permanently eliminate your hemorrhoids.</p>
	        				<div class="btn-green" role="button">ABOUT</div>
	        			</div>
	        		</a>
	    		</div>
	    		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	        		<a href="find-physicians.php" class="callout thumbnail">
	        			<div>
	        				<h3>Find a Physician</h3>
	        				<p>Are you ready to take the next step?  Find a physician in your area that is knowledgeable about hemorrhoids and certified to conduct the non-surgical SpaceBander<sup>&reg;</sup> procedure in the comfort of your doctor’s office.</p>
	        				<div class="btn-green" role="button">SEARCH</div>
	        			</div>
	        		</a>
				</div>

			</div>
		</div><!-- End Row Callouts-->


		<div id="cta_area" class="purple">
    		<div class="container-fluid">
	    		<div class="cta">
					<div class="doctor-picture">
						<img class="center-block physician" src="img/desktop/spacebander_certified_physician.png">
					</div>
					<div class="description">
			  				<h4>I’D LIKE TO PERMANENTLY</br>ELIMINATE MY HEMORRHOIDS</h4>
			  				<h5>Please help me find a</br>SpaceBander<sup>&reg;</sup> Certified Physician</h5>
			  		</div>
			  		<div class="dark-purple curtain">
			  			<a href="find-physicians.php"><img class="center-block go_find_btn" src="img/desktop/btn_go_to_find.png"></a>
			  		</div>
			  	</div>
			</div>
		</div><!-- End Row-->

		<?php include 'includes/footer.php';?>
	<!--
		<div id="footer" class="dark-gray">
			<div class="container">
				<div class="row bottom_links">
					<div class="col-lg-10 col-lg-offset-1">
						<ul>
							<li><a class="btn_footer" href="portal.php">Physician Portal</a></li>
							<li><a class="btn_footer" href="privacy.php">Privacy Policy</a></li>
							<li><a class="btn_footer" href="terms.php">Terms of Use</a></li>
						</ul>
					</div>
				</div>
				<div class="row bottom_links">
					<div class="col-lg-8 col-lg-offset-2">
						<ul>
							<li><a class="social-facebook" href="www.facebook.com/spacebander"><img src="img/desktop/icon_facebook.jpg"></a></li>
							<li><a class="social-twitter" href="www.twitter.com/spacebander"><img src="img/desktop/icon_twitter.jpg"></a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>USE OF THIS SITE SIGNIFIES YOUR AGREEMENT TO THE <a href="terms.php">TERMS OF USE</a> AND TO OUR <a href="privacy.php">PRIVACY POLICY.</a></p>
						<p> &copy; SPACEBANDER CORPORATION 2015  •  ALL RIGHTS RESERVED </p>
				    </div>
			    </div>
			</div>
		</div>   footer===================== -->

	</div>	<!-- END Body===================== -->

    	<!-- Bootstrap core JavaScript
    	================================================= -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <!--<script src="js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>-->
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <!-- Video JS -->
        <script src="js/vendor/video.js" type="text/javascript"></script>
        <!-- Custom Script -->
        <script src="js/core.js" type="text/javascript"></script>
    </body>
</html>
