<?php
	require_once "database_connection.php";
	if(isset($_POST["id"]) && isset($_POST["company"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["address"]) && isset($_POST["suite"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zip"]) && isset($_POST["country"]) && isset($_POST["phone"]) && isset($_POST["cell"]) && isset($_POST["fax"]) && isset($_POST["email"]) && isset($_POST["office"]) ){
		$id = $_POST["id"];	
		$company = addslashes($_POST["company"]);	
		$firstname = addslashes($_POST["firstname"]);
		$lastname = addslashes($_POST["lastname"]);
		$address = addslashes($_POST["address"]);
		$suite = addslashes($_POST["suite"]);
		$city = addslashes($_POST["city"]);
		$state = addslashes($_POST["state"]);
		$zip = $_POST["zip"];
		$country = addslashes($_POST["country"]);
		$phone = addslashes($_POST["phone"]);
		$cell = addslashes($_POST["cell"]);
		$fax = addslashes($_POST["fax"]);
		$email =addslashes( $_POST["email"]);
		$office = addslashes($_POST["office"]);
		//echo $id . $company.$firstname.$lastname.$address.$city.$state.$zip.$country.$phone.$email.$office.$web;
		$result = mysqli_query($con, "CALL updatePhysician('$id','$company','$firstname','$lastname','$address','$suite','$city','$state','$zip','$country','$phone','$cell','$fax','$email','$office')");
		$row = mysqli_fetch_array($result);
		if($row[0] >= 1){
			echo "Physician sucessfully updated. ";
			exit;
		}else{
			echo "Physician was not updated, please try again later.";
			//echo "<script type='text/javascript'>alert('Physician sucessfully updated.'); </script>";
		}
	}else{
		$_SESSION['ERROR'] = "No data physician provided";
	}
?>