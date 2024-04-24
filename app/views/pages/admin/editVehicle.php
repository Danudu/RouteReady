<?php
session_start();

$user_id = $_SESSION['user_id'] ?? null; 

$host = "localhost";
$username = "root";
$password = "root";
$db = "routeready";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM VehicleDetails";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vehicles[] = $row;
    }
} else {
    $vehicles = array();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Vehicles</title>
</head>
<body>
    <h1>List of Vehicles</h1>
    <table border="1">
        <tr>
            <th>Registration Number</th>
            <th>Vehicle Number</th>
            <th>Vehicle Type</th>
            <th>Capacity</th>
            <th>Options</th>
        </tr>
        <?php foreach ($vehicles as $vehicle): ?>
            <tr>
                <td><?php echo $vehicle['Registration_Number']; ?></td>
                <td><?php echo $vehicle['Vehicle_Number']; ?></td>
                <td><?php echo $vehicle['Vehicle_Name']; ?></td>
                <td><?php echo $vehicle['capacity']; ?></td>
                <td><a href="editVehicle.php?reg_no=<?php echo $vehicle['Registration_Number']; ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
