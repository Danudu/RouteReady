<?php
class ReservationModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to count daily reservations for a given route and date
    public function countDailyReservations($scheduleType, $route, $date) {
        $this->db->query("SELECT COUNT(*) AS count FROM TransportReservation WHERE ScheduleType = :scheduleType AND Route = :route AND Date = :date");
        $this->db->bind(':scheduleType', $scheduleType);
        $this->db->bind(':route', $route);
        $this->db->bind(':date', $date);
        $count = $this->db->single()->count;
        return $count;
    }
}
