<?php
class BankDetailsModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addBankDetails($driver_id, $accountNo, $bankName, $branchName, $holdersName) {
        $sql = "INSERT INTO bank_details (driver_id, accountNo, bankName, branchName, holdersName) 
                VALUES ('$driver_id', '$accountNo', '$bankName', '$branchName', '$holdersName')";
        $this->db->query($sql);
   
    // Execute the query
    return $this->db->execute();
    }



}

?>
