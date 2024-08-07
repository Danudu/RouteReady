<?php
class Vehicle {
    // Define properties
    private $db;
    private $result;
   
   
  

    public function __construct()
    {
        $this->db = new Database;
        
        
    }

    // Example method for saving to a database
    public function addVehicle($data) {
        try {
            

            // Prepare query
            $this->db->query('INSERT INTO VehicleDetails (Registration_Number, Vehicle_Number, Vehicle_Name, Vehicle_Year, model, r_year, vin, insu_pro, insu_pn, capacity) VALUES (:reg_no, :v_no, :name, :year, :model, :r_year, :vin, :insu_pro, :insu_pn, :capacity)');

            // Bind parameters
            $capacity = intval($data['passenger_capacity']);
            $this->db->bind(':reg_no', $data['registration_number']);
            $this->db->bind(':v_no', $data['vehicle_number']);
            $this->db->bind(':name', $data['vehicle_type']);
            $this->db->bind(':year', $data['manufacture_year']);
            $this->db->bind(':model', $data['vehicle_model']);
            $this->db->bind(':r_year', $data['registration_year']);
            $this->db->bind(':vin', $data['vin_number']);
            $this->db->bind(':insu_pro', $data['insurance_company']);
            $this->db->bind(':insu_pn', $data['insurance_number']);
            $this->db->bind(':capacity', $capacity); // Use the converted integer value
   

            // Execute query
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
  
    public function getVehicleDetails() {
        try {
            $this->db->query("SELECT Registration_Number, Vehicle_Number, Vehicle_Name, capacity FROM VehicleDetails");
            $this->db->execute();
            $results = $this->db->resultSet();
            // Debugging: Check if results are fetched
           
            return $results;
        } catch (Exception $e) {
            // Error handling: Log or handle the exception appropriately
            return []; // Return empty array or handle error as needed
        }
    }
    
    
    public function get_vehicle_details($reg_no){
        $this->db->query('SELECT * FROM VehicleDetails WHERE Registration_Number = :reg_no');
        $this->db->bind(':reg_no', $reg_no);
    
        $row = $this->db->single();
    
        return $row;
    }

    public function getVehicleDetailsByRegNumber($regNumber)
    {
        $this->db->query('SELECT * FROM VehicleDetails WHERE Registration_Number = :regNumber');
        $this->db->bind(':regNumber', $regNumber);
        return $this->db->single();
    }

    
    
    public function editVehicle($data)
{
    try {
        // Prepare query
        $this->db->query('UPDATE VehicleDetails SET Vehicle_Number = :v_no, Vehicle_Name = :name, Vehicle_Year = :year, model = :model, r_year = :r_year, vin = :vin, insu_pro = :insu_pro, insu_pn = :insu_pn, capacity = :capacity WHERE Registration_Number = :reg_no');

        // Bind parameters
        $this->db->bind(':reg_no', $data['registration_number']);
        $this->db->bind(':v_no', $data['vehicle_number']);
        $this->db->bind(':name', $data['vehicle_type']);
        $this->db->bind(':year', $data['manufacture_year']);
        $this->db->bind(':model', $data['vehicle_model']);
        $this->db->bind(':r_year', $data['registration_year']);
        $this->db->bind(':vin', $data['vin_number']);
        $this->db->bind(':insu_pro', $data['insurance_company']);
        $this->db->bind(':insu_pn', $data['insurance_number']);
        $this->db->bind(':capacity', $data['passenger_capacity']); // Use the converted integer value

        // Execute query
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

    public function deleteVehicle($reg_no) {
        try {
            // Prepare query
            $this->db->query('DELETE FROM VehicleDetails WHERE Registration_Number = :reg_no');
    
            // Bind parameters
            $this->db->bind(':reg_no', $reg_no);
    
            // Execute query
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
    

    public function getCustomColumnNames() {
        // Customize column names as needed
        $custom_column_names = array(
            "Registration_Number" => "Registration Number",
            "Vehicle_Number" => "Vehicle Number",
            "Vehicle_Name" => "Vehicle Type",
            "capacity" => "Capacity",
            "Vehicle_Type" => "Vehicle_type",
            "model" => "Model",
            "r_year" => "Registration Year",
            "vin" => "VIN",
            "year" => "Manufacture Year",
            "insu_pro" => "Insurance Provider",
            "insu_pn" => "Insurance Number"
            // Add more column names as needed
        );
    
        return $custom_column_names;
    }
    
    
        public function getBookedDays() {
            $this->db->query( $sql = "SELECT vd.Vehicle_Name, vd.capacity, t1.date AS booked_date
                    FROM VehicleDetails vd
                    LEFT JOIN (
                        SELECT vehicle_id, date FROM timetable WHERE date >= CURDATE()
                    ) AS t1 ON vd.Vehicle_Number = t1.vehicle_id
                    LEFT JOIN (
                        SELECT vehicle_id, b_date AS date FROM fullday_timetable WHERE b_date >= CURDATE()
                    ) AS t2 ON vd.Vehicle_Number = t2.vehicle_id");
    
            
            $this->db->query($sql);
            $this->db->execute();
            $results = $this->db->resultSet();
    
            if (!$results) {
                die("Query failed: " );
            }
    
            $booked_days = [];
            while ($row = mysqli_fetch_assoc($results)) {
                $vehicleName = $row['Vehicle_Name'];
                $capacity = $row['capacity'];
                $booked_days[$vehicleName][$capacity][] = date('l', strtotime($row['booked_date']));
            }
    
            mysqli_free_result($results);
            return $booked_days;
        }

        public function getAvailableVehicles($date) {
            // Prepare the SQL query to select vehicles not booked on the given date
            $sql = "SELECT vd.Registration_Number, vd.Vehicle_Number, vd.Vehicle_Name, vd.capacity
                    FROM vehicledetails vd
                    LEFT JOIN fullday_timetable ft ON vd.Vehicle_Number = ft.vehicle_id AND ft.b_date = :date
                    LEFT JOIN timetable t ON vd.Vehicle_Number = t.vehicle_id AND t.date = :date
                    WHERE ft.vehicle_id IS NULL AND t.vehicle_id IS NULL";
        
            // Bind the date parameter to the query
            $this->db->query($sql);
            $this->db->bind(':date', $date);
            

            // Execute the query
            $this->db->execute();
        
            // Fetch the result set
            $results = $this->db->resultSet();
        
            // Return the result set
            return $results;
        }
       
    }
    
    
       

    
    

    
    
    
      
      
    
    

 
   
    
   
    





