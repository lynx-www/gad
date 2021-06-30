<?php

$server='PARSEC-SRV'; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"Parsec3", "UID"=>"apache", "PWD"=>'340$Uuxwp7Mcxo7Khy');
//$connectionInfo = array( "Database"=>"Parsec3", "UID"=>"sa", "PWD"=>"Taschuninoleg1");
$conn = sqlsrv_connect( $server, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
