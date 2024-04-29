<?php
// Inside your DriverModel class

class Driver {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

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


    // Method to insert driver data
    public function insertDriverData($data){
        // Prepare SQL query to insert driver data
        $this->db->query('INSERT INTO drivers (user_id, driver_license, vehicle_type, age, nic_number, years_of_experience) VALUES (:user_id, :driver_license, :vehicle_type, :age, :nic_number, :years_of_experience)');

        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':driver_license', $data['driver_license']);
        $this->db->bind(':vehicle_type', $data['vehicle_type']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':nic_number', $data['nic_number']);
        $this->db->bind(':years_of_experience', $data['years_of_experience']);

        // Execute
        if($this->db->execute()){
            return true; // Insertion successful
        } else {
            return false; // Insertion failed
        }
    }


    // Insert OS driver data
    public function insertOSDriverData($data){
        // Prepare SQL query to insert driver data
        $this->db->query('INSERT INTO outsourcedrivers (Odriver_id, driver_license, vehicle_type, years_of_experience, nic_number, age, address, name, email, contact_num, vehicle_number, vehicle_name, vehicle_year, model, r_year, vin, insu_pro, insu_pr, capacity) VALUES (:Odriver_id, :driver_license, :vehicle_type, :years_of_experience, :nic_number, :age, :address, :name, :email, :contact_num, :vehicle_number, :vehicle_name, :vehicle_year, :model, :r_year, :vin, :insu_pro, :insu_pr, :capacity)');
        // Bind values
        $this->db->bind(':Odriver_id', $data['Odriver_id']);
        $this->db->bind(':driver_license', $data['driver_license']);
        $this->db->bind(':vehicle_type', $data['vehicle_type']);
        $this->db->bind(':years_of_experience', $data['years_of_experience']);
        $this->db->bind(':nic_number', $data['nic_number']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':contact_num', $data['contact_num']);
        $this->db->bind(':vehicle_number', $data['vehicle_number']);
        $this->db->bind(':vehicle_name', $data['vehicle_name']);
        $this->db->bind(':vehicle_year', $data['vehicle_year']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':r_year', $data['r_year']);
        $this->db->bind(':vin', $data['vin']);
        $this->db->bind(':insu_pro', $data['insu_pro']);
        $this->db->bind(':insu_pr', $data['insu_pr']);
        $this->db->bind(':capacity', $data['capacity']);

        

        

        // Execute
        if($this->db->execute()){
            return true; // Insertion successful
        } else {
            return false; // Insertion failed
        }
    }
    public function getDriverById($id){
        $this->db->query('SELECT * FROM drivers WHERE user_id = :id');
        $this->db->bind(':id', $id);
    
        $row = $this->db->single();
    
        return $row;
    }
    public function getOSDriverById($id){
        $this->db->query('SELECT * FROM drivers WHERE odriver_id = :id');
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
    // Method to update OSdriver data
    public function updateOSDriver($data){
        // Prepare SQL query to update driver data
        $this->db->query('UPDATE outsourcedrivers SET driver_license = :driver_license, vehicle_type = :vehicle_type, age = :age, nic_number = :nic_number, years_of_experience = :years_of_experience  WHERE odriver_id = :user_id');

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

    public function getSalaryDetails($driver_id) {


        // Prepare SQL query to fetch salary details for a specific driver
        $this->db->query('SELECT * FROM out_salary WHERE driver_id = :driver_id');
       
    
        return $this->db->resultSet();
    }
    
}
