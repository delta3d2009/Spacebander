<?php
	require_once "database_connection.php";
	//echo "<script type='text/javascript'>alert('" . $_POST["address"] . "'); </script>";
	if(isset($_POST["company"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["address"]) && isset($_POST["suite"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zip"]) && isset($_POST["country"]) && isset($_POST["phone"]) && isset($_POST["cell"])  && isset($_POST["fax"]) && isset($_POST["email"]) && isset($_POST["office"]) && isset($_POST["lat"]) && isset($_POST["lng"]) ){
		$company = $_POST["company"];	
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zip = $_POST["zip"];
		$country = $_POST["country"];
		$phone = $_POST["phone"];
		$cell = $_POST["cell"];
		$email = $_POST["email"];
		$fax = $_POST["fax"];
		$office = $_POST["office"];
		$lat = $_POST["lat"];
		$lng = $_POST["lng"];
		
		$result = mysqli_query($con, "CALL insertPhysician('$company','$firstname','$lastname','$address','$suite','$city','$state','$zip','$country','$phone','$cell','$fax','$email','$office','$lat','$lng')");
		$row = mysqli_fetch_array($result);
		//printf("Error: %s\n", mysqli_error($con));
		if($row[0] >= 1){
			echo "Physician on the same Address already exists. ";
			exit;
		}else{
			echo "Physician sucessfully registered. ";
			//echo "<script type='text/javascript'>alert('Physician sucessfully registered.'); </script>";
		}
	}else{
		$_SESSION['ERROR'] = "No data physician provided";
	}
?>