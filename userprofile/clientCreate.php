<?php
// to check if there are any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// the config file
require 'clientConfig.php';

// Initializing variables to store form data and error messages
$name = $location = $contact = $email = $goals = "";
$error = "";

// to Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // to Collect input data
    $name = trim($_POST['clientName']);
    $location = trim($_POST['clientLocation']);
    $contact = trim($_POST['clientContactNum']);
    $email = trim($_POST['clientEmail']);
    $goals = trim($_POST['fitnessGoals']);

    // to Validate input fields
    if (empty($name) || empty($location) || empty($contact) || empty($email) || empty($goals)) {
        $error = "All fields are required.";
    } elseif (!preg_match('/^\d{10}$/', $contact)) { // Validating contact number
        $error = "Contact number must be exactly 10 digits.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Validating email
        $error = "Invalid email format.";
    } else {
        // to Prepare the SQL query to insert the data into the database
        $sql = "INSERT INTO client (clientName, clientLocation, clientContactNum, clientEmail, fitnessGoals) 
                VALUES (?, ?, ?, ?, ?)";

        // Prepare and bind the statement referenced from youtube video
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssss", $name, $location, $contact, $email, $goals);

        // to Execute the statement and check if the query was successful
        if ($stmt->execute()) {
            echo "<p>Profile created successfully!</p>";
        } else {
            echo "<p>Error creating profile: " . htmlspecialchars($stmt->error) . "</p>";
        }

        // to Close the statement
        $stmt->close();
    }
}

// to Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <link rel="stylesheet" href="clientCreateStyle.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>Create a New Profile</h1>

    <!-- to Display error message if any -->
    <?php if (!empty($error)) : ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <!-- Profile creating form referred from w3 schools -->
    <form action="clientCreate.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="clientName" required value="<?php echo htmlspecialchars($name); ?>"><br>

        <label for="location">Location:</label>
        <input type="text" name="clientLocation" required value="<?php echo htmlspecialchars($location); ?>"><br>

        <label for="contact">Contact Number:</label>
        <input type="text" name="clientContactNum" required pattern="\d{10}" title="Enter a valid 10-digit contact number" value="<?php echo htmlspecialchars($contact); ?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="clientEmail" required value="<?php echo htmlspecialchars($email); ?>"><br>

        <label for="goals">Fitness Goals:</label>
        <textarea name="fitnessGoals" required><?php echo htmlspecialchars($goals); ?></textarea><br>

        <button type="submit">Create Profile</button>
    </form>
</body>
</html>
