<?php
class Leave {
    private $db;

    public function __construct() 
    {

        $this->db = new Database;
    }

   
    public function submitLeaveApplication($driver_id, $type, $medical_report, $std_date, $end_date, $no_of_days, $reason,) {
        $sql = "INSERT INTO leaves (driver_id, type, medical_report, std_date, end_date, no_of_days, reason) 
                VALUES (:driver_id, :type, :medical_report, :std_date, :end_date, :no_of_days, :reason)";
        
        // Prepare the statement
        $this->db->query($sql);
    
        // Bind parameters
        $this->db->bind(':driver_id', $driver_id);
        $this->db->bind(':type', $type);
        $this->db->bind(':medical_report', $medical_report);
        $this->db->bind(':std_date', $std_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':no_of_days', $no_of_days);
        $this->db->bind(':reason', $reason);
    
        // Execute the query
        return $this->db->execute();
    }
    
    public function getLeaveCount($user_id) {
        $sql = 'SELECT 
                    SUM(CASE WHEN type = "sick" THEN 1 ELSE 0 END) AS sick_leave_count,
                    SUM(CASE WHEN type = "personal" THEN 1 ELSE 0 END) AS personal_leave_count,
                    SUM(CASE WHEN type = "other" THEN 1 ELSE 0 END) AS other_leave_count
                FROM leaves
                WHERE driver_id = :user_id';
    
        // Prepare the SQL statement
        $this->db->query($sql);
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
    
        // Execute the SQL statement
        $result = $this->db->resultSet();
    
        
    
       
    
        // Return the result
        return $result;
    }


    public function getDriverSalaryReport(){
        $sql = 'SELECT * FROM salary_report';

        $this->db->query($sql);
        
        $result = $this->db->resultSet();

        return $result;
    }

    public function getBankDetails($driver_id){
        $sql = 'SELECT * FROM bank_details WHERE driver_id: driver_id';

        $this->db->query($sql);
        $this->db->bind(':driver', $driver_id,);

       $result = $this->db->resultSet();
       return $result;

    }
    
    
    
    
}
?>
