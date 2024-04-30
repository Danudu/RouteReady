<?php
// Schedule.php

class Schedule {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertSchedule($data) {
        $date = $data['date'];
        $day = $data['day'];
        $time_slot = $data['time_slot'];
        $activity = $data['activity'];
        $driver_id = $data['driver_id'];
        $vehicle_id = $data['vehicle_id'];

        $sql = "INSERT INTO timetable (date, day, time_slot, activity, driver_id, vehicle_id) 
                VALUES (:date, :day, :time_slot, :activity, :driver_id, :vehicle_id)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':day', $day);
        $stmt->bindParam(':time_slot', $time_slot);
        $stmt->bindParam(':activity', $activity);
        $stmt->bindParam(':driver_id', $driver_id);
        $stmt->bindParam(':vehicle_id', $vehicle_id);

        return $stmt->execute();
    }

    public function getAvailableVehicles() {
        $sql = "SELECT vd.Vehicle_Number, vd.Vehicle_Name, vd.capacity, 
                    t1.date AS booked_date
                FROM VehicleDetails vd
                LEFT JOIN (
                    SELECT vehicle_id, date FROM timetable WHERE date >= CURDATE()
                ) AS t1 ON vd.Vehicle_Number = t1.vehicle_id
                LEFT JOIN (
                    SELECT vehicle_id, b_date AS date FROM fullday_timetable WHERE b_date >= CURDATE()
                ) AS t2 ON vd.Vehicle_Number = t2.vehicle_id";

        $query = $this->db->query($sql);

        $booked_days = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $vehicleNumber = $row['Vehicle_Number'];
            $booked_days[$vehicleNumber][] = date('l', strtotime($row['booked_date']));
        }

        return $booked_days;
    }
    public function getFullDayBookings($date) {
        $this->db->query("SELECT * FROM fullday_timetable WHERE b_date = :date");
        $this->db->bind(':date', $date);
        return $this->db->resultSet();
    }

    public function getTimetableDetails($date) {
        $this->db->query("SELECT * FROM timetable WHERE b_date = :date");
        $this->db->bind(':date', $date);
        return $this->db->resultSet();
    }
}