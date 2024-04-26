<?php



class Model {
    private $connection;
    
    public function __construct($connection) {
        $this->connection = $connection;
    }
    
    public function getTimetable($day, $timeSlot) {
        $sql = "SELECT * FROM timetable WHERE day = '$day' AND time_slot = '$timeSlot'";
        $result = mysqli_query($this->connection, $sql);
    
        if (!$result) {
            die("Query failed: " . mysqli_error($this->connection));
        }

        if (mysqli_num_rows($result) > 0) {
            $timetable = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $timetable[] = $row;
            }
            mysqli_free_result($result);
            return $timetable;
        } else {
            return null;
        }
    }
}

