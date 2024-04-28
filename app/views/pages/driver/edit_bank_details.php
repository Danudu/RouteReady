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

// Handle form submission for editing bank details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bankID = escape_data($connection, $_POST['bankID']);
    $driver_id = escape_data($connection, $_POST['driver_id']);
    $accountNo = escape_data($connection, $_POST['accountNo']);
    $bankName = escape_data($connection, $_POST['bankName']);
    $branchName = escape_data($connection, $_POST['branchName']);
    $holdersName = escape_data($connection, $_POST['holdersName']);

    $sql = "UPDATE bank SET driver_id='$driver_id', accountNo='$accountNo', bankName='$bankName', branchName='$branchName', holdersName='$holdersName' WHERE bankID='$bankID'";

    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href='view_bank_details.php';</script>"; // Corrected redirection
    } else {
        echo "Error updating record: " . $connection->error;
    }
}

// Retrieve bank details based on bankID
if (isset($_GET['bankID'])) {
    $bankID = escape_data($connection, $_GET['bankID']);
    $sql = "SELECT * FROM bank WHERE bankID='$bankID'";
    $result = $connection->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $driver_id = $row['driver_id'];
        $accountNo = $row['accountNo'];
        $bankName = $row['bankName'];
        $branchName = $row['branchName'];
        $holdersName = $row['holdersName'];
    } else {
        echo "Bank details not found.";
        exit();
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bank Details</title>
</head>
<body>
    <h2>Edit Bank Details</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="bankID" value="<?php echo $bankID; ?>">
        <label for="driver_id">Driver ID:</label>
        <input type="text" id="driver_id" name="driver_id" value="<?php echo $driver_id; ?>" required><br>
        <label for="accountNo">Account Number:</label>
        <input type="text" id="accountNo" name="accountNo" value="<?php echo $accountNo; ?>" required><br>
        <label for="bankName">Bank Name:</label>
        <input type="text" id="bankName" name="bankName" value="<?php echo $bankName; ?>" required><br>
        <label for="branchName">Branch Name:</label>
        <input type="text" id="branchName" name="branchName" value="<?php echo $branchName; ?>" required><br>
        <label for="holdersName">Holder's Name:</label>
        <input type="text" id="holdersName" name="holdersName" value="<?php echo $holdersName; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
