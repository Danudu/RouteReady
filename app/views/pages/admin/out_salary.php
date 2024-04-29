<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/content.css">
    <title>Salary | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Out-Source Driver Salary Calculation</title>
    <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url(http://localhost:8888/RouteReady/public/img/pic7.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 0;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            max-width: 800px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: var(--white);
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: var(--white);
            font-weight: 600;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid var(--primary-color-light);
            background-color: var(--primary-color);
            color: var(--white);
            box-sizing: border-box;
            font-size: medium;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: 100%;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 20px;
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .checkbox-container {
            display: flex;
            align-items: center;
        }  .checkbox-container {
            display: flex;
            align-items: center;
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

    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/profile/<?=$_SESSION['user_id']?>">
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
            <span class="tooltip">vehicle</span>
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
            <h2>Out-Source Driver Salary Calculation</h2>
            <form method="post" action="<?php echo URLROOT; ?>/admins/handleFormSubmission">
                <label for="driver_id">Driver ID:</label>
                <input type="text" id="driver_id" name="driver_id" required>

                <label for="number_of_trips">Number of Trips Went:</label>
                <input type="number" id="number_of_trips" name="number_of_trips" required>

                <div class="checkbox-container">
                <label for="edit_basic_payment">Edit Basic Payment</label>
                    <input type="checkbox" id="edit_basic_payment" name="edit_basic_payment" onchange="toggleBasicPaymentEdit()">
                    
                </div>

                <div class="additional-details" id="basic_payment_edit_section">
                    <label for="basic_payment">Basic Payment:</label>
                    <input type="number" id="basic_payment" name="basic_payment" value="2000" required>
                </div>

                <input type="submit" class="button" value="Calculate Salary">
            </form>
        </div>
    </div>
     </div>

    <script>
        function toggleBasicPaymentEdit() {
            var checkBox = document.getElementById("edit_basic_payment");
            var basicPaymentEditSection = document.getElementById("basic_payment_edit_section");
            if (checkBox.checked == true) {
                basicPaymentEditSection.style.display = "block"; // Show the basic payment editing section
            } else {
                basicPaymentEditSection.style.display = "none"; // Hide the basic payment editing section
            }
        }
    </script>
</body>

</html>
