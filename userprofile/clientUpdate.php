<?php
// Including the database connection file
require 'clientConfig.php';

if (isset($_GET['id'])) {
    $clientID = $_GET['id'];
    
    // Fetching the existing profile data
    $sql = "SELECT * FROM client WHERE clientID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $clientID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $profile = $result->fetch_assoc();
        $clientName = $profile['clientName'];
        $clientLocation = $profile['clientLocation'];
        $clientContactNum = $profile['clientContactNum'];
        $clientEmail = $profile['clientEmail'];
        $fitnessGoals = $profile['fitnessGoals'];
    } else {
       
        echo "No profile found.";
        exit; // Exit if no profile found
    }
} else {
    
    echo "No profile ID provided.";
    exit; // Exit if no ID provided
}

//  form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientName = $_POST['clientName'];
    $clientLocation = $_POST['clientLocation'];
    $clientContactNum = $_POST['clientContactNum'];
    $clientEmail = $_POST['clientEmail'];
    $fitnessGoals = $_POST['fitnessGoals'];

    // Update the profile in the database
    $sql = "UPDATE client SET clientName = ?, clientLocation = ?, clientContactNum = ?, clientEmail = ?, fitnessGoals = ? WHERE clientID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssi", $clientName, $clientLocation, $clientContactNum, $clientEmail, $fitnessGoals, $clientID);

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
        //  showing a success message
    } else {
        echo "Error updating profile: " . $con->error;
    }
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Client Profile</title>
    <link rel="stylesheet" href="clientUpdateStyle.css">
</head>
<body>
    <div class="container">
        <h1>Edit Client Profile</h1>
        <form action="clientUpdate.php?id=<?= $clientID ?>" method="POST">
            <label for="clientName">Name:</label>
            <input type="text" name="clientName" id="clientName" value="<?= htmlspecialchars($clientName) ?>" required>
            
            <label for="clientLocation">Location:</label>
            <input type="text" name="clientLocation" id="clientLocation" value="<?= htmlspecialchars($clientLocation) ?>" required>
            
            <label for="clientContactNum">Contact Number:</label>
            <input type="text" name="clientContactNum" id="clientContactNum" value="<?= htmlspecialchars($clientContactNum) ?>" required>
            
            <label for="clientEmail">Email:</label>
            <input type="email" name="clientEmail" id="clientEmail" value="<?= htmlspecialchars($clientEmail) ?>" required>
            
            <label for="fitnessGoals">Fitness Goals:</label>
            <textarea name="fitnessGoals" id="fitnessGoals" required><?= htmlspecialchars($fitnessGoals) ?></textarea>
            
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
