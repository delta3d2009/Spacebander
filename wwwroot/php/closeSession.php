<?php

	if(isset($_POST["close"]))
	{
		session_start();  
		session_unset($_SESSION["username"]);
		session_destroy();
	}
	
?>
