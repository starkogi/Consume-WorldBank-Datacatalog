<?php
/* Set Connection Credentials */
$serverName=".\SQL";
$uid = "sa";
$pwd = "SQLServer2017";
$connectionInfo = array( "UID"=>$uid,
                         "PWD"=>$pwd,
                         "Database"=>"PowerGen",
                         "CharacterSet"=>"UTF-8");

 /* Connect using SQL Server Authentication. */
$conn = sqlsrv_connect( $serverName, $connectionInfo);
 
if( $conn === false ) {
     echo "Unable to connect.</br>";
     die( print_r( sqlsrv_errors(), true));
}else{
}
/*Override Maximum execution time*/
ini_set('max_execution_time', 3000);