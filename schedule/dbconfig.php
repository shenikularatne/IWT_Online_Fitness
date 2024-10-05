<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "iwt_online_fitness";      

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
