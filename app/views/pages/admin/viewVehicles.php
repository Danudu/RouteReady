<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Vehicles | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        
        body {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

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

        h2 {
            margin-bottom: 20px;
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

        .editbutton {
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

        .editbutton:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .button.back {
            position: absolute;
            right: 0;
            margin-right: 20px;
            
        }
        </style>
</head>

<body>
<div class="sidebar">

<div class="top">
    <div class="logo">
        <img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="">
        <span class="logo_name">Route Ready</span>
    </div>
    <i class="fa-solid fa-bars" id="btn"></i>
</div>
<div class="buttons">
    <ul>
        <li>
            <a href="home">
                <i class="fa-solid fa-house"></i>
                <span class="icon_name">Home</span>
            </a>
            <span class="tooltip">HomePage</span>
        </li>
    </ul>
    <!-- <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/hrmanagers/dashboard">
                <i class="fa-solid fa-chart-line"></i>
                <span class="icon_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
    </ul> -->
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/profile/<?= $_SESSION['user_id'] ?>">
                <i class="fas fa-user"></i>
                <span class="icon_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
    </ul>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/admins/addVehicles">
                <i class="fa-solid fa-van-shuttle"></i>
                <span class="icon_name">Vehicle</span>
            </a>
            <span class="tooltip">Vehicle</span>
        </li>
    </ul>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/admins/redirectToTimetable">
                <i class="fa-regular fa-calendar-days"></i>
                <span class="icon_name"> Schedule</span>
            </a>
            <span class="tooltip">Schedule</span>
        </li>
    </ul>



    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/admins/handleFormSubmission">
                <i class="fa-solid fa-comments-dollar"></i>
                <span class="icon_name">ODSalary</span>
            </a>
            <span class="tooltip">ODSalary</span>
        </li>
    </ul>

    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/admins/viewhr">
                <i class="fas fa-users"></i>
                <span class="icon_name">HRManager</span>
            </a>
            <span class="tooltip">HRManger</span>
        </li>
    </ul>

    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/admins/viewPendingWorkTrips">
                <i class="fa-solid fa-suitcase-rolling"></i>
                <span class="icon_name">WorkTrips</span>
            </a>
            <span class="tooltip">WorkTrips</span>
        </li>
    </ul>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/admins/leaves_admin">
                <i class="fa-solid fa-plus-minus"></i>
                <span class="icon_name">Leaves</span>
            </a>
            <span class="tooltip">Leaves</span>
        </li>
    </ul>
    <ul class="lobtn">
        <li>
            <a href="<?php echo URLROOT; ?>/users/logout">
                <i class="fas fa-arrow-right-from-bracket"></i>
                <span class="icon_name">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>
</div>
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>

        <div class="main-content">
            <div class="container">
                <div class="wrapper">

                    <h3 style="text-align: center;">Vehicle Registration Details</h3>
                    <table class="table">
                        <tr>
                            <th>Registration Number</th>
                            <th>Vehicle Number</th>
                            <th>Vehicle Type</th>
                            <th>Capacity</th>
                            <th colspan="4">Options</th> <!-- Added colspan="3" for the new column -->
                        </tr>

                        <?php foreach ($data['vehicles'] as $vehicle): ?>
                            <tr>
                                <td><?php echo $vehicle->Registration_Number; ?></td>
                                <td><?php echo $vehicle->Vehicle_Number; ?></td>
                                <td><?php echo $vehicle->Vehicle_Name; ?></td>
                                <td><?php echo $vehicle->capacity; ?></td>
                                <td>
    <a href="<?php echo URLROOT; ?>/admins/editVehicle/<?php echo $vehicle->Registration_Number; ?>">
        <i class="fas fa-pencil-alt" style="color: white;"></i>
    </a>
</td>
<td>
    <form action="<?php echo URLROOT; ?>/admins/deleteVehicle/<?php echo $vehicle->Registration_Number; ?>" method="POST">
        <button type="submit" class="btn-delete">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>
<td>
    <a href="<?php echo URLROOT; ?>/admins/viewvehiclemore/<?php echo $vehicle->Registration_Number; ?>">
        <i class="fas fa-eye" style="color: white;"></i>
    </a>
</td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <!-- back button -->
                    <a href="<?php echo URLROOT; ?>/admins/addVehicles" class="editbutton"
                        style="margin-left: 10px;">Back</a>
                </div>
            </div>
        </div>
    </div>
</body> 