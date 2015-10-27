<?php
	require_once "database_connection.php";
	if(isset($_POST["email"]) ){
		$email = $_POST["email"];
		
		$result = mysqli_query($con, "CALL getToken('$email')");
		$rowCount = mysqli_num_rows($result);		
		if($rowCount) {
			$rows = mysqli_fetch_array($result);
				if((int) $rows["Token"] > 0){
					//echo "We have sent you an email. Please follow the link in order to reset your password. ";
					echo "http://www.spacebander.com/reset.php?email=" .$email. "&token=" .$rows["Token"].  "&user=" .$rows["UserName"]. "&span=1928374650qazxplmn";
					//Send email 
					sendEmail($rows["Token"], $rows["UserName"], $email);
					exit;
				}else{
					echo "The specified email address doesn't belong to any assoiciated account. Please verify. ";
				}
		}
	}else{
		$_SESSION['ERROR'] = "No email provided";
	}
	
	function sendEmail($token, $user, $email)
	{
		try{
			$url = "http://www.spacebander.com/reset.php?email=" .$email. "&token=" .$token.  "&user=" .$user. "&span=1928374650qazxplmn";
			echo $url;
			$from_email = "info@spacebander.com";
			$replay_email = "info@spacebander.com";
			$message = "Dear user, \n\nPlease follow this link in order to reset your password: \n'". $url . "'\n'\n Regards.";

			$headers = "From: " . $from_email . "\r\n";
			$headers .= "CC: " . $replay_email . "\r\n";
			
			mail($email, "Change Password - Spacebander Administrador", $message, $headers );
		}catch( Exception $e){}
	}
?>