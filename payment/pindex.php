<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Methods</title>
    <link rel="stylesheet" href="pstyles.css"> <!-- Link to your CSS file -->
    <script src="pscript.js" defer></script> <!-- Link to your JavaScript file -->
</head>
<body>

    <section id="payment-section">
        <h2>Payment Methods</h2>

        <!-- Form to add or update payment method -->
        <form id="paymentForm" action="pindex.php" method="POST">
            <h3>Add a payment card</h3>

            <div>
                <label for="cardType">Card Type</label>
                <select id="cardType" name="cardType">
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                </select>
            </div>

            <div>
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" required>
            </div>

            <div>
                <label for="expiryDate">Expires</label>
                <input type="date" id="expiryDate" name="expiryDate" required>
            </div>

            <div>
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" required>
            </div>

            <div>
                <label for="cardHolder">Card Holder's Name</label>
                <input type="text" id="cardHolder" name="cardHolder" required>
            </div>

            <button type="submit" name="submit">Submit</button>
            <button type="reset" name="reset">Reset</button>
        </form>

        <!-- Button to view saved payment methods -->
        <a href="pread.php">View Payment Methods</a>
    </section>

</body>
</html>
