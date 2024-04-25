<?php
class Leave {
    private $db;

    public function __construct() 
    {

        $this->db = new Database;
    }

    public function submitLeaveApplication($driver_id, $type, $std_date, $end_date, $no_of_days, $reason) {
        $sql = "INSERT INTO leaves (driver_id, type, std_date, end_date, no_of_days, reason) 
                VALUES (:driver_id, :type, :std_date, :end_date, :no_of_days, :reason)";
        
        // Prepare the statement
        $this->db->query($sql);
    
        // Bind parameters
        $this->db->bind(':driver_id', $driver_id);
        $this->db->bind(':type', $type);
        $this->db->bind(':std_date', $std_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':no_of_days', $no_of_days);
        $this->db->bind(':reason', $reason);
    
        // Execute the query
        return $this->db->execute();
    }

    
    
    
}
?>
