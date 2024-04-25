<?php

class DriverTimeTableModel {
    private $connection;

    public function __construct() {
        $this->connection = new Database;
    }

    public function getDriverTimetable($driverId) {
        $sql = "SELECT * FROM timetable WHERE driver_id = :driver_id";
        $this->connection->query($sql);
        $this->connection->bind(":driver_id", $driverId);
        $result = $this->connection->resultSet();
        // Return the result
        return $result;
    }
}

?>
