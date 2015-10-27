<?php
	require_once "database_connection.php";
	if(isset($_POST["id"]) && isset($_POST["company"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["address"]) && isset($_POST["suite"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zip"]) && isset($_POST["country"]) && isset($_POST["phone"]) && isset($_POST["cell"]) && isset($_POST["fax"]) && isset($_POST["email"]) && isset($_POST["office"]) ){
		$id = $_POST["id"];	
		$company = $_POST["company"];	
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$address = $_POST["address"];
		$suite = $_POST["suite"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zip = $_POST["zip"];
		$country = $_POST["country"];
		$phone = $_POST["phone"];
		$cell = $_POST["cell"];
		$fax = $_POST["fax"];
		$email = $_POST["email"];
		$office = $_POST["office"];
		$web = $_POST["web"];
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