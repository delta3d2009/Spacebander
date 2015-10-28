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
    <?php

		require_once "php/database_connection.php";
		
		if (isset($_GET['id']) or is_numeric($_GET['id'])) 
		{
			$id = $_GET['id'];
			//echo "<script>alert(".$_GET['id'].")</script>";
			$result = mysqli_query($con, "CALL SearchPhysicianByID('$id')");
			$row = mysqli_fetch_array($result);
			loadPhysicianData($row);
		}
		
		function loadPhysicianData($row)
		{
		 echo"<script src='js/jquery-1.11.0.min.js'></script><script src='js/bootstrap.js'></script><script src='js/jquery.validate.js'></script><script src='js/admin.js'></script>";
    	 	echo"<div>
    	 	<div class='container'>
	    	  	<!-- Main component for a primary marketing message or call to action -->
			      <div class='jumbotron iframe-jumbotron'>
					<form id='updateForm' autocomplete='off'>
						<div>
							<label>Company</label>
							<input name='company' id='company' type='text' size='80' value='".$row[1]."' class='form-control' maxlength='80' required/>
						</div>
						<div>
							<label>First Name</label>
							<input name='medicfirstname' id='medicfirstname' type='text' size='80' value='".$row[2]."' class='form-control' maxlength='80' required/>
						</div>
						<div>
							<label>Last Name</label>
							<input name='mediclastname' id='mediclastname' type='text' size='80' value='".$row[3]."' class='form-control' maxlength='80' required/>
						</div>
						<div>
							<label>Address</label>
							<input name='address' id='address' type='text' size='80' value='".$row[4]."' class='form-control' maxlength='80' required/>
						</div>
						<div>
							<label>Suite</label>
							<input name='suite' id='suite' type='text' size='80' value='".$row[5]."' class='form-control' maxlength='80' required/>
						</div>
						<div>
							<label>City</label>
							<input name='city' id='city' type='text' size='40' value='".$row[6]."' class='form-control' maxlength='40'/>
						</div>
						<div>
							<label>State</label>
							<input name='state' id='state' type='text' size='2' value='".$row[7]."' class='form-control' maxlength='40'/>";
							include 'includes/states.php';
						echo "</div>
						<div>
							<label>Zip</label>
							<input name='zip' id='zip' type='text' size='5' value='".$row[8]."' class='form-control' maxlength='5' onKeyPress='return numbersonly(this, event)'/>
						</div>
						<div>
							<label>Country</label>";
							include 'includes/countries.php';
						echo"</div>	
						<div>
							<label>Office Phone</label>
							<input name='phone' id='phone' type='text' size='20' value='".$row[10]."' class='form-control' maxlength='20'/>
						</div>
						<div>
							<label>Physician's Cell</label>
							<input name='cell' id='cell' type='text' size='20' value='".$row[11]."' class='form-control' maxlength='20'/>
						</div>
						<div>
							<label>Office Fax</label>
							<input name='fax' id='fax' type='text' size='20' value='".$row[12]."' class='form-control' maxlength='20'/>
						</div>
						<div>
							<label>Email</label>
							<input name='email' id='email' type='email' size='20' value='".$row[13]."' class='form-control' maxlength='30'/>
						</div>
						<div>
							<label>Office Contact</label>
							<input name='office' id='office' type='text' size='20' value='".$row[14]."' class='form-control' maxlength='50'/>
						</div>
						<button type='submit' class='btn btn-primary'>Save</button>
						<button type='reset' class='btn btn-default'>Reset</button>
						<div id='output'></div>
					</form>			
			      </div><!-- End Main component for a primary marketing message or call to action -->
			 </div><!-- End Container -->
    	 </div><!-- End Wrapper -->
    	 ";
    	 echo "<script>
    	 		adjustUpdateIframe('".$row[0]."', '".$row[9]."', '".$row[7]."');				
			</script>";
    	 }
    	 ?>
    	
    </body>
</html>