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
    public function getDriverById($id)
{
    $this->db->query('SELECT * FROM drivers WHERE user_id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    // Check if driver exists
    if ($this->db->rowCount() > 0) {
        return $row;
    } else {
        return null; // Return null if driver does not exist
    }
}
    public function getOSDriverById($id){
        $this->db->query('SELECT * FROM outsourcedrivers WHERE odriver_id = :id');
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
        $this->db->bind(':driver_id', $driver_id);
        $salary_details = $this->db->resultSet();
    
        return $salary_details;
    }
    
    public function getBankDetailsByUserId($user_id)
    {
        // Prepare SQL query to select bank details by user ID
        $this->db->query('SELECT * FROM bank WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
    
        // Fetch a single record (assuming each user has only one bank detail entry)
        return $this->db->single();
    }
    
    public function insertBankDetails($data){
        // Prepare SQL query to insert bank details
        $this->db->query('INSERT INTO bank (accountNo, bankName, branchName, holdersName, user_id) VALUES (:accountNo, :bankName, :branchName, :holdersName, :user_id)');
    
        // Get the user ID from the session
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    
        // Bind values
        $this->db->bind(':accountNo', $data['accountNo']);
        $this->db->bind(':bankName', $data['bankName']);
        $this->db->bind(':branchName', $data['branchName']);
        $this->db->bind(':holdersName', $data['holdersName']);
        $this->db->bind(':user_id', $user_id);
    
        // Execute
        if($this->db->execute()){
            return true; // Insertion successful
        } else {
            return false; // Insertion failed
        }
    }

    public function updateBankDetails($data)
{
    // Prepare SQL query to update bank details
    $this->db->query('UPDATE bank SET accountNo = :accountNo, bankName = :bankName, branchName = :branchName, holdersName = :holdersName WHERE user_id = :user_id');

    // Bind values
    $this->db->bind(':accountNo', $data['accountNo']);
    $this->db->bind(':bankName', $data['bankName']);
    $this->db->bind(':branchName', $data['branchName']);
    $this->db->bind(':holdersName', $data['holdersName']);
    $this->db->bind(':user_id', $data['user_id']);

    // Execute the query
    if ($this->db->execute()) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}

public function getSalaryByID($id){
    $this->db->query('SELECT * FROM out_salary WHERE driver_id = :id');
    $this->db->bind(':id', $id);

    $results = $this->db->resultSet();
    
    return $results;
}

public function getFullDayBookings($date) {
    $this->db->query("SELECT * FROM fullday_timetable WHERE b_date = :date");
    $this->db->bind(':date', $date);
    return $this->db->resultSet();
}

public function getTimetableDetails($date) {
    $this->db->query("SELECT * FROM timetable WHERE `date` = :date");
    $this->db->bind(':date', $date);
    return $this->db->resultSet();
}

}