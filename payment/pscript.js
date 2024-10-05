window.onload = function() {
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        const cardNumber = document.getElementById('cardNumber').value;

        // Regular expression to check if card number contains exactly 16 digits
        const regex = /^\d{16}$/;

        if (!regex.test(cardNumber)) {
            alert("Card number must be exactly 16 digits.");
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
};
