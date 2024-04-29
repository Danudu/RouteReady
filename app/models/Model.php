<?php



class Model
{
    private $connection;
    private $db;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    // public function getTimetable($day, $timeSlot)
    // {
    //     $sql = "SELECT * FROM timetable WHERE day = '$day' AND time_slot = '$timeSlot'";
    //     $result = mysqli_query($this->connection, $sql);

    //     if (!$result) {
    //         die("Query failed: " . mysqli_error($this->connection));
    //     }

    //     if (mysqli_num_rows($result) > 0) {
    //         $timetable = [];
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $timetable[] = $row;
    //         }
    //         mysqli_free_result($result);
    //         return $timetable;
    //     } else {
    //         return null;
    //     }
    // }

    public function get_Timetable($day, $slot) {
       
        $timeSlots = array(
            "6:00AM-8:00AM"=>"6:00 AM - 8:00 AM",
            "8:00AM-10:00AM"=>"8:00 AM - 10:00 AM",
            "10:00AM-12:00NOON"=>"10:00 AM - 12:00 NOON",
            "12:00NOON-2:00PM"=>"12:00 NOON - 2:00 PM",
            "2:00PM-4:00PM"=>"2:00 PM - 4:00 PM",
            "4:00PM-6:00PM"=> "4:00 PM - 6:00 PM",
            "6:00PM-8:00PM"=>"6:00 PM - 8:00 PM",
            "8:00PM-10:00PM"=>"8:00 PM - 10:00 PM",
            "10:00PM-12:00PM"=>"10:00 PM - 12:00 PM"
        );
        // echo ($day);
        // echo ($slot);
        $this->db->query("SELECT * FROM timetable WHERE day = :day AND time_slot = :slot");
        // Bind values
        $this->db->bind(':day', $day);
        $this->db->bind(':slot', $timeSlots[$slot]);
        // echo();
    
        // Execute
        if($this->db->execute()){
            $results = $this->db->resultSet();
            // print_r ($results);
            return $results;
        } else {
            return false;
        }
    }
}
