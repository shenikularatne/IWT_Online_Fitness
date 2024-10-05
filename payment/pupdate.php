<?php
session_start(); // Start the session to use session variables
require 'pconfig.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the record to be updated
    $sql = "SELECT * FROM payment WHERE id='$id'";
    $result = $con->query($sql);
    
    // Check if the record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found!";
        exit(); // Stop the script if the record doesn't exist
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated values from the form
    $id = $_POST['id'];
    $cardType = $_POST['cardType'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    $cardHolder = $_POST['cardHolder'];

    // Update the record in the database
    $sql = "UPDATE payment SET 
            cardType='$cardType', cardNumber='$cardNumber', expiryDate='$expiryDate', 
            cvv='$cvv', cardHolder='$cardHolder' WHERE id='$id'";

    if ($con->query($sql) === TRUE) {
        // Set the success message in session
        $_SESSION['message'] = "Record updated successfully";
        header("Location: pread.php"); // Redirect to the 'pread.php' page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Payment Method</title>
    <link rel="stylesheet" href="pupdatestyle.css">
</head>
<body>

    <!-- Display the form with existing data -->
    <form action="pupdate.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        
        <label for="cardType">Card Type</label>
        <select id="cardType" name="cardType">
            <option value="visa" <?php echo (isset($row['cardType']) && $row['cardType'] == 'visa') ? 'selected' : ''; ?>>Visa</option>
            <option value="mastercard" <?php echo (isset($row['cardType']) && $row['cardType'] == 'mastercard') ? 'selected' : ''; ?>>MasterCard</option>
        </select>

        <label for="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" name="cardNumber" value="<?php echo isset($row['cardNumber']) ? $row['cardNumber'] : ''; ?>" required>

        <label for="expiryDate">Expires</label>
        <input type="date" id="expiryDate" name="expiryDate" value="<?php echo isset($row['expiryDate']) ? $row['expiryDate'] : ''; ?>" required>

        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" maxlength="3" value="<?php echo isset($row['cvv']) ? $row['cvv'] : ''; ?>" required>

        <label for="cardHolder">Card Holder's Name</label>
        <input type="text" id="cardHolder" name="cardHolder" value="<?php echo isset($row['cardHolder']) ? $row['cardHolder'] : ''; ?>" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>
