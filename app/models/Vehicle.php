<?php
class Vehicle {
    // Define properties
    private $db;

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



    private $registrationNumber;
    private $vehicleNumber;
    private $vehicleName;
    private $capacity;

    public function viewVehicle($registrationNumber, $vehicleNumber, $vehicleName, $capacity) {
        $this->registrationNumber = $registrationNumber;
        $this->vehicleNumber = $vehicleNumber;
        $this->vehicleName = $vehicleName;
        $this->capacity = $capacity;
    }

    // Getters
    public function getRegistrationNumber() {
        return $this->registrationNumber;
    }

    public function getVehicleNumber() {
        return $this->vehicleNumber;
    }

    public function getVehicleName() {
        return $this->vehicleName;
    }

    public function getCapacity() {
        return $this->capacity;
    }


    public function getVehicleDetails() {
        try {
            // Prepare query
            $this->db->query('SELECT * FROM VehicleDetails');

            // Execute query
            $this->db->execute();

            // Fetch all vehicle details as an associative array
            $vehicles = $this->db->resultSet();

            return $vehicles;
        } catch (PDOException $e) {
            // Log or display the error
            echo 'Error: ' . $e->getMessage();
            return []; // Return an empty array if an error occurs
        }
    }
}

