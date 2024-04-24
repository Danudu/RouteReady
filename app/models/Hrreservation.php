<?php

class Hrreservation
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Method to add HR Manager
    public function addHrManager($data)
    {
        // Prepare SQL query to insert HR Manager details into database
        $this->db->query('INSERT INTO Hr_reg (e_no, e_name, nic, position, b_date, email) VALUES (:employee_number, :employee_name, :nic_number, :position, :birth_date, :email)');
        
        // Bind parameters
        $this->db->bind(':employee_name', $data['e_name']);
        $this->db->bind(':employee_number', $data['e_no']);
        $this->db->bind(':nic_number', $data['nic']);
        $this->db->bind(':position', $data['position']);
        $this->db->bind(':birth_date', $data['date']);
        $this->db->bind(':email', $data['email']);
        
        // Execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}
