<?php
// to config Database 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwt_online_finess";

// to Create connection
$con = new mysqli($servername, $username, $password, $dbname);

//  to Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
