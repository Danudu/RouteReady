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
            if ($data['total_amount'] !== false) {
                // If successful, echo the success message along with the total amount
                echo "<span style='color: white;'>Calculated Successfully. Total amount: Rs." . $data['total_amount'];
            } else {
                // If not successful, echo an error message
                echo "Failed to calculate total amount.";
            }
        } catch (PDOException $e) {
            // Log or display the error
            echo 'Error: ' ;
            return false;
        }
    }
}
