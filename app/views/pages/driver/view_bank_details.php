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
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['bankID'])) {
    $bankID = escape_data($connection, $_GET['bankID']);
    $deleteSql = "DELETE FROM bank WHERE bankID='$bankID'";
    if ($connection->query($deleteSql) === TRUE) {
        // Redirect to view_bank_details.php after successful deletion
        header("Location: view_bank_details.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}

// Query to select all data from the bank table
$sql = "SELECT * FROM bank";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Bank Details</h2>
    <table>
        <tr>
            <th>Bank ID</th>
            <th>Driver ID</th>
            <th>Account Number</th>
            <th>Bank Name</th>
            <th>Branch Name</th>
            <th>Holder's Name</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["bankID"]."</td>";
                echo "<td>".$row["driver_id"]."</td>";
                echo "<td>".$row["accountNo"]."</td>";
                echo "<td>".$row["bankName"]."</td>";
                echo "<td>".$row["branchName"]."</td>";
                echo "<td>".$row["holdersName"]."</td>";
                echo "<td>";
                echo "<a href='edit_bank_details.php?bankID=".$row["bankID"]."'>Edit</a> | ";
                echo "<a href='delete_bank_details.php?action=delete&bankID=".$row["bankID"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$connection->close();
?>