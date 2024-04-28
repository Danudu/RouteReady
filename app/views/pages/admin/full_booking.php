<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Day Timetable</title>
    <style>
        body {
            background-image: url(http://localhost:8888/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        h1 {
            text-align: center;
            color: white;
            margin-top: 20px;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            border-radius: 12px;
            color: white;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid var(--primary-color-extra-light);
            text-align: left;
        }

        th {
            background-color: var(--primary-color);
            font-weight: bold;
        }

        tbody tr:hover {
            background-color: var(--primary-color-extra-light);
        }
    </style>
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
            <?php foreach ($data['timetableData'] as $item): ?>
                <tr>
                    <td><?php echo $item->b_date; ?></td>
                    <td><?php echo $item->location; ?></td>
                    <td><?php echo $item->no_pas; ?></td>
                    <td><?php echo $item->driver_id; ?></td>
                    <td><?php echo $item->vehicle_id; ?></td>
                    <!-- Add other table data cells as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
