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

    // public function getDrivers() {
    //     $this->db->query("SELECT *,
    //                             drivers.id as postId,
    //                             users.id as userId,
    //                             drivers.date as postCreated,
    //                             users.date as userCreated
    //                         FROM drivers
    //                         INNER JOIN users
    //                         ON drivers.user_id = users.id
    //                         ORDER BY drivers.date DESC");
    
    //     return $this->db->resultSet();
    //}
    // public function getDriverById($id){
    //     $this->db->query('SELECT * FROM outsource_drivers AND users WHERE id = :id');
    //     $this->db->bind(':id', $id);
    
    //     $row = $this->db->single();
    
    //     return $row;
    // }
    public function getDriverByUserId($id){
        $this->db->query('SELECT * FROM user WHERE user_id = :user_id AND designation="driver"AND status="approved";');
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

   
}