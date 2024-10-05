<?php
$servername = "localhost";  // Replace with your server name if different
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "iwt_online_fitness";      // Replace with your database name

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

