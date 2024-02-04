<?php
require_once('dbconfig.php');

// Check if the "Mark as Done" or "Delete" button is clicked
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action === 'done') {
        // Update the status to indicate that assistance is finished
        $updateSql = "UPDATE assistance_requests SET status = 'Done' WHERE id = $id";
        $conn->query($updateSql);
    } elseif ($action === 'delete') {
        // Delete the assistance request
        $deleteSql = "DELETE FROM assistance_requests WHERE id = $id";
        $conn->query($deleteSql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assistance Requests</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
<nav>
        <a href="index.html">HOME</a>
        </nav>
    <div class="container">
        <h2 class="mt-4 mb-4">Assistance Requests</h2>

        <?php
        $sql = "SELECT * FROM assistance_requests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>ID</th><th>Name</th><th>Location</th><th>exactlocation</th><th>mobile</th><th>Status</th><th>Action</th></tr></thead><tbody>';
            
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["location"] . "</td><td>" . $row["exactlocation"] . "</td><td>" . $row["mobile"] . "</td><td>" . $row["status"] . "</td>";
                echo '<td><a href="?action=done&id=' . $row["id"] . '" class="btn btn-success btn-sm">Done</a>';
                echo ' <a href="?action=delete&id=' . $row["id"] . '" class="btn btn-danger btn-sm">Delete</a></td></tr>';
            }

            echo '</tbody></table>';
        } else {
            echo '<div class="alert alert-info" role="alert">No assistance requests yet.</div>';
        }

        $conn->close();
        ?>

    </div>

    <!-- Include jQuery and Bootstrap JS from CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
