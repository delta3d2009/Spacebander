<?php
	require_once "database_connection.php";

/*
* Export Mysql Data in excel or CSV format using PHP
* 
*/
 
$header = '';
$data ='';

if(isset($_GET['table']))
{
	$tableName = $_GET["table"];
}else
{
	$tableName = "Physician";
}
 
$result = mysqli_query($con, "CALL getTableInfo('$tableName')");
 
// extract the field names for header
 
while ($fieldinfo = mysqli_fetch_field($result))
{
	$header .= $fieldinfo->name."\t";
}
 
// export data
while( $row = mysqli_fetch_row( $result ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );
 
if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}
 
// allow exported file to download forcefully
$xls_filename = 'Report_'.$tableName.'s_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
header("Content-type: application/octet-stream");
//header("Content-Type: application/xls");
//header("Content-Disposition: attachment; filename=devzone_co_in_export.xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";

 
?>