// clientScript.js

function validateContactNumber() {
    const contactInput = document.getElementById('contact'); 
    const contactValue = contactInput.value;

    // Checking if contact number is not exactly 10 digits
    if (contactValue.length !== 10 || isNaN(contactValue)) {
        alert("Please enter a valid contact number with exactly 10 digits.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

// Attaching the validate function to the form's submit event
document.getElementById('updateForm').addEventListener('submit', function(event) {
    if (!validateContactNumber()) {
        event.preventDefault(); // preventing the form from submitting
    }
});
