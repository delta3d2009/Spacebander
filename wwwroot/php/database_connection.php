<?php
	// Create connection
	//Test locally connect internal DataBase
	$con = mysqli_connect("localhost", "root", "123queso", "Spacebander");
	//Luisslascr staging
	//$con = mysqli_connect("localhost", "luissala_root", "123Queso-", "luissala_DB");
	$con->set_charset("utf8");
	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  mysqli_close($con);
	}else
	{
		//echo "Shinning Like a New Penny: ";
	}
	
	function closeConnection()
	{
		mysqli_close($con);
		echo "<script>console.log('Call Close SQL');</script>";
	}
?> 