<?php
class OutSalaryModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to insert salary data into the database
    public function insertSalaryDetails($driver_id, $number_of_trips, $basic_payment, $total_amount, $current_month, $current_year) {
        try {
            // Prepare query
            $this->db->query('INSERT INTO out_salary (driver_id, number_of_trips, basic_payment, total_amount, month, year) VALUES (?, ?, ?, ?, ?, ?)');

            // Bind parameters
            $this->db->bind(1, $driver_id);
            $this->db->bind(2, $number_of_trips);
            $this->db->bind(3, $basic_payment);
            $this->db->bind(4, $total_amount);
            $this->db->bind(5, $current_month);
            $this->db->bind(6, $current_year);

            // Execute query
            if ($this->db->execute()) {
                return true; // Insertion successful
            } else {
                return false; // Insertion failed
            }
        } catch (PDOException $e) {
            // Log or display the error
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}

