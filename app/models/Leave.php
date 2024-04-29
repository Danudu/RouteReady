<?php
// Inside your DriverModel class

class Leave {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllLeaveApplications() {

        $this->db->query('SELECT * FROM leaves');

        return $this->db->resultSet();

    }
    public function updateLeaveStatus($leaveId, $action) {
        // Determine the status based on the action
        $status = ($action === 'approve') ? '1' : '2'; // Status as varchar values
    
        // Update status in the database
        $this->db->query('UPDATE leaves SET status = :status WHERE leave_id = :id'); // Use leave_id instead of id
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $leaveId);
    
        // Execute the query
        $result = $this->db->execute();
        return $result;
    }
    
    
}

