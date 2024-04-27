<?php

class BankModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Add bank details to the database
    public function addBankDetails($data) {
        // Prepare query
        $this->db->query('INSERT INTO bank (driver_id, account_number, bank_name, branch_name, holder_name) VALUES (:driver_id, :account_number, :bank_name, :branch_name, :holder_name)');

        // Bind values
        $this->db->bind(':driver_id', $data['driver_id']);
        $this->db->bind(':account_number', $data['accountNo']);
        $this->db->bind(':bank_name', $data['bankName']);
        $this->db->bind(':branch_name', $data['branchName']);
        $this->db->bind(':holder_name', $data['holdersName']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
