<?php
require 'dbconfig.php';

$sql = "SELECT S_ID, C_ID, C_Name, S_Date, S_Time FROM trainer_schedule";
$result = $con->query($sql);



if ($result->num_rows > 0) //table to read current schedules
{
    echo "<table border='1'>
          <tr>
            <th>Session ID</th>
            <th>Client ID</th>
            <th>Client Name</th>
            <th>Session Date</th>
            <th>Session Time</th>
            <th>Actions</th>
          </tr>";
    
    while ($row = $result->fetch_assoc()) 
    {
        echo "<tr>
                <td>" . $row["S_ID"] . "</td>
                <td>" . $row["C_ID"] . "</td>
                <td>" . $row["C_Name"] . "</td>
                <td>" . $row["S_Date"] . "</td>
                <td>" . $row["S_Time"] . "</td>
                <td>
                    <a href='T_update_schedule.php?S_ID=" . $row["S_ID"] . "'>Edit</a> |
                    <a href='T_delete_schedule.php?S_ID=" . $row["S_ID"] . "'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
</head>
<body>
   
    <center>
        <br>
        <br>

        <a href="T_create_schedule.php">Add a New Schedule</a>
        <br>
        <a href="Trainer_dashboard.php">Go Back to Dashboard</a>

    </center>
</body>
</html>

