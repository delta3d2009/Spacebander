<?php

require_once "php/database_connection.php";
require_once "php/GlobalObject.php";

if(isset($_GET['type']))
{
	$type = $_GET["type"];
}else
{
	$type = "asc";
}

if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) 
{
	//we give the value of the starting row to 0 because nothing was found in URL
	$startrow = 0;
	//otherwise we take the value from the URL
} else 
{
	$startrow = (int)$_GET['startrow'];
}

if(isset($_GET['orderby']))
{
	$orderby = $_GET["orderby"];
	
	searchPhysicians($orderby, $startrow, $type);
}else
{
	$orderby = $_GET["Id"];

	searchPhysicians($orderby, $startrow, $type);
	//echo "No hay parametros de búsqueda";
}


	
function searchPhysicians($orderby, $startrow, $type)
{
	global $con;

	if($type == "asc")
	{
		$result = mysqli_query($con, "CALL searchPhysiciansASC('$orderby','$startrow')");
	}else{
		$result = mysqli_query($con, "CALL searchPhysiciansDESC('$orderby','$startrow')");
	}
	
	$rowCount = mysqli_num_rows($result);
	
	if($rowCount) {
		echo "<div class='table-container'><table class='table table-bordered table-striped'><thead><tr>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Id&type=asc#edit'>&uarr;</a>ID<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Id&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Company&type=asc#edit'>&uarr;</a>Company<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Company&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=FirstName&type=asc#edit'>&uarr;</a>First Name<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=FirstName&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=LastName&type=asc#edit'>&uarr;</a>Second Name<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=LastName&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Address&type=asc#edit'>&uarr;</a>Address<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Address&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Suite&type=asc#edit'>&uarr;</a>Suite<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Suite&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=City&type=asc#edit'>&uarr;</a>City<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=City&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=State&type=asc#edit'>&uarr;</a>State<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=State&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Zip&type=asc#edit'>&uarr;</a>Zip<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Zip&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Country&type=asc#edit'>&uarr;</a>Country<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Country&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Office&type=asc#edit'>&uarr;</a>Office Phone<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Office&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Cel&type=asc#edit'>&uarr;</a>Physician's Cell<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Cel&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Fax&type=asc#edit'>&uarr;</a>Office Fax<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Fax&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Email&type=asc#edit'>&uarr;</a>Physician'sEmail<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Email&type=desc#edit'>&darr;</a></th>
		<th><a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Office&type=asc#edit'>&uarr;</a>Office Contact Name<a href='".$_POST['PHP_SELF']."?startrow=0&orderby=Office&type=desc#edit'>&darr;</a></th>
		<th></th>
		<th></th>
		</tr></thead>";
		while($rows = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>". $rows['ID']."</td>";
			echo "<td>". $rows['Company']. "</td>";
		    echo "<td>". $rows['FirstName']. "</td>";
		    echo "<td>". $rows['LastName']. "</td>";
		    echo "<td>". $rows['Address']. "</td>";
		    echo "<td>". $rows['Suite']. "</td>";
		    echo "<td>". $rows['City']. "</td>";
		    echo "<td>". $rows['State']. "</td>";
			echo "<td>". $rows['Zip']. "</td>";
			echo "<td>". $rows['Country']. "</td>";
			echo "<td>". $rows['Phone']. "</td>";
			echo "<td>". $rows['Cell']. "</td>";
			echo "<td>". $rows['Fax']. "</td>";
			echo "<td>". $rows['Email']. "</td>";
			echo "<td>". $rows['Office']. "</td>";
			echo "<td><a class='edit' href='#' onClick='configModalForm(this.id); return false;' id=". $rows['ID']. ">Edit</a></td>";
			echo "<td><a class='remove' href='#' onClick='configModalRemove(this.id); return false;' id=". $rows['ID']. ">Remove</a></td>";
			//echo "<td>". $rows['Lat']. "</td>";
			//echo "<td>". $rows['Lng']. "</td>";
			echo "</tr>";
		}
			echo "</table></div>";
			addPagination($orderby, $startrow, $rowCount, $type);
		}
}	



function addPagination($orderby, $startrow, $rowCount, $type)
{
	$numPages = $_SESSION["countPhysicians"];
	if($numPages >= 10)
	{
		echo "<div class='pagination'><ul>";
		$prev = $startrow - 10;
		$next = $startrow + 10;
		$globalObject = new GlobalObject();
		//echo "<script>console.log('numPages: ' + ".$numPages.")</script>";
		//only print a "Previous" link if a "Next" was clicked
		if ($prev >= 0)
		{
		    echo "<li class='prev'><a class='btn-green'  href='".$_POST['PHP_SELF']."?startrow=".$prev."&orderby=".$orderby."&type=".$type."#edit'><< Previous</a></li></ul></div>";
		}
		if ($next <= $rowCount)
		{
			echo "<li class='next'><a class='btn-green'  href='".$_POST['PHP_SELF']."?startrow=".$next."&orderby=".$orderby."&type=".$type."#edit'>Next >></a></li></ul></div>";
		}
	}
}


?>

