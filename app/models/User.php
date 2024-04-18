<?php

class User{
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

    //register user
    public function register($data){
        $this->db->query('INSERT INTO users (name, emp_id, email, password, contact_num, address, department, designation, status) VALUES(:name, :emp_id, :email, :password, :contact_num, :address, :department, :designation, :status)');
        //bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':emp_id', $data['emp_id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':contact_num', $data['contact_num']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':department', $data['department']);
        $this->db->bind(':designation', $data['designation']);
        $this->db->bind(':status', 'pending');

        //execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //login user
    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password) ){
            return $row;
        } else {
            return false;
        }
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

    public function getDriverById($id){
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

    public function getEmployees(){
        $this->db->query('SELECT * FROM users WHERE designation = "employee"');

        $results = $this->db->resultSet();

        return $results;
    }

    public function updatestatus($id, $status){
        $this->db->query('UPDATE users SET status = :status WHERE id = :id');
        
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
    
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteEmployee($id){
        $this->db->query('DELETE FROM users WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
    
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getDrivers(){
        $this->db->query('SELECT * FROM users WHERE designation = "driver"');

        $results = $this->db->resultSet();

        return $results;
    }

    public function updatedriverStatus($id, $status){
        $this->db->query('UPDATE users SET status = :status WHERE id = :id');
        
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
    
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteDriver($id){
        $this->db->query('DELETE FROM users WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
    
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}