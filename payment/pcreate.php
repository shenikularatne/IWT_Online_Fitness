<?php
require 'pconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardType = $_POST['cardType'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    $cardHolder = $_POST['cardHolder'];

    $sql = "INSERT INTO payment (cardType, cardNumber, expiryDate, cvv, cardHolder)
            VALUES ('$cardType', '$cardNumber', '$expiryDate', '$cvv', '$cardHolder')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>

