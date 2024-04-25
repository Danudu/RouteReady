<?php

class DriverSalaryModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getDriverSalaryReport($driverId, $selectedMonth, $selectedYear) {
        $sql = "SELECT * FROM staff_salary_payment WHERE driver_id = ? AND MONTH(month) = ? AND YEAR(year) = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("iii", $driverId, $selectedMonth, $selectedYear);
        $stmt->execute();
        $result = $stmt->get_result();
        $salaryReport = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $salaryReport;
    }
}

?>
