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
    </head>
    <body class="body-iframe admin-section">
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
			<form id='updateForm' autocomplete='off'>
			<div class='left-side'>
				<div>
					<label>Company</label>
					<input name='company' id='company' type='text' size='80' value='".htmlspecialchars($row[1], ENT_QUOTES)."' class='form-control' maxlength='80' required/>
				</div>
				<div>
					<label>First Name</label>
					<input name='medicfirstname' id='medicfirstname' type='text' size='80' value='".htmlspecialchars($row[2], ENT_QUOTES)."' class='form-control' maxlength='80' required/>
				</div>
				<div>
					<label>Last Name</label>
					<input name='mediclastname' id='mediclastname' type='text' size='80' value='".htmlspecialchars($row[3], ENT_QUOTES)."' class='form-control' maxlength='80' required/>
				</div>
				<div>
					<label>Address</label>
					<input name='address' id='address' type='text' size='80' value='".htmlspecialchars($row[4], ENT_QUOTES)."' class='form-control' maxlength='80' required/>
				</div>
				<div>
					<label>Suite</label>
					<input name='suite' id='suite' type='text' size='80' value='".htmlspecialchars($row[5], ENT_QUOTES)."' class='form-control' maxlength='80' required/>
				</div>
				<div>
					<label>City</label>
					<input name='city' id='city' type='text' size='40' value='".htmlspecialchars($row[6], ENT_QUOTES)."' class='form-control' maxlength='40'/>
				</div>
				<div>
					<label>State</label>
					<input name='state' id='state' type='text' size='2' value='".htmlspecialchars($row[7], ENT_QUOTES)."' class='form-control' maxlength='40'/>";
					include 'includes/states.php';
				echo "</div></div>
				<div class='right-side'><div>
					<label>Zip</label>
					<input name='zip' id='zip' type='text' size='5' value='".$row[8]."' class='form-control' maxlength='5' onKeyPress='return numbersonly(this, event)'/>
				</div>
				<div>
					<label>Country</label>";
					include 'includes/countries.php';
				echo"</div>	
				<div>
					<label>Office Phone</label>
					<input name='phone' id='phone' type='text' size='20' value='".htmlspecialchars($row[10], ENT_QUOTES)."' class='form-control' maxlength='20'/>
				</div>
				<div>
					<label>Physician's Cell</label>
					<input name='cell' id='cell' type='text' size='20' value='".htmlspecialchars($row[11], ENT_QUOTES)."' class='form-control' maxlength='20'/>
				</div>
				<div>
					<label>Office Fax</label>
					<input name='fax' id='fax' type='text' size='20' value='".htmlspecialchars($row[12], ENT_QUOTES)."' class='form-control' maxlength='20'/>
				</div>
				<div>
					<label>Email</label>
					<input name='email' id='email' type='email' size='50' value='".$row[13]."' class='form-control' maxlength='50'/>
				</div>
				<div>
					<label>Office Contact</label>
					<input name='office' id='office' type='text' size='20' value='".htmlspecialchars($row[14], ENT_QUOTES)."' class='form-control' maxlength='50'/>
				</div></div>
				<button type='submit' class='btn-green'>Save</button>
				<button type='reset' class='btn-orange'>Reset</button>
			</form>			
    	 </div><!-- End Wrapper -->
    	 ";
    	 echo "<script>
    	 		adjustUpdateIframe('".$row[0]."', '".$row[9]."', '".$row[7]."');				
			</script>";
    	 }
    	 ?>
    	
    </body>
</html>