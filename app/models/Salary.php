<?php
class Salary {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to insert salary data into the database
    public function insertSalary($data) {
        try {
            // Prepare query
            $this->db->query('INSERT INTO staff_salary_payment (paymentID, driver_id, month, year, basic_salary, number_of_days, additional_deduction_days, additional_deduction_amount, service_commission, total_salary, status) VALUES (:paymentID, :driver_id, :month, :year, :basic_salary, :number_of_days, :additional_deduction_days, :additional_deduction_amount, :service_commission, :total_salary, :status)');

            // Bind parameters
            $this->db->bind(':paymentID', $data['paymentID']);
            $this->db->bind(':driver_id', $data['driver_id']);
            $this->db->bind(':month', $data['month']);
            $this->db->bind(':year', $data['year']);
            $this->db->bind(':basic_salary', $data['basic_salary']);
            $this->db->bind(':number_of_days', $data['number_of_days']);
            $this->db->bind(':additional_deduction_days', $data['additional_deduction_days']);
            $this->db->bind(':additional_deduction_amount', $data['additional_deduction_amount']);
            $this->db->bind(':service_commission', $data['service_commission']);
            $this->db->bind(':total_salary', $data['total_salary']);
            $this->db->bind(':status', $data['status']);

            // Execute query
            if ($this->db->execute()) {
                echo "Data inserted successfully!";
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Log or display the error
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
