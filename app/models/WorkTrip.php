<?php
class WorkTrip {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // WorkTrip

    public function addWorkTrip($data) {
        try {
            $this->db->query('INSERT INTO work_trips (employee_name, email, reason, numofPassengers, destination, comments, tripDate, tripTime, id, status) VALUES (:employee_name, :email, :reason, :numofPassengers, :destination, :comments, :tripDate, :tripTime, :id, :status)');
            $this->db->bind(':employee_name', $data['employee_name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':reason', $data['reason']);
            $this->db->bind(':numofPassengers', $data['numofPassengers']);
            $this->db->bind(':destination', $data['destination']);
            $this->db->bind(':comments', $data['comments']);
            $this->db->bind(':tripDate', $data['tripDate']);
            $this->db->bind(':tripTime', $data['tripTime']);
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':status', 'pending'); // Set status to pending
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Log or display the error
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    public function getPendingWorkTripReservations() {
        $this->db->query("SELECT * FROM work_trips WHERE status = 'pending'");
        return $this->db->resultSet();
    }
    
    // Other methods remain unchanged
    
public function getWorkTripReservations($user_id) {
    
        $this->db->query("SELECT * FROM work_trips WHERE id = :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    
}

public function deleteWorkTripReservation($tripID) {
    $this->db->query('DELETE FROM work_trips WHERE tripID = :tripID');
    $this->db->bind(':tripID', $tripID);
    
    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}

public function getWorkTripReservationById($tripID, $user_id) {
    $this->db->query("SELECT * FROM work_trips WHERE tripID = :tripID AND id = :user_id");
    $this->db->bind(':tripID', $tripID);
    $this->db->bind(':user_id', $user_id);
    return $this->db->single();
}

public function updateWorkTripReservation($data) {
    try {
        $this->db->query('UPDATE work_trips SET employee_name = :employee_name, email = :email, reason = :reason, numofPassengers = :numofPassengers, destination = :destination, comments = :comments, tripDate = :tripDate, tripTime = :tripTime WHERE tripID = :tripID');
        $this->db->bind(':employee_name', $data['employee_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':reason', $data['reason']);
        $this->db->bind(':numofPassengers', $data['numofPassengers']);
        $this->db->bind(':destination', $data['destination']);
        $this->db->bind(':comments', $data['comments']);
        $this->db->bind(':tripDate', $data['tripDate']);
        $this->db->bind(':tripTime', $data['tripTime']);
        $this->db->bind(':tripID', $data['tripID']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        // Log or display the error
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}



public function updateStatus($tripID, $status)
{
    try {
        $this->db->query('UPDATE work_trips SET status = :status WHERE tripID = :tripID');
        $this->db->bind(':status', $status);
        $this->db->bind(':tripID', $tripID);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        // Log or display the error
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}


}

?>