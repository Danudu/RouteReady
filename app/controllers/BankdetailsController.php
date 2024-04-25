<?php
require_once 'BankDetailsModel.php';

class BankDetailsController {
    private $model;

    public function __construct() {
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "routeready_db";

        $connection = new mysqli($servername, $username, $password, $database);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Initialize the model
        $this->model = new BankDetailsModel($connection);
    }

    public function addBankDetails($driver_id, $accountNo, $bankName, $branchName, $holdersName) {
        // Call the model function to add bank details
        return $this->model->addBankDetails($driver_id, $accountNo, $bankName, $branchName, $holdersName);
    }
}

// Usage:
// Instantiate the controller
$controller = new BankDetailsController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $driver_id = $_POST['driver_id'];
    $accountNo = $_POST['accountNo'];
    $bankName = $_POST['bankName'];
    $branchName = $_POST['branchName'];
    $holdersName = $_POST['holdersName'];

    // Add bank details into the database via the controller
    $result = $controller->addBankDetails($driver_id, $accountNo, $bankName, $branchName, $holdersName);

    // Handle the result as needed (e.g., display success/error message)
    if ($result) {
        echo "Bank details added successfully";
    } else {
        echo "Error: Failed to add bank details";
    }
}
?>
