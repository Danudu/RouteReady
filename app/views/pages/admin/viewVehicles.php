<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Reservations</title>
    <link rel="stylesheet" href="../../../public/assets/css/Navigation.css">
    <link rel="stylesheet" href="../../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/style2.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
    <style>
        /* Add your CSS styles here */
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .editbutton {
            background-color: #000000;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>

<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <section class="header" style="width: 100%;display:flex;flex-direction:row;">
        <!-- Your navigation section -->
    </section>

    <div>
        <h3 style="text-align: center;">Vehicle Registration Details</h3>
        <table class="table">
            <tr>
                <th>Registration Number</th>
                <th>Vehicle Number</th>
                <th>Vehicle Type</th>
                <th>Capacity</th>
                <th colspan="3">Options</th> <!-- Added colspan="3" for the new column -->
            </tr>

            <?php foreach ($data['vehicles'] as $vehicle): ?>
                <tr>
                    <td><?php echo $vehicle->Registration_Number; ?></td>
                    <td><?php echo $vehicle->Vehicle_Number; ?></td>
                    <td><?php echo $vehicle->Vehicle_Name; ?></td>
                    <td><?php echo $vehicle->capacity; ?></td>
                    <td><a href="<?php echo URLROOT; ?>/admins/editVehicle/<?php echo $vehicle->Registration_Number; ?>"
                            class="editbutton">Edit</a></td>
                    <td>
                        <form
                            action="<?php echo URLROOT; ?>/admins/deleteVehicle/<?php echo $vehicle->Registration_Number; ?>"
                            method="POST">
                            <button type="submit" class="editbutton">Delete</button>
                        </form>
                    </td>
                    <td><a href="<?php echo URLROOT; ?>/admins/viewvehiclemore/<?php echo $vehicle->Registration_Number; ?>"
                            class="editbutton">View</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- back button -->
        <a href="<?php echo URLROOT; ?>/admins/addVehicles" class="editbutton" style="margin-left: 10px;">Back</a>
    </div>
</body>