<?php
// Schedule.php

class Schedule {
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $database = 'routeready_db';

        $this->db = mysqli_connect($hostname, $username, $password, $database);

        // Check if the connection was successful
        if (!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function insertSchedule($data) {
        $date = $this->db->real_escape_string($data['date']);
        $day = $this->db->real_escape_string($data['day']);
        $time_slot = $this->db->real_escape_string($data['time_slot']);
        $activity = $this->db->real_escape_string($data['activity']);
        $driver_id = $this->db->real_escape_string($data['driver_id']);
        $vehicle_id = $this->db->real_escape_string($data['vehicle_id']);

        $sql = "INSERT INTO timetable (date, day, time_slot, activity, driver_id, vehicle_id) 
                VALUES ('$date', '$day', '$time_slot', '$activity', '$driver_id', '$vehicle_id')";

        return $this->db->query($sql);
    }
    


    

}



