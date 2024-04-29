<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Vehicles</title>
</head>
<body>
    <h1>Available Vehicles</h1>
    <table>
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Vehicle Name</th>
                <th>Vehicle Number</th>
                <th>Capacity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['availableVehicles'] as $vehicle): ?>
                <tr>
                    <td><?php echo $vehicle->Registration_Number; ?></td>
                    <td><?php echo $vehicle->Vehicle_Name; ?></td>
                    <td><?php echo $vehicle->Vehicle_Number; ?></td>
                    <td><?php echo $vehicle->capacity; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- back button -->
    <a href="<?php echo URLROOT; ?>/admins/redirectToTimetable" class="button">Back</a>
</body>
</html>