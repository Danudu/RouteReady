<?php
// Inside your DriverModel class

class Leave
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllLeaveApplications()
    {
    
        $this->db->query('SELECT * FROM leaves');
    
        return $this->db->resultSet();
    
    }
    public function updateLeaveStatus($leaveId, $action)
    {
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
    



    public function submitLeaveApplication($user_id, $type, $medical_report, $std_date, $end_date, $no_of_days, $reason, )
    {
        $sql = "INSERT INTO leaves (user_id, type, medical_report, std_date, end_date, no_of_days, reason) 
                VALUES (:user_id, :type, :medical_report, :std_date, :end_date, :no_of_days, :reason)";

        // Prepare the statement
        $this->db->query($sql);

        // Bind parameters
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':type', $type);
        $this->db->bind(':medical_report', $medical_report);
        $this->db->bind(':std_date', $std_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':no_of_days', $no_of_days);
        $this->db->bind(':reason', $reason);

        // Execute the query
        return $this->db->execute();
    }




    public function getDriverSalaryReport()
    {
        $sql = 'SELECT * FROM staff_salary_payment';

        $this->db->query($sql);

        $result = $this->db->resultSet();

        return $result;
    }

    public function getBankDetails($driver_id)
    {
        $sql = 'SELECT * FROM bank WHERE driver_id: driver_id';

        $this->db->query($sql);
        $this->db->bind(':driver', $driver_id, );

        $result = $this->db->resultSet();
        return $result;

    }





    public function getAppliedLeaves($userId)
    {
        $this->db->query('SELECT * FROM leaves WHERE user_id = :user_id AND status = 0;');
        $this->db->bind(':user_id', $userId);
        return $this->db->resultSet();
    }
    public function getLeaveCountByLeaveType($user_id, $leaveType)
    {
        $this->db->query('SELECT COUNT(*) as count FROM leaves WHERE user_id = :user_id AND type = :leaveType');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':leaveType', $leaveType);
        $result = $this->db->single();
        return $result->count;



    }


    public function updateLeaveApplication($leave_id, $type, $std_date, $end_date, $no_of_days, $reason, $status)
    {
        $sql = "UPDATE leaves SET type = :type, std_date = :std_date, end_date = :end_date, no_of_days = :no_of_days, reason = :reason, status = :status WHERE leave_id = :leave_id";

        // Prepare the statement
        $this->db->query($sql);

        // Bind parameters
        $this->db->bind(':leave_id', $leave_id);
        $this->db->bind(':type', $type);
        $this->db->bind(':std_date', $std_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':no_of_days', $no_of_days);
        $this->db->bind(':reason', $reason);
        $this->db->bind(':status', $status);

        // Execute the query
        return $this->db->execute();
    }

    public function deleteLeaveApplication($leave_id)
    {
        $sql = "DELETE FROM leaves WHERE leave_id = :leave_id";

        // Prepare the statement
        $this->db->query($sql);

        // Bind parameter
        $this->db->bind(':leave_id', $leave_id);

        // Execute the query
        return $this->db->execute();
    }

    public function getLeaveById($id)
    {
        $sql = "SELECT * FROM leaves WHERE leave_id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        // Execute the query
        $this->db->execute();

        // Fetch a single result
        return $this->db->single();
    }


}






