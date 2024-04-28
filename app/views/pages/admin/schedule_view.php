<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable View</title>
    <style>
        body {
            background-image: url(http://localhost:8888/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            text-decoration-color: white;
            /* backdrop-filter: blur(10px) brightness(0.5); */
        }

        .btn-delete i {
            font-size: 1.5em;
            /* Increase the size of the delete icon */
            background-color: transparent;
            /* Remove background color */
            border: none;
            /* Remove border */
            cursor: pointer;
            /* Set cursor to pointer */
        }

        .container {
            margin: 0 auto;
            padding: 20px;
            color: white;
        }

        .wrapper {
            backdrop-filter: blur(5px);
            background-color: rgb(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: 30px;
        }

        h2,h3{
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid var(--primary-color-extra-light);
        }

        th {
            background-color: var(--primary-color);
        }

        tbody tr:hover {
            background-color: var(--primary-color-extra-light);
        }

        .button {
            width: 300px;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
        }

        .button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }
    </style>
</head>
<body>
<div class="main-content">
        <div class="wrapper">
            <div class="container">
    <h2 style="text-decoration: underline">Timetable View</h2>
    <h3>More Details About Reservations </h3>

  <table class="table">
  <thead>
        <tr>
       
            <th>Day</th>
            <th>Time Slot</th>
            <th>Activity</th>
            <th>Driver ID</th>
            <th>Vehicle ID</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['timetable'])): ?>
           
            <?php foreach ($data['timetable'] as $row): ?>
                
                <tr>
                    <td><?php echo $row->day; ?></td>
                    <td><?php echo $row->time_slot; ?></td>
                    <td><?php echo $row->activity; ?></td>
                    <td><?php echo $row->driver_id; ?></td>
                    <td><?php echo $row->vehicle_id; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No details available</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
        </div>
     </div>
 </div>
</body>
</html>
