<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* White background */
            color: #000; /* Black text */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }

        .salary-report {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
            padding: 20px;
            border-radius: 10px;
        }

        .salary-report h2,
        .salary-report h3 {
            color: #fff; /* White text */
        }

        .salary-report p {
            color: #fff; /* White text */
            margin-bottom: 10px;
        }

        .salary-report hr {
            border-color: #fff; /* White border */
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .salary-report h3 {
            margin-top: 20px;
        }

        .salary-report h3:first-child {
            margin-top: 0;
        }
        .form {
           text-align: center;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;">Salary Report</h1>
<div class="form">
    <form method="get" action="">
        <label for="driver_id">Enter Driver ID:</label>
        <input type="text" id="driver_id" name="driver_id">
        <input type="submit" value="Get Salary Report">
    </form>
</div>

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

// Check if driver_id is submitted
if (isset($_GET['driver_id'])) {
    // Retrieve driver_id from the form
    $driver_id = $_GET['driver_id'];

    // Assume you have a function to fetch salary data based on driver_id
    $salary_data = get_salary_data($driver_id, $connection);
    $bank_data = get_bank_data($driver_id, $connection);

    // Check if salary data is found
    if ($salary_data) {
        // Display the salary report
        echo "<div class='container'>";
        echo "<div class='salary-report'>";
        echo "<h2>Salary Report</h2>";
        echo "<h3>Driver ID: $driver_id</h3>";
        echo "<hr>";
        echo "<h3>Salary Details:</h3>";
        echo "<p>Basic Salary: " . $salary_data['basic_salary'] . "</p>";
        echo "<p>Number of Days Worked: " . $salary_data['number_of_days'] . "</p>";
        echo "<p>Additional Deduction Days: " . $salary_data['additional_deduction_days'] . "</p>";
        echo "<p>Service Commission: " . $salary_data['service_commission'] . "</p>";
        echo "<p>Total Salary: " . $salary_data['total_salary'] . "</p>";
        // Display other salary details as needed

        // Display bank details
        echo "<h3>Bank Details:</h3>";
        if ($bank_data) {
            echo "<p>Account Number: " . $bank_data['accountNo'] . "</p>";
            echo "<p>Bank Name: " . $bank_data['bankName'] . "</p>";
            echo "<p>Branch Name: " . $bank_data['branchName'] . "</p>";
            echo "<p>Holder's Name: " . $bank_data['holdersName'] . "</p>";
        } else {
            echo "<p>No bank details found for Driver ID: $driver_id</p>";
        }

        echo "</div>"; // Close salary-report div
        echo "</div>"; // Close container div
    } else {
        echo "<p>No salary data found for Driver ID: $driver_id</p>";
    }
}

function get_salary_data($driver_id, $conn) {
    // Query to fetch salary data for the specified driver_id
    $sql = "SELECT * FROM staff_salary_payment WHERE driver_id = '$driver_id'";
    $result = $conn->query($sql);

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Fetch salary data
        $salary_data = $result->fetch_assoc();
        return $salary_data;
    } else {
        return false;
    }
}

function get_bank_data($driver_id, $conn) {
    // Query to fetch bank data for the specified driver_id
    $sql = "SELECT * FROM bank WHERE driver_id = '$driver_id'";
    $result = $conn->query($sql);

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Fetch bank data
        $bank_data = $result->fetch_assoc();
        return $bank_data;
    } else {
        return false;
    }
}

// Close the database connection
$connection->close();
?>
</body>
</html>
