<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Applied Leaves</title>
    <style>
        body {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: fill;
            color:white;
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
        }

        .wrapper {
            backdrop-filter: blur(5px);
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: 30px;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border: 2px;
            margin-bottom: 20px;
            border-collapse: collapse;
            border: 2px solid white;
            
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid var(--primary-color-extra-light);
            border: 1px solid white;
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
    <div class="container">
        <h2>Applied Leaves</h2>
    </br>
        <table class="table">
            <thead>
                <tr>
                    <th>Leave ID</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Number of Days</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['appliedLeaves'] as $leave) : ?>
                    <tr>
                        <td><?php echo $leave->leave_id; ?></td>
                        <td><?php echo $leave->type; ?></td>
                        <td><?php echo $leave->std_date; ?></td>
                        <td><?php echo $leave->end_date; ?></td>
                        <td><?php echo $leave->no_of_days; ?></td>
                        <td><?php echo $leave->reason; ?></td>
                        <td><?php echo ($leave->status == 0) ? 'Pending' : (($leave->status == 1) ? 'Approved' : 'Rejected'); ?></td>
                        <td><a href="<?php echo URLROOT; ?>/drivers/updateLeaveApplication/<?php echo $leave->leave_id; ?>"><i
                                            class="fas fa-pencil-alt" style="color: white;"></i></a></td>
                        <td><a href="<?php echo URLROOT; ?>/drivers/deleteLeaveApplication/<?php echo $leave->leave_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
