<<?php
session_start(); // Start the session to use session variables
require 'pconfig.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $sql = "DELETE FROM payment WHERE id='$id'";

    if ($con->query($sql) === TRUE) {
        // Set the success message in session
        $_SESSION['message'] = "Record deleted successfully";
        header("Location: pread.php"); // Redirect to the 'pread.php' page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
} else {
    // If no ID is provided, redirect to the read page
    header("Location: pread.php");
    exit();
}
?>
