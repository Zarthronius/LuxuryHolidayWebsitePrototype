<?php
//connection parameters
$servername = "localhost";
$username = "unn_w20016567";
$password = "UcigE";
$dbname = "unn_w20016567";

//connect
$dbConn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($dbConn->connect_error){
    echo "<p>Sorry the connection failed</p>";
    echo "<p>The error was: ".$dbConn->connect_error."</p>\n";
    exit;
    }