<?php
class Vehicle {
    // Define properties
    private $db;
    private $query;

    public function __construct()
    {
        $this->db = new Database;
        
    }

    // Example method for saving to a database
    public function addVehicle($data) {
        try {
            // Debug file data
            var_dump($data['front_photo']);

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
            $this->db->bind(':capacity', $capacity); // Use the converted integer value
            $this->db->bind(':image', $imageData); // Bind image data
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
    public function getAllVehicles()
    {
        // Establish database connection
        $host = "localhost";
        $username = "root";
        $password = "root";
        $db = "routeready_db";

        $conn = new mysqli($host, $username, $password, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve all vehicle details
        $sql = "SELECT * FROM VehicleDetails";
        $result = $conn->query($sql);
        $vehicles = [];

        if ($result->num_rows > 0) {
            // Loop through the results and store them in an array
            while ($row = $result->fetch_assoc()) {
                $vehicles[] = $row;
            }
        }

        // Close the database connection
        $conn->close();

        return $vehicles;
    }
    


 }
   
    
   
    






