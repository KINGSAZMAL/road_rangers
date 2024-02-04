function login() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // For simplicity, hardcoded admin credentials
    if (username === "admin" && password === "123") {
        window.location.href = "view_request.php";
        alert('Login successful!');
    } else {
        alert("Please enter both username and password.");
    }
}
