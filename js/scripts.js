// js/script.js

// Function to display a confirmation message when assistance is requested
function requestAssistance() {
    alert("Assistance requested successfully! Our team will reach out to you shortly.");
    // You can add more functionality here, such as redirecting to the homepage or clearing the form.
}

// Event listener for the request assistance form
document.addEventListener("DOMContentLoaded", function () {
    const assistanceForm = document.getElementById("assistanceForm");

    if (assistanceForm) {
        assistanceForm.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevents the form from submitting normally

            // Perform any client-side validation here

            // If validation passes, simulate a server request (you'd send data to the server in a real scenario)
            setTimeout(requestAssistance, 1000); // Simulating a delay for demonstration purposes
        });
    }
});
