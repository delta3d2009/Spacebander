<?php
	require_once "database_connection.php";
	if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["token"]) ){
		$email = $_POST["email"];
		$password = $_POST["password"];
		$token = $_POST["token"];
		$result = mysqli_query($con, "CALL resetPassword('$email','$password','$token')");
		$row = mysqli_fetch_array($result);
		if($row[0] > 0){
			echo "Password sucessfully updated. ";
			exit;
		}else{
			echo "Password doesn't match with token, please contact System Administrador.";
		}
	}else{
		$_SESSION['ERROR'] = "No password provided";
	}
?>