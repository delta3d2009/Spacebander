<?php
	//session_unset();
	//session_start();
	require_once "database_connection.php";
	$_SESSION["ERROR"] = null;
	if(isset($_POST["user"]) && isset($_POST["pass"])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		if($user && $pass){
			$_SESSION["username"] = $user;
			$_SESSION["password"] = $pass;
			$result = mysqli_query($con, "CALL GetUserAccount('$user','$pass')");
			$row = mysqli_fetch_array($result);
			//while ($row = mysqli_fetch_array($result)){//echo $row[0]; //}
			if($row[0] >= 1){
				echo "Iniciando sesión: " . $row[0];
				echo "<script type='text/javascript'>window.location.href='dashboard.php'</script>";
   				exit;
				
			}else{
				$_SESSION["ERROR"] = "User Not Found:";
				echo "Credenciales de acceso no encontradas. " . $row[0];
			}
		}else{
			$_SESSION['ERROR'] = "Username or password are missing";
		}
	}else{
		$_SESSION['ERROR'] = "No username or password were provided";
	}
?>


