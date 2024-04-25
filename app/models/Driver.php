<?php
// Inside your DriverModel class

class Driver {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Method to insert driver data
    public function insertDriverData($data){
        // Prepare SQL query to insert driver data
        $this->db->query('INSERT INTO drivers (user_id, driver_license, vehicle_type) VALUES (:user_id, :driver_license, :vehicle_type)');

        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':driver_license', $data['driver_license']);
        $this->db->bind(':vehicle_type', $data['vehicle_type']);

        // Execute
        if($this->db->execute()){
            return true; // Insertion successful
        } else {
            return false; // Insertion failed
        }
    }
}
