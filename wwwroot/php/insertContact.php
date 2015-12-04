<?php
	require_once "database_connection.php";
	//echo "<script type='text/javascript'>alert('" . $_POST["address"] . "'); </script>";
	if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["message"]) ){
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$message = $_POST["message"];
		
		$result = mysqli_query($con, "CALL insertContact('$firstname', '$lastname', '$phone', '$email','$message')");
		$row = mysqli_fetch_array($result);
		//printf("Error: %s\n", mysqli_error($con));
		if($row[0] >= 1){
			echo "Impossible to send message. Please try again later.. ";
			exit;
		}else{
			echo "Message sucessfully sent. ";
			$name = $firstname . " " . $lastname;
			sendEmail($name, $phone, $email, $message);
			//echo "<script type='text/javascript'>alert('Contact sucessfully registered.'); </script>";
		}
	}else{
		$_SESSION['ERROR'] = "No data message provided";
	}
	
	function sendEmail($name, $phone, $email, $message)
	{
		try{
			$from_email = $email;
			$replay_email = "support@spacebander.com";
			$message = "Dear user, \n\nYour have a new message from: '". $name . "'\n Phone: '". $room . "'\n Email: '". $email . "'\n Message: \n'" . $message . "' \n\n Regards";
			
			$headers = "From: " . $from_email . "\r\n";
			//$headers .= "CC: " . $replay_email . "\r\n";
			
			mail("support@spacebander.com", "Contact Form Message", $message, $headers );
		}catch( Exception $e){}
	}
?>