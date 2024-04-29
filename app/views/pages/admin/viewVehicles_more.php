<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">

    <title>Reservation | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
    <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
        }

        .main-content{
            padding: 50px 0;
            background-image: url(http://localhost/RouteReady/public/img/pic7.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .vehicle-container {
            background-color: rgb(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            width: 70%;
            /* Adjust width as needed */
        }

        .vehicle-info {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Align items to the start */
        }

        .vehicle-info>div {
            margin-bottom: 10px;
        }

        .edit-delete-buttons {
            display: flex;
            justify-content: center;
            /* Center buttons horizontally */
            margin-top: 20px;
            /* Add some margin */
        }

        .editbutton,
        .deletebutton {
            width: 150px;
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

        .editbutton:hover,
        .deletebutton:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
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
            <div class="vehicle-container">
                <h1 style="text-align: center;">Vehicle Registration Details</h1>
                <div class="vehicle-info">
                    <div><strong>Registration Number:</strong> <?php echo $data['vehicles']->Registration_Number; ?>
                    </div>
                    <div><strong>Vehicle Number:</strong> <?php echo $data['vehicles']->Vehicle_Number; ?></div>
                    <div><strong>Vehicle Type:</strong> <?php echo $data['vehicles']->Vehicle_Name; ?></div>
                    <div><strong>Vehicle Model:</strong> <?php echo $data['vehicles']->model; ?></div>
                    <div><strong>Capacity:</strong> <?php echo $data['vehicles']->capacity; ?></div>
                    <div><strong>Vehicle/Registered Year:</strong>
                        <?php echo $data['vehicles']->Vehicle_Year . ' / ' . $data['vehicles']->Vehicle_Year; ?></div>
                    <div><strong>Vin Number:</strong> <?php echo $data['vehicles']->vin; ?></div>
                    <div><strong>Insurance Co.:</strong> <?php echo $data['vehicles']->insu_pro; ?></div>
                    <div><strong>Insurance No.:</strong> <?php echo $data['vehicles']->insu_pn; ?></div>
                </div>
                <div class="edit-delete-buttons">
                    <a href="<?php echo URLROOT; ?>/admins/viewvehicle/<?php echo $data['vehicles']->Registration_Number; ?>"
                        class="editbutton">Back</a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>