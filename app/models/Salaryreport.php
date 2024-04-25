<?php
// Salaryreport.php

class SalaryReport {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getSalaryData($driver_id) {
        $driver_id = $this->db->real_escape_string($driver_id);
        $sql = "SELECT * FROM staff_salary_payment WHERE driver_id = '$driver_id'";
        $result = $this->db->query($sql);
        return ($result->num_rows > 0) ? $result->fetch_assoc() : false;
    }

    public function getBankData($driver_id) {
        $driver_id = $this->db->real_escape_string($driver_id);
        $sql = "SELECT * FROM bank WHERE driver_id = '$driver_id'";
        $result = $this->db->query($sql);
        return ($result->num_rows > 0) ? $result->fetch_assoc() : false;
    }
}

