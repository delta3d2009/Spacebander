<?php
	require_once "database_connection.php";
	if(isset($_POST["parameter"]))
	{
		$parameter = $_POST["parameter"];	
		echo "-------------------------------- " . $parameter;
	}else
	{
		
	}

?>