<?php


class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getBooking()
    {
        $this->db->query("SELECT * FROM fullday_timetable ORDER BY b_date");

        return $this->db->resultSet();
    }

    public function addbooking($data)
    {

        $this->db->query('INSERT INTO fullday_timetable (b_date,location,no_pas,driver_id,vehicle_id) VALUES(:b_date,:location,:no_pas,:driver_id,:vehicle_id)');
        // Bind values
        $this->db->bind(':b_date', $data['b_date']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':no_pas', $data['no_pas']);
        $this->db->bind(':driver_id', $data['driver_id']);
        $this->db->bind(':vehicle_id', $data['vehicle_id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function get_Timetable($day, $slot)
    {

        $timeSlots = array(
            "6:00AM-8:00AM" => "6:00 AM - 8:00 AM",
            "8:00AM-10:00AM" => "8:00 AM - 10:00 AM",
            "10:00AM-12:00NOON" => "10:00 AM - 12:00 NOON",
            "12:00NOON-2:00PM" => "12:00 NOON - 2:00 PM",
            "2:00PM-4:00PM" => "2:00 PM - 4:00 PM",
            "4:00PM-6:00PM" => "4:00 PM - 6:00 PM",
            "6:00PM-8:00PM" => "6:00 PM - 8:00 PM",
            "8:00PM-10:00PM" => "8:00 PM - 10:00 PM",
            "10:00PM-12:00PM" => "10:00 PM - 12:00 PM"
        );

        $this->db->query("SELECT * FROM timetable WHERE day = :day AND time_slot = :slot");
        $this->db->bind(':day', $day);
        // Corrected the slot mapping
        $this->db->bind(':slot', $timeSlots[$slot]); // Use the mapped slot from $timeSlots array

        // Execute
        if ($this->db->execute()) {
            $results = $this->db->resultSet();
            return $results;
        } else {
            return false;
        }
    }


}