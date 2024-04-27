<?php
// Inside your DriverModel class

class Driver {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Method to insert driver data

    public function register($data){
        $this->db->query('INSERT INTO outsourceDrivers (name, age, email, password, contact, address, driver_license, status) VALUES(:name, :age, :email, :password, :contact_num, :address, :driver_license, :status)');
        //bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':contact_num', $data['contact_num']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':driver_license', $data['driver_license']);
        $this->db->bind(':status', 'pending');

        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getDriverById($id){
        $this->db->query('SELECT * FROM drivers WHERE user_id = :id');
        $this->db->bind(':id', $id);
    
        $row = $this->db->single();
    
        return $row;
    }


    // Method to update driver data
    public function updateDriver($data){
        // Prepare SQL query to update driver data
        $this->db->query('UPDATE drivers SET driver_license = :driver_license, vehicle_type = :vehicle_type, age = :age, nic_number = :nic_number, years_of_experience = :years_of_experience  WHERE user_id = :user_id');

        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':driver_license', $data['driver_license']);
        $this->db->bind(':vehicle_type', $data['vehicle_type']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':nic_number', $data['nic_number']);
        $this->db->bind(':years_of_experience', $data['years_of_experience']);

        // Execute
        if($this->db->execute()){
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }
}
