<?php
// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "routeready_db";

$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Function to safely escape data to prevent SQL injection
function escape_data($connection, $data) {
    return mysqli_real_escape_string($connection, trim($data));
}

// Handle delete request
if (isset($_GET['bankID'])) {
    $bankID = escape_data($connection, $_GET['bankID']);
    $deleteSql = "DELETE FROM bank WHERE bankID='$bankID'";
    if ($connection->query($deleteSql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
        echo "<script>window.location.href='view_bank_details.php';</script>";
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}

$connection->close();

