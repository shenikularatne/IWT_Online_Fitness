<?php
// Enable error reporting to see if any issues occur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the config file for the database connection
require 'clientConfig.php';

// Check if a profile ID is provided in the URL (e.g., delete.php?id=5)
if (isset($_GET['id'])) {
    $clientID = $_GET['id'];

    // Prepare the SQL query to delete the record
    $sql = "DELETE FROM client WHERE clientID = ?";

    // Prepare and bind the statement
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("i", $clientID);

        // Execute the query and check if the deletion was successful
        if ($stmt->execute()) {
            echo "Profile deleted successfully.";
        } else {
            echo "Error deleting profile: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }
} else {
    // If no ID is provided in the URL
    echo "No profile ID specified for deletion.";
}

// Close the database connection
$con->close();
?>
