<?php
require 'dbconfig.php';  // Include your database connection

// Check if S_ID is provided via GET request
if (isset($_GET['S_ID'])) {
    $S_ID = $_GET['S_ID'];

    // Fetch the record to confirm it's the correct one to delete
    $sql = "SELECT * FROM trainer_schedule WHERE S_ID='$S_ID'";
    $result = $con->query($sql);
    
    // Check if the record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Proceed to delete the record
        $deleteSql = "DELETE FROM trainer_schedule WHERE S_ID=?";
        $stmt = $con->prepare($deleteSql);
        $stmt->bind_param('i', $S_ID);  // Bind the Session ID as an integer
        
        // Execute the delete query
        if ($stmt->execute()) {
            echo "Schedule deleted successfully!";
           
        } else {
            echo "Error deleting schedule: " . $con->error;
        }

        $stmt->close();
    } else {
        echo "Record not found!";
    }
} else {
    echo "No schedule ID provided for deletion.";
}

$con->close();
?>
