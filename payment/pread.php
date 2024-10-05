<?php
session_start(); // Start the session to access the message
require 'pconfig.php'; // Include your database connection

// Check if there's a flash message in the session and display it
if (isset($_SESSION['message'])) {
    echo "<p class='flash-message'>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Clear the message after displaying it
}

// Fetch records from the 'payment' table
$sql = "SELECT id, cardType, cardNumber, expiryDate, cvv, cardHolder FROM payment";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payment Records</title>
    <link rel="stylesheet" href="preadstyle.css"> <!-- Linking to the external CSS file -->
    <style>
        .flash-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        a.add-record-btn {
            display: inline-block;
            margin-bottom: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.add-record-btn:hover {
            background-color: #45a049;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Payment Records</h2>

<!-- Display Add New Record Button -->
<a href="pindex.php" class="add-record-btn">Add New Payment Record</a>

<?php
if ($result->num_rows > 0) {
    echo "<table>
          <tr>
            <th>ID</th>
            <th>Card Type</th>
            <th>Card Number</th>
            <th>Expiry Date</th>
            <th>CVV</th>
            <th>Card Holder</th>
            <th>Actions</th>
          </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["cardType"] . "</td>
                <td>" . $row["cardNumber"] . "</td>
                <td>" . $row["expiryDate"] . "</td>
                <td>" . $row["cvv"] . "</td>
                <td>" . $row["cardHolder"] . "</td>
                <td>
                    <a href='pupdate.php?id=" . $row["id"] . "'>Edit</a> |
                    <a href='pdelete.php?id=" . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found</p>";
}

$con->close();
?>

</body>
</html>
