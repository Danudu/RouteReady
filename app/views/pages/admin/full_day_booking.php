<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/content.css">
    <title>Full Day Booking | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
</head>
    <title>Full Day Booking</title>
    <style>
        /* Provided CSS styles */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        .background {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .main-content {
            padding: 50px 0;
            backdrop-filter: blur(10px) brightness(0.8);
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .wrapper {
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            max-width: 800px;
            margin: auto;
            width: 800px;
        }

        h1 {
            color: var(--white);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: var(--white);
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid var(--primary-color-light);
            background-color: var(--primary-color);
            color: var(--white);
            box-sizing: border-box;
            font-size: medium;
        }

        input[type="submit"],
        .button {
            width: calc(50% - 10px);
            /* Adjusted width */
            height: 35px;
            /* Reduced height */
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 20px;
            /* Reduced border radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            /* Reduced font size */
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 35px;
            /* Adjusted line height */
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 20px;
            margin-right: 10px;
            /* Added margin between buttons */
        }

        input[type="submit"]:hover,
        .button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .button-box {
            display: flex;
            justify-content: center;
            /* Center the buttons */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .button-box button:last-child {
            margin-right: 0;
            /* Remove margin from last button */
        }
    </style>
</head>

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
<div class="background">
        <div class="main-content">
            <div class="container">
                <div class="wrapper">    
                <h1>Full Day Booking</h1>
                <form method="post" action="<?php echo URLROOT ?>/admins/viewFullDayBooking">
                    <div class="form-group">
                        <label for="b_date">Date:</label>
                        <input type="date" id="b_date" name="b_date" min="<?php echo date('Y-m-d'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="location">Destination:</label>
                        <input type="text" id="location" name="location" required>
                    </div>

                    <div class="form-group">
                        <label for="no_pas">Number of Passengers:</label>
                        <input type="number" id="no_pas" name="no_pas" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="driver_id">Driver ID:</label>
                        <input type="text" id="driver_id" name="driver_id" required>
                    </div>

                    <div class="form-group">
                        <label for="vehicle_id">Vehicle ID:</label>
                        <input type="text" id="vehicle_id" name="vehicle_id" required>
                    </div>

                   
                    <div class="button-box">
                    <input type="submit" value="Submit" class="button">
                
                <!-- View Reservations Button -->
                <a href="<?php echo URLROOT; ?>/admins/redirectToTimetable" class="button" id="back">Back</a>
            </div>
            </form>

            <div>
                <div class="button-box">
                 
                <a href="<?php echo URLROOT; ?>/admins/redirectToTimetable" class="button">Go To Schedule Page</a>
                <a href="<?php echo URLROOT; ?>/admins/showTimetable" class="button">View Bookings</a>


                </div>

            </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function () {
        sidebar.classList.toggle("active");
    };
</script>
</body>
</html>