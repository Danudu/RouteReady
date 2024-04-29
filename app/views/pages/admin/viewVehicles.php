<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">

    <title>View Reservations | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>

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
                    <a href="<?php echo URLROOT; ?>/posts/terms">
                        <i class="fas fa-book-bookmark"></i>
                        <span class="icon_name">T&C</span>
                    </a>
                    <span class="tooltip">Terms & Conditions</span>
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
                    <a href="<?php echo URLROOT; ?>/admins/addVehicles" class="editbutton"
                        style="margin-left: 10px;">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>