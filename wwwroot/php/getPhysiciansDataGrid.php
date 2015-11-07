<?php
	require_once "database_connection.php";

	$result = mysqli_query($con, "CALL getPhysiciansDataGrid()");
	
	$arr = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$arr[] = $row;	
		}
	}
	# JSON-encode the response
	$json_response = json_encode($arr);
	
	// # Return the response
	echo $json_response;
?>