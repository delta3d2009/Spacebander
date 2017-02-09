<?php
	session_unset();
	session_start();
	require_once "database_connection.php";
	$_SESSION["ERROR"] = null;
	if(isset($_POST["user"]) && isset($_POST["pass"])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		if($user && $pass){
			$result = mysqli_query($con, "CALL GetUserAccount('$user','$pass')");
			$row = mysqli_fetch_array($result);
			//while ($row = mysqli_fetch_array($result)){//echo $row[0]; //}
			if($row[0] >= 1){
				$_SESSION["username"] = $user;
				session_name($user);
				echo "Starting Session... ";
				echo "<script type='text/javascript'>window.location.href='dashboard.php'</script>";
				//header("Location: ../dashboard.php");
   				exit;
			}else{
				$_SESSION["ERROR"] = "User Not Found:";
				echo "Credentals were not found, please try again later. " . $row[0];
			}
		}else{
			$_SESSION['ERROR'] = "Username or password are missing";
		}
	}else{
		$_SESSION['ERROR'] = "No username or password were provided";
	}
?>
