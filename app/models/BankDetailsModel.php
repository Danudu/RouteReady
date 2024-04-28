<?php
class BankDetailsModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addBankDetails($driver_id, $accountNo, $bankName, $branchName, $holdersName) {
        $sql = "INSERT INTO bank (driver_id, accountNo, bankName, branchName, holdersName) 
                VALUES (:driver_id, :accountNo, :bankName, :branchName, :holdersName)";
        $this->db->query($sql);
        $this->db->bind(':driver_id', $driver_id);
        $this->db->bind(':accountNo', $accountNo);
        $this->db->bind(':bankName', $bankName);
        $this->db->bind(':branchName', $branchName);
        $this->db->bind(':holdersName', $holdersName);
        
        // Execute the query
        return $this->db->execute();
    }
    

    public function editBankDetails($driver_id, $accountNo, $bankName, $branchName, $holderName) {
        $sql = "UPDATE bank SET 
        driver_id = :driver_id;
        accountNo = :accountNo;
        bankName = :bankName;
        branchName = :branchName;
        holderName = :holderName;
        ";

        $this->db->bind(":driver_id", $driver_id);
        $this->db->bind(":accountNo", $accountNo);
        $this->db->bind(":bankName", $bankName);
        $this->db->bind(":branchName", $branchName);
        $this->db->bind(":holderName", $holderName);

        $this->db->query($sql);

        return $this->db->execute();

    }
}

?>
