<?php
class EmployeeReservation
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function makeReservation($data)
    {
        try {
            $this->db->query('INSERT INTO TransportReservation (ScheduleType, Route, Date, PickUp, DropOff, id) VALUES (:schedule, :route, :Date, :pickup, :dropoff, :id)');
            $this->db->bind(':schedule', $data['schedule']);
            $this->db->bind(':route', $data['route']);
            $this->db->bind(':Date', $data['Date']);
            $this->db->bind(':pickup', $data['pickup']);
            $this->db->bind(':dropoff', $data['dropoff']);
            $this->db->bind(':id', $data['id']);

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

    public function monthlyMakeReservation($data)
    {
        try {
            $this->db->query('INSERT INTO MonthlyReservation (ScheduleType, Route, StartDate, EndDate, PickUp, DropOff, id) VALUES (:schedule, :route, :StartDate, :EndDate, :pickup, :dropoff, :id)');
            $this->db->bind(':schedule', $data['schedule']);
            $this->db->bind(':route', $data['route']);
            $this->db->bind(':StartDate', $data['StartDate']);
            $this->db->bind(':EndDate', $data['EndDate']);
            $this->db->bind(':pickup', $data['pickup']);
            $this->db->bind(':dropoff', $data['dropoff']);
            $this->db->bind(':id', $data['id']);

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

    public function getDailyReservations($user_id)
    {
        $this->db->query("SELECT * FROM TransportReservation WHERE id = :user_id ");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    // Method to get monthly reservations for a user
    public function getMonthlyReservations($user_id)
    {
        $this->db->query("SELECT * FROM MonthlyReservation WHERE id = :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }


    public function deleteReservation($ReservationID)
    {
        try {
            $this->db->query('DELETE FROM TransportReservation WHERE ReservationID = :ReservationID');
            $this->db->bind(':ReservationID', $ReservationID);

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

    public function deleteMonthlyReservation($MReservationID)
    {
        try {
            $this->db->query('DELETE FROM MonthlyReservation WHERE MReservationID = :MReservationID');
            $this->db->bind(':MReservationID', $MReservationID);

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

    public function getDailyReservationById($ReservationID, $user_id)
    {
        $this->db->query("SELECT * FROM TransportReservation WHERE ReservationID = :ReservationID AND id = :user_id");
        $this->db->bind(':ReservationID', $ReservationID);
        $this->db->bind(':user_id', $user_id);
        return $this->db->single();
    }

    public function updateDailyReservation($data)
    {
        try {
            $this->db->query('UPDATE TransportReservation SET ScheduleType = :schedule, Route = :route, Date = :Date, PickUp = :pickup, DropOff = :dropoff WHERE ReservationID = :ReservationID');
            $this->db->bind(':schedule', $data['schedule']);
            $this->db->bind(':route', $data['route']);
            $this->db->bind(':Date', $data['Date']);
            $this->db->bind(':pickup', $data['pickup']);
            $this->db->bind(':dropoff', $data['dropoff']);
            $this->db->bind(':ReservationID', $data['ReservationID']);

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

    public function getMonthlyReservationById($MReservationID, $user_id)
    {
        $this->db->query("SELECT * FROM MonthlyReservation WHERE MReservationID = :MReservationID AND id = :user_id");
        $this->db->bind(':MReservationID', $MReservationID);
        $this->db->bind(':user_id', $user_id);
        return $this->db->single();
    }

    public function updateMonthlyReservation($data)
    {
        try {
            $this->db->query('UPDATE MonthlyReservation SET ScheduleType = :schedule, Route = :route, StartDate = :StartDate, EndDate = :EndDate, PickUp = :pickup, DropOff = :dropoff WHERE MReservationID = :MReservationID');
            $this->db->bind(':schedule', $data['schedule']);
            $this->db->bind(':route', $data['route']);
            $this->db->bind(':StartDate', $data['StartDate']);
            $this->db->bind(':EndDate', $data['EndDate']);
            $this->db->bind(':pickup', $data['pickup']);
            $this->db->bind(':dropoff', $data['dropoff']);
            $this->db->bind(':MReservationID', $data['MReservationID']);

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
    public function getMonthlyReservationCountByRouteAndDate($route, $date)
    {
        $this->db->query('SELECT COUNT(*) AS totalMonthly FROM MonthlyReservation WHERE route = :route AND :date BETWEEN StartDate AND EndDate');
        $this->db->bind(':route', $route);
        $this->db->bind(':date', $date);

        $row = $this->db->single();

        return $row->totalMonthly;
    }


    public function getDailyReservationCountByRouteAndDate($route, $date)
    {
        $this->db->query('SELECT COUNT(*) AS totalDaily FROM TransportReservation WHERE route = :route AND Date = :date');
        $this->db->bind(':route', $route);
        $this->db->bind(':date', $date);

        $row = $this->db->single();

        return $row->totalDaily;
    }

    // Inside EmployeeReservation.php model

    public function getTotalPaymentForMonthYear($user_id, $month, $year)
    {
        $this->db->query("SELECT COUNT(*) AS totalReservations FROM TransportReservation WHERE id = :user_id AND MONTH(Date) = :month AND YEAR(Date) = :year");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':month', $month);
        $this->db->bind(':year', $year);
        $totalReservations = $this->db->single()->totalReservations;
        return 400 * $totalReservations;
    }


    public function getReservationsForMonthYear($user_id, $month, $year)
    {
        $this->db->query("SELECT * FROM TransportReservation WHERE id = :user_id AND MONTH(Date) = :month AND YEAR(Date) = :year");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':month', $month);
        $this->db->bind(':year', $year);
        return $this->db->resultSet();
    }

    public function hasExistingReservation($user_id)
    {
        // Check if the user has made any daily or monthly reservations
        return $this->hasDailyReservation($user_id) || $this->hasMonthlyReservation($user_id);
    }

    public function hasDailyReservation($user_id)
    {
        // Query the database to check for daily reservations
        $this->db->query("SELECT COUNT(*) AS total FROM TransportReservation WHERE id = :user_id");
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();
        return $row->total > 0;
    }

    public function hasMonthlyReservation($user_id)
    {
        // Query the database to check for monthly reservations
        $this->db->query("SELECT COUNT(*) AS total FROM MonthlyReservation WHERE id = :user_id");
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();
        return $row->total > 0;
    }


}
