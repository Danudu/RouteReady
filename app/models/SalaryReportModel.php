<?php
class SalaryReportModel {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "routeready_db";
    private $connection;

    public function __construct() {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getSalaryData($driver_id) {
        $sql = "SELECT * FROM salary_report WHERE driver_id = '$driver_id'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function getBankData($driver_id) {
        $sql = "SELECT * FROM bank_details WHERE driver_id = '$driver_id'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function closeConnection() {
        $this->connection->close();
    }
}
?>
