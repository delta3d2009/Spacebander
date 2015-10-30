<?php
	session_start();  
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
        <title>Search Results</title>
        <meta name="description" content="">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
    </head>
    <body class="body-results">
    	 <div id="wrapper" >
    	 	<div class="container container-admin">
	    	  	<!-- Main component for a primary marketing message or call to action -->
			      <div class="jumbotron">
			      	<div class="results">
			      		<?php
			      			if(isset($_GET['parameter']))
							{
								require_once "php/database_connection.php";
								
								$parameter = $_GET["parameter"];
								
								if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) 
								{
									//we give the value of the starting row to 0 because nothing was found in URL
									$startrow = 0;
									//otherwise we take the value from the URL
								} else 
								{
									$startrow = (int)$_GET['startrow'];
								}
								
								global $con;
								$result = mysqli_query($con, "CALL filterPhysicians('$parameter','$startrow')");
								
								$rowCount = mysqli_num_rows($result);
	
								if($rowCount) {
									echo "<div><table class='table table-bordered table-striped'><thead><tr>
									<th class='tiny-row hide-for-tablet'>ID</th>
									<th class='big-row'>Company</th>
									<th class='big-row'>First Name</th>
									<th class='big-row'>Second Name</th>
									<th class='huge-row'>Address</th>
									<th class='huge-row'>Suite</th>
									<th>City</th>
									<th>State</th>
									<th class='med-row'>Zip</th>
									<th class='hide-for-mobile hide-for-tablet'>Country</th>
									<th>Office Phone</th>
									<th>Physician's Cell</th>
									<th>Office Fax</th>
									<th class='hide-for-mobile'>Physician\'sEmail</th>
									<th class='hide-for-mobile'>Office Contact Name</th>
									<th class='med-row'></th>
									<th class='med-row'></th>
									</tr></thead>";
									while($rows = mysqli_fetch_array($result))
									{
										echo "<tr>";
										echo "<td class='tiny-row hide-for-tablet'>". $rows['ID']."</td>";
										echo "<td class='big-row'>". $rows['Company']. "</td>";
									    echo "<td class='big-row'>". $rows['FirstName']. "</td>";
									    echo "<td class='big-row'>". $rows['LastName']. "</td>";
									    echo "<td class='huge-row'>". $rows['Address']. "</td>";
									    echo "<td class='huge-row'>". $rows['Suite']. "</td>";
									    echo "<td>". $rows['City']. "</td>";
									    echo "<td>". $rows['State']. "</td>";
										echo "<td class='med-row'>". $rows['Zip']. "</td>";
										echo "<td class='hide-for-mobile hide-for-tablet'>". $rows['Country']. "</td>";
										echo "<td>". $rows['Phone']. "</td>";
										echo "<td>". $rows['Cell']. "</td>";
										echo "<td>". $rows['Fax']. "</td>";
										echo "<td class='hide-for-mobile'>". $rows['Email']. "</td>";
										echo "<td class='hide-for-mobile'>". $rows['Office']. "</td>";
										echo "<td class='med-row'><a class='edit' href='#' onClick='configModalForm(this.id); return false;' id=". $rows['ID']. ">Edit</a></td>";
										echo "<td class='med-row'><a class='remove' href='#' onClick='configModalRemove(this.id); return false;' id=". $rows['ID']. ">Remove</a></td>";
										//echo "<td>". $rows['Lat']. "</td>";
										//echo "<td>". $rows['Lng']. "</td>";
										echo "</tr>";
										}
										echo "</table></div>";
										//addPagination($orderby, $startrow, $rowCount);
									}
						
							}else
							{
								echo "No matching results.";
							}
							
							function addPagination($orderby, $startrow, $rowCount)
							{
								$numPages = $_SESSION["countPhysicians"];
								if($numPages >= 10)
								{
									echo "<div class='pagination'><ul>";
									$prev = $startrow - 10;
									$next = $startrow + 10;
									$globalObject = new GlobalObject();
									//echo "<script>console.log('numPages: ' + ".$numPages.")</script>";
									//only print a "Previous" link if a "Next" was clicked
									if ($prev >= 0)
									{
									    echo "<li class='prev'><a href='".$_POST['PHP_SELF']."?startrow=".$prev."&orderby=".$orderby."#edit'><< Previous</a></li></ul></div>";
									}
									if ($next <= $rowCount)
									{
										echo "<li class='next'><a href='".$_POST['PHP_SELF']."?startrow=".$next."&orderby=".$orderby."#edit'>Next >></a></li></ul></div>";
									}
								}
							}
							
			      		?>
					</div>			
			      </div><!-- End Main component for a primary marketing message or call to action -->
			      <?php include 'includes/footer.php';?>
			 </div><!-- End Container -->
    	 </div><!-- End Wrapper -->
	<?php include 'includes/interstitial.php';?>
    	<!-- Bootstrap core JavaScript
    	================================================= -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.validate.js"></script>
        <!-- Custom Script -->
        <<script src="js/admin.js"></script>
    </body>
</html>