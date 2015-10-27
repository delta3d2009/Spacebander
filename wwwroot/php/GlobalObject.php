<?php
	class GlobalObject{
		
		private $con = null;
		
		public function __construct(){
			$con = mysqli_connect("localhost", "root", "123queso", "Spacebander");
			$con->set_charset("utf8");
			$this->getCountClients($con);
		}
	
		public function getCountClients($con)
		{
			$result = mysqli_query($con, "CALL getCountPhysicians()");
			$count = mysqli_fetch_array($result);
			$_SESSION["countClients"] = $count[0];
			mysqli_close($con);
		}
		
	}//End of the Class
?> 