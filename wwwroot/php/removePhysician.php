<?php

	require "database_connection.php";
	
	if(isset($_POST['id']) && is_numeric($_POST['id']))
	{
		$physicianID = $_POST['id'];
		
		$result = mysqli_query($con, "CALL RemovePhysicianByID('$physicianID')");	
		$row = mysqli_fetch_array($result);
		
		if(intval($row[0]) === 0)
		{
			echo $row[0];
		}else
		{
			echo $row[0];
		}
	}			
	
?>
		