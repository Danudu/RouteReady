<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable View</title>
    <style>
        /* CSS styles */
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: black;
            color: white;
        }

        h2, h3 {
            text-align: center;
            text-decoration: underline;
        }

        td[colspan="5"] {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- HTML content for the timetable view -->
    <h2>Timetable View</h2>
    <h3>Details for Time Slot: <?php echo $_GET['time_slot']; ?>, Day: <?php echo $_GET['day']; ?></h3>

    <table>
        <tr>
            <th>Day</th>
            <th>Time Slot</th>
            <th>Activity</th>
            <th>Driver ID</th>
            <th>Vehicle ID</th>
        </tr>

        <?php
        // Fetch timetable details
        require_once('Schedule.php');

        $day = $_GET['day'];
        $timeSlot = $_GET['time_slot'];

        // Create an instance of the Schedule class
        

        // Fetch timetable details from the model
        $result = $schedule->fetchTimetableDetailsFromModel($day, $timeSlot);

        // Check if result is valid
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['day']; ?></td>
            <td><?php echo $row['time_slot']; ?></td>
            <td><?php echo $row['activity']; ?></td>
            <td><?php echo $row['driver_id']; ?></td>
            <td><?php echo $row['vehicle_id']; ?></td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="5">No details available</td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
