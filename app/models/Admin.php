<?php
// Inside your DriverModel class

class Admin {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getbooking() {
        $this->db->query("SELECT *
                                
                            FROM fullday_timetable
                            
                            ORDER BY b_date");
    
        return $this->db->resultSet();
    }
    
    
    public function addbooking($data){

        $this->db->query('INSERT INTO fullday_timetable (b_date,location,no_pas,driver_id,vehicle_id) VALUES(:b_date,:location,:no_pas,:driver_id,:vehicle_id)');
         // Bind values
        $this->db->bind(':b_date', $data['b_date']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':no_pas', $data['no_pas']);
        $this->db->bind(':driver_id', $data['driver_id']);
        $this->db->bind(':vehicle_id', $data['vehicle_id']);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data){
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
    
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
    
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
 
    public function get_timetable($day, $timeSlot) {
        // Build the SQL query
        $sql = "SELECT *
                FROM timetable
                WHERE day = ? AND time_slot = ?
                ORDER BY b_date";
    
        // Execute the query with parameters
        $query = $this->db->query($sql, array($day, $timeSlot));
    
        // Check for query execution error
        if (!$query) {
            // Query execution failed, return false
            return false;
        }
    
        // Check if there are any rows returned
        if ($query->num_rows() > 0) {
            return $query->getResultArray(); // Return an array of rows
        } else {
            return false; // No rows found
        }
    }
    
     
    
}