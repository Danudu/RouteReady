<?php

class Driver{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //get all users
    public function getUsers(){
        $this->db->query('SELECT * FROM users');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getDrivers() {
        $this->db->query("SELECT *,
                                drivers.id as postId,
                                users.id as userId,
                                drivers.date as postCreated,
                                users.date as userCreated
                            FROM drivers
                            INNER JOIN users
                            ON drivers.user_id = users.id
                            ORDER BY drivers.date DESC");
    
        return $this->db->resultSet();
    }
    public function getDriverById($id){
        $this->db->query('SELECT * FROM drivers WHERE id = :id');
        $this->db->bind(':id', $id);
    
        $row = $this->db->single();
    
        return $row;
    }
    public function getDriverByUserId($id){
        $this->db->query('SELECT * FROM drivers WHERE user_id = :user_id');
        $this->db->bind(':user_id', $id);
    
        $row = $this->db->single();
    
        return $row;
    }

  

    //find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        //bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    //get user by id
    public function getUserById($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        //bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

   

    //edit user
    public function updateUser($data){
        $this->db->query('UPDATE users SET name = :name, emp_id = :emp_id, email = :email, contact_num = :contact_num, address = :address, department = :department, password = :password WHERE id = :id');
        //bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':emp_id', $data['emp_id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':contact_num', $data['contact_num']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':department', $data['department']);
        $this->db->bind(':password', $data['password']);


        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    //edit user
    public function updateDriver($data){
        $this->db->query('UPDATE drivers SET name = :name, emp_id = :emp_id, email = :email, contact_num = :contact_num, address = :address, department = :department, password = :password WHERE id = :id');
        //bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':emp_id', $data['emp_id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':contact_num', $data['contact_num']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':department', $data['department']);
        $this->db->bind(':password', $data['password']);


        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
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

public function getSalaryDetails($driver_id) {
    // Prepare SQL query to fetch salary details for a specific driver
    $this->db->query('SELECT * FROM out_salary WHERE driver_id = :driver_id');
    $this->db->bind(':driver_id', $driver_id);
    $salary_details = $this->db->resultSet();

    return $salary_details;
}
   
}