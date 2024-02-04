<?php
require_once('dbconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $issue = mysqli_real_escape_string($conn, $_POST["issue"]);
    $exactlocation = mysqli_real_escape_string($conn, $_POST["exactlocation"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
    

    // Insert data into the database
    $sql = "INSERT INTO assistance_requests (name, location, exactlocation, mobile, issue) VALUES ('$name', '$location','$exactlocation','$mobile','$issue')";

    if ($conn->query($sql) === TRUE) {
        echo "An assistant will call you shortly.";
        
        // Redirect to the home page after a delay (e.g., 3 seconds)
        header("refresh:3;url=index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
