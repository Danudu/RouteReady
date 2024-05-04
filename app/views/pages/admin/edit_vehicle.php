<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title>Edit Vehicles | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">

    <style>
       @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");


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
        .edit-button {
            width: 100%;
            height: 45px;
            /* Increased height for larger button */
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 20px;
            /* Increased font size */
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            /* Centering text vertically */
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 20px;
            /* Added margin top */
        }

        input[type="submit"]:hover,
        .edit-button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .register-link {
            text-align: center;
        }

        .register-link .button {
            border: 2px solid var(--text-light);
            /* Added border */
            background: transparent;
            color: var(--text-light);
        }

        .register-link .button:hover {
            background: var(--primary-color-light);
            /* Background on hover */
            color: var(--white);
        }

        .input-box textarea {
            height: 120px;
            /* Adjust the height as needed */
            resize: vertical;
            /* Allow vertical resizing */
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid var(--primary-color-light);
            background-color: var(--primary-color);
            color: var(--white);
            box-sizing: border-box;
            font-size: medium;
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
<div class="background">
        <div class="main-content">
            <div class="container">
                <div class="wrapper">    
   
        <h3>Edit Vehicle</h3>
        <form action="<?php echo URLROOT; ?>/admins/editVehicle/<?php echo $data['registration_number']; ?>" method="POST" class="vehicle-form">
            <label for="vehicleNumber">Vehicle Number:</label>
            <input type="text" id="vehicleNumber" name="vehicleNumber" value="<?php echo $data['vehicle_number']; ?>" required class="form-input">

            <label for="vehicleType">Vehicle Type:</label>
            <input type="text" id="vehicleType" name="vehicleType" value="<?php echo $data['vehicle_type']; ?>" required class="form-input">

            <label for="vehicleModel">Vehicle Model:</label>
            <input type="text" id="vehicleModel" name="vehicleModel" value="<?php echo $data['vehicle_model']; ?>" required class="form-input">

            <label for="registrationYear">Registration Year:</label>
            <input type="text" id="registrationYear" name="registrationYear" value="<?php echo $data['registration_year']; ?>" required class="form-input">

            <label for="vehicleYear">Manufacture Year:</label>
            <input type="text" id="vehicleYear" name="vehicleYear" value="<?php echo $data['manufacture_year']; ?>" required class="form-input">

            <label for="vin">VIN Number:</label>
            <input type="text" id="vin" name="vin" value="<?php echo $data['vin_number']; ?>" required class="form-input">

            <label for="insuranceCo">Insurance Company:</label>
            <input type="text" id="insuranceCo" name="insuranceCo" value="<?php echo $data['insurance_company']; ?>" required class="form-input">

            <label for="insuranceNo">Insurance Number:</label>
            <input type="text" id="insuranceNo" name="insuranceNo" value="<?php echo $data['insurance_number']; ?>" required class="form-input">

            <label for="capacity">Passenger Capacity:</label>
            <input type="text" id="capacity" name="capacity" value="<?php echo $data['passenger_capacity']; ?>" required class="form-input">

            <button type="submit" class="edit-button">Update</button>
        </form>
    </div>
    </div>
                </div>
            </div>
        </div>
\

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>
</body>

</html>