<?php
//  database connection file
require 'clientConfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles - FitFusion</title>
    <link rel="stylesheet" href="clientReadStyle.css"> 
</head>
<body>

<header>
    <h1>User Profiles</h1>
</header>

<main>
    <!-- Fetching  client profiles from the database -->
    <?php
    $sql = "SELECT * FROM client";
    $result = $con->query($sql);

    // Checking if there are any profiles to display
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Location</th><th>Contact Number</th><th>Email</th><th>Fitness Goals</th></tr>";

        // Loop through each profile and display the details
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['clientName'] . "</td>";
            echo "<td>" . $row['clientLocation'] . "</td>";
            echo "<td>" . $row['clientContactNum'] . "</td>";
            echo "<td>" . $row['clientEmail'] . "</td>";
            echo "<td>" . $row['fitnessGoals'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No profiles found.";
    }

    // Closing the database connection
    $con->close();
    ?>
</main>

<footer>
    <p>&copy; 2024 FitFusion. All rights reserved.</p>
</footer>

</body>
</html>


