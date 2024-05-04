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
        .wrapper {
            background-color: rgba(1,1,1,1);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: auto;
            margin-top: 30px;
            margin-left: 30px;
            margin-right: 30px;
        }

        .container {
            backdrop-filter: blur(10px) brightness(0.3);
            min-height: 30vh;
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
            border-top: 70px;
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
        input[type="submit"],
    .button {
        width: 100%;
        height: 45px;
        /* Increased height for larger button */
        background: var(--text-light);
        border: none;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        cursor: pointer;
        font-size: 20px;
        /* Increased font size */
        color: var(--primary-color);
        font-weight: 600;
        text-align: center;
        line-height: 45px;
        /* Centering text vertically */
        display: inline-block;
        text-decoration: none;
        transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
        margin-top: 20px;
        /* Added margin top */
    }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title>View Bank Details| RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
  
</head>
<body>
<body>
<div class="sidebar">

        <div class="top">
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="">
                <span class="logo_name">Route Ready</span>
            </div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
        <div class="buttons">
            <ul>
                <li>
                    <a href="home">
                        <a href="<?php echo URLROOT; ?>/pages/home/<?= $_SESSION['user_id'] ?>">
                            <i class="fa-solid fa-house"></i>
                            <span class="icon_name">Home</span>
                        </a>
                        <span class="tooltip">HomePage</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/profile/<?= $_SESSION['user_id'] ?>">
                        <i class="fas fa-user"></i>
                        <span class="icon_name">Profile</span>
                    </a>
                    <span class="tooltip">Profile</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/submitLeaveApplication">
                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                        <span class="icon_name">Leaves</span>
                    </a>
                    <span class="tooltip">Apply Leaves</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewSchedule">
                    <i class="fa-regular fa-calendar-days"></i>
                        <span class="icon_name">Schedule</span>
                    </a>
                    <span class="tooltip">Schedule</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewSalary/<?= $_SESSION['user_id'] ?>">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span class="icon_name">Salary</span>
                    </a>
                    <span class="tooltip">Salary Reports</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewBankDetails">
                    <i class="fa-solid fa-money-check-dollar"></i>
                        <span class="icon_name">BankDetails</span>
                    </a>
                    <span class="tooltip">Bank Details</span>
                </li>
            </ul>
            <!-- <ul>
                <li id="showPopup">
                    <a href="#" onclick="event.preventDefault();" id="showPopup">
                        <i class="fas fa-book-bookmark"></i>
                        <span class="icon_name">T&C</span>
                    </a>
                    <span class="tooltip">Terms & Conditions</span>
                </li>
            </ul> -->
            <ul class="lobtn">
                <li>
                    <a href="<?php echo URLROOT; ?>/users/logout">
                        <i class="fas fa-arrow-right-from-bracket"></i>
                        <span class="icon_name">Logout</span>
                    </a>
                    <span class="tooltip">Logout</span>
                </li>
            </ul>
        </div>
    </div>
<script>
let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");

btn.onclick = function () {
    sidebar.classList.toggle("active");
};
</script>

    <div class="main-content">
  
     <div class="container">
        <div class="wrapper">

            <!-- Display Bank Details -->
            <h2>Bank Details</h2>
            
            <ul>
                <div class="form-group"><li><strong>Account Number:</strong> <?php echo $data['bankDetails']->accountNo; ?></li></div>
                <div class="form-group"><li><strong>Bank Name:</strong> <?php echo $data['bankDetails']->bankName; ?></li></div>
                <div class="form-group"><li><strong>Branch Name:</strong> <?php echo $data['bankDetails']->branchName; ?></li></div>
                <div class="form-group"><li><strong>Account Holder's Name:</strong> <?php echo $data['bankDetails']->holdersName; ?></li></div>
            </ul>
            <a href="<?php echo URLROOT; ?>/drivers/editBankDetails" class="button">Edit Bank Details</a><br>
            <div><!-- back -->
            <!-- <a href="<?php echo URLROOT; ?>/drivers/home" class="btn"> Back </a></div> -->
        </div>
    </div>
</div>
</div>
</body>
</html>

<?php
// Close the database connection
$connection->close();
?>