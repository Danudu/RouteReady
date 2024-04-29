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
  <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            
            
        }

        .container {
            backdrop-filter: blur(10px) brightness(0.3);
            min-height: 100vh;
            padding-bottom: 30px;
            max-width: 1600px;
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            font-size: 36px;
            text-align: center;
            color: var(--white);
        }

        .form-group {
            margin: 15px 0;
            align-items: center;
            width: 100%;
        }

        label {
            color: var(--white);
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            height: 40px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid var(--text-light);
            background-color: var(--primary-color-light);
            color: var(--text-light);
            margin-top: 5px;
        }

        
        a.btn{
            width: 100%;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 10px;
        }
        a.btn:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Details</title>
  
</head>
<body>

<!-- Display Bank Details -->
<h2>Bank Details</h2>
<div class="container">
    <ul>
        <div class="form-group"><li><strong>Account Number:</strong> <?php echo $data['bankDetails']->accountNo; ?></li></div>
        <div class="form-group"><li><strong>Bank Name:</strong> <?php echo $data['bankDetails']->bankName; ?></li></div>
        <div class="form-group"><li><strong>Branch Name:</strong> <?php echo $data['bankDetails']->branchName; ?></li></div>
        <div class="form-group"><li><strong>Account Holder's Name:</strong> <?php echo $data['bankDetails']->holdersName; ?></li></div>
    </ul>
    <a href="<?php echo URLROOT; ?>/drivers/editBankDetails" class="btn">Edit Bank Details</a>
</div>

</body>
</html>

<?php
// Close the database connection
$connection->close();
?>