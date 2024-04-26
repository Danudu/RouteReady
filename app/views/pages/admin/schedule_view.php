<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable View</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Timetable View</h2>
    <h3>Details for Time Slot: <?php echo $timeSlot; ?>, Day: <?php echo $day; ?></h3>

    <table>
        <tr>
            <th>Day</th>
            <th>Time Slot</th>
            <th>Activity</th>
            <th>Driver ID</th>
            <th>Vehicle ID</th>
        </tr>

        <?php if (!empty($timetable)): ?>
            <?php foreach ($timetable as $row): ?>
                <tr>
                    <td><?php echo $row['day']; ?></td>
                    <td><?php echo $row['time_slot']; ?></td>
                    <td><?php echo $row['activity']; ?></td>
                    <td><?php echo $row['driver_id']; ?></td>
                    <td><?php echo $row['vehicle_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No details available</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>
