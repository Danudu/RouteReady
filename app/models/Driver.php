<?php

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


    public function insertOutsourceDriverData($data){
        // Prepare SQL query to insert driver data
        $this->db->query('INSERT INTO outsourceDrivers (name, age, email, nic_number, contact_num, address, vehicle_type, driver_license, years_of_experience, password, Vehicle_Number, Vehicle_Name, Vehicle_Year, model, r_year, vin, insu_pro, insu_pn, capacity, status) VALUES (:name, :age, :email, :nic_number, :contact_num, :address, :vehicle_type, :driver_license, :years_of_experience, :password, :Vehicle_Number, :Vehicle_Name, :Vehicle_Year, :model, :r_year, :vin, :insu_pro, :insu_pn ,:capacity, :status)');

        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':nic_number', $data['nic_number']);
        $this->db->bind(':contact_num', $data['contact_num']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':vehicle_type', $data['vehicle_type']);
        $this->db->bind(':driver_license', $data['driver_license']);
        $this->db->bind(':years_of_experience', $data['years_of_experience']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':Vehicle_Number', $data['Vehicle_Number']);
        $this->db->bind(':Vehicle_Name', $data['Vehicle_Name']);
        $this->db->bind(':Vehicle_Year', $data['Vehicle_Year']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':r_year', $data['r_year']);
        $this->db->bind(':vin', $data['vin']);
        $this->db->bind(':insu_pro', $data['insu_pro']);
        $this->db->bind(':insu_pn', $data['insu_pn']);
        $this->db->bind(':capacity', $data['passenger_capacity']);
        $this->db->bind(':Vehicle_Year', $data['Vehicle_Year']);
        $this->db->bind(':passenger_capacity', $data['passenger_capacity']);

        $this->db->bind(':status', 'pending');

        // Execute
        if($this->db->execute()){
            return true; // Insertion successful
        } else {
            return false; // Insertion failed
        }
    }
    
    public function get_vehicle_details($reg_no){
        $this->db->query('SELECT * FROM VehicleDetails WHERE Registration_Number = :reg_no');
        $this->db->bind(':reg_no', $reg_no);
    
        $row = $this->db->single();
    
        return $row;
    }


    public function getDailyReservations()
{
    // Get the current date
    $currentDate = date('Y-m-d');
    
    // Query to retrieve reservations for the current date
    $this->db->query("SELECT * FROM TransportReservation WHERE Date = :currentDate");
    $this->db->bind(':currentDate', $currentDate);
    
    // Return the result set
    return $this->db->resultSet();
}

public function getMonthlyReservations()
{
    // Get the current date
    $currentDate = date('Y-m-d');
    
    // Query to retrieve monthly reservations where the current date is between start date and end date
    $this->db->query("SELECT * FROM MonthlyReservation WHERE :currentDate BETWEEN StartDate AND EndDate");
    $this->db->bind(':currentDate', $currentDate);
    
    // Return the result set
    return $this->db->resultSet();
}

public function getWorkTripReservations($status) {
    // Get the current date
    $currentDate = date('Y-m-d');
    
    // Query to retrieve work trip reservations for the current date with the specified status
    $this->db->query("SELECT * FROM work_trips WHERE tripDate = :currentDate AND status = :status");
    $this->db->bind(':currentDate', $currentDate);
    $this->db->bind(':status', $status);
    
    // Return the result set
    return $this->db->resultSet();
}

// Method to apply leave
public function applyLeave($data) {
    // Retrieve user_id and Odriver_id from the session
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $odriver_id = isset($_SESSION['Odriver_id']) ? $_SESSION['Odriver_id'] : null;

    // Prepare and execute the database query
    $this->db->query('INSERT INTO leave_requests (user_id, Odriver_id, date, type, reason, status) VALUES (:user_id, :Odriver_id, :date, :type, :reason, :status)');
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':Odriver_id', $odriver_id);
    $this->db->bind(':date', $data['leave_date']);
    $this->db->bind(':type', $data['leave_type']);
    $this->db->bind(':reason', $data['reason']);
    $this->db->bind(':status', 'pending');

    // Execute the query
    if($this->db->execute()){
        return true; // Leave request submitted successfully
    } else {
        return false; // Failed to submit leave request
    }
}


public function getLeaveByDate($user_id, $leave_date) {
    $this->db->query('SELECT * FROM leave_requests WHERE user_id = :user_id AND date = :leave_date');
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':leave_date', $leave_date);

    $row = $this->db->single();

    return $row;
}

// Method to count leaves by type for a user
public function countLeavesByType($user_id, $leave_type) {
    $this->db->query('SELECT COUNT(*) AS leave_count FROM leave_requests WHERE user_id = :user_id AND type = :leave_type');
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':leave_type', $leave_type);

    $row = $this->db->single();

    return $row->leave_count;
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

public function getBankDetailsByUserId($user_id)
{
    // Prepare SQL query to select bank details by user ID
    $this->db->query('SELECT * FROM bank WHERE user_id = :user_id');
    $this->db->bind(':user_id', $user_id);

    // Fetch a single record (assuming each user has only one bank detail entry)
    return $this->db->single();
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

}
