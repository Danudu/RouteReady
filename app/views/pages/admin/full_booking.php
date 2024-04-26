<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Day Timetable</title>
</head>
<body>
    <h1>Full Day Timetable</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Location</th>
                <th>No of Passengers</th>
                <th>Driver ID</th>
                <th>Vehicle ID</th>
                <!-- Add other table headers as needed -->
            </tr>
        </thead>
        <tbody>
        <?php foreach ($timetableData  as $item): ?>

    <tr>
        <td>{{ $item->b_date }}</td>
        <td>{{ $item->location }}</td>
        <td>{{ $item->no_pas }}</td>
        <td>{{ $item->driver_id }}</td>
        <td>{{ $item->vehicle_id}}</td>
    </tr>
<?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>
