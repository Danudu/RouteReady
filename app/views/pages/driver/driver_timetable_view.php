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
        <?php foreach ($timetable as $row): ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['day']; ?></td>
                <td><?php echo $row['time_slot']; ?></td>
                <td><?php echo $row['activity']; ?></td>
                <td><?php echo $row['driver_id']; ?></td>
                <td><?php echo $row['vehicle_id']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
