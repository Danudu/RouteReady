<?php
$timetable = $data['timetable'][0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Timetable</title>
   
    <style>
      
    </style>
</head>
<body>
    <h1>Driver Timetable</h1>
    <table border="1">
        <tr>
            <th>Date</th>
            <th>Day</th>
            <th>Time Slot</th>
            <th>Activity</th>
            <th>Driver ID</th>
            <th>Vehicle ID</th>
        </tr>
            <tr>
                <td><?php echo $timetable->date ?></td>
                <td><?php echo $timetable->day?></td>
                <td><?php echo $timetable->timeslot?></td>
                <td><?php echo $timetable->activity?></td>
                <td><?php echo $timetable->driver_id?></td>
                <td><?php echo $timetable->vehicle_id?></td>
            </tr>
    </table>
</body>
</html>
