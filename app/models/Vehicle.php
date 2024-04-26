<?php
class Vehicle {
    // Define properties
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Method for adding vehicle data to the database
    public function addVehicle($data) {
        try {
            $imageData = file_get_contents($_FILES['image']['tmp_name']); 
            // Check if file is uploaded and not empty
            if (!empty($data['front_photo']['tmp_name'])) {
                // Read file contents
                $imageData = file_get_contents($data['front_photo']['tmp_name']);
            } else {
                // If file is not uploaded, set image data to null
                $imageData = null;
            }

            // Prepare query
            $this->db->query('INSERT INTO VehicleDetails (Registration_Number, Vehicle_Number, Vehicle_Name, Vehicle_Year, model, r_year, vin, insu_pro, insu_pn, capacity, V_Image, images1, images2) VALUES (:reg_no, :v_no, :name, :year, :model, :r_year, :vin, :insu_pro, :insu_pn, :capacity, :image, :images1, :images2)');

            // Bind parameters
            $capacity = intval($data['passenger_capacity']);
            $this->db->bind(':reg_no', $data['registration_number']);
            $this->db->bind(':v_no', $data['vehicle_number']);
            $this->db->bind(':name', $data['vehicle_type']);
            $this->db->bind(':year', $data['manufacture_year']);
            $this->db->bind(':model', $data['vehicle_model']);
            $this->db->bind(':r_year', $data['registration_year']);
            $this->db->bind(':vin', $data['vin_number']);
            $this->db->bind(':insu_pro', $data['insurance_company']);
            $this->db->bind(':insu_pn', $data['insurance_number']);
            $this->db->bind(':capacity', $data['capacity']); // Use the converted integer value
            $this->db->bind(':images1', $data['V_Image']); // Bind image data
            $this->db->bind(':images1', $data['side_photo_1']);
            $this->db->bind(':images2', $data['side_photo_2']);

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
    
    public function getVehicleDetails() {
        try {
            $this->db->query("SELECT Registration_Number, Vehicle_Number, Vehicle_Name, capacity FROM VehicleDetails;");
            $this->db->execute();
            $results = $this->db->resultSet();
            // Debugging: Check if results are fetched
           
            return $results;
        } catch (Exception $e) {
            // Error handling: Log or handle the exception appropriately
            return []; // Return empty array or handle error as needed
        }
    }

    // Method to get full details of a specific vehicle by registration number
    public function getVehicleDetailsByRegNumber($regNumber)
    {
        $this->db->query('SELECT * FROM VehicleDetails WHERE Registration_Number = :regNumber');
        $this->db->bind(':regNumber', $regNumber);
        return $this->db->single();
    }
}