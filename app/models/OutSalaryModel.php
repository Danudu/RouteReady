<?php
class OutSalaryModel {
    private $db;

    public function __construct() {
        $this->db = new Database; // Assuming you have a Database class for handling database connections
    }

    // Method to insert salary data into the database
    public function insertSalary($data) {
        try {
            // Prepare query
            $this->db->query('INSERT INTO out_salary (driver_id, number_of_trips, basic_payment, total_amount, month, year) VALUES (:driver_id, :number_of_trips, :basic_payment, :total_amount, :month, :year)');

            // Bind parameters
            $this->db->bind(':driver_id', $data['driver_id']);
            $this->db->bind(':number_of_trips', $data['number_of_trips']);
            $this->db->bind(':basic_payment', $data['basic_payment']);
            $this->db->bind(':total_amount', $data['total_amount']);
            $this->db->bind(':month', $data['month']);
            $this->db->bind(':year', $data['year']);

            // Execute query
            if ($this->db->execute()) {
                return true;
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
