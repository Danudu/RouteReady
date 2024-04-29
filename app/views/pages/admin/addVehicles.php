<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">

    <title>Add Vehicles | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        .main-content {
            padding: 30px;
            background-image: url(http://localhost/RouteReady/public/img/pic7.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            /* max-width: 900px;
            
            margin: auto; */
            backdrop-filter: blur(5px);
            background-color: rgb(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            max-width: 800px;
            margin: auto;
            width: 800px;
        }

        .header {

            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .topic-content h1 {
            color: var(--white);
            margin-bottom: 20px;

        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: var(--primary-color-extra-light);
            color: var(--white);
            font-size: 16px;
            margin-top: 5px;
        }

        .form-group input[type="text"]::placeholder,
        .form-group input[type="file"]::placeholder {
            color: var(--text-light);
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="file"]:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }




        .register-button2 {
            width: 100%;
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
            margin-bottom: 20px;
        }


        .register-button2:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .view-button,
        .register-button {
            width: 100%;
            height: 45px;
            background: transparent;
            /* Remove background */
            border: 2px solid var(--text-light);
            /* Add border */
            outline: none;
            border-radius: 40px;
            box-shadow: none;
            /* Remove box shadow */
            cursor: pointer;
            font-size: 16px;
            color: var(--text-light);
            /* Change text color */
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-bottom: 20px;
        }

        .view-button:hover,
        .register-button:hover {
            background-color: var(--text-light);
            color: var(--primary-color);
            box-shadow: 0 0 10px var(--text-light);
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
                <section class="header">
                    <div>
                        <a href="<?php echo URLROOT; ?>/admins/viewvehicle" class="btn view-button">View
                            Vehicles</a>
                    </div>

                    <div class="topic-content">
                        <h1>Vehicle Registration</h1>
                    </div>

                    <form id="vehicleForm" action="<?php echo URLROOT; ?>/admins/addVehicles" method="post">

                        <div class="form-group">
                            <label for="reg_no">Registration number:</label>
                            <input type="text" id="reg_no" name="reg_no" placeholder="Enter Registration Number">
                        </div>

                        <div class="form-group">
                            <label for="v_no">Vehicle Number (Number Plate):</label>
                            <input type="text" id="v_no" name="v_no" placeholder="Enter Vehicle Number">
                        </div>

                        <div class="form-group">
                            <label for="name">Vehicle Type:</label>
                            <input type="text" id="name" name="name" placeholder="Enter Vehicle Type">
                        </div>

                        <div class="form-group">
                            <label for="model">Vehicle Model:</label>
                            <input type="text" id="model" name="model" placeholder="Enter Vehicle Model">
                        </div>

                        <div class="form-group">
                            <label for="r_year">Vehicle Registration Year:</label>
                            <input type="text" id="r_year" name="r_year" placeholder="Enter Vehicle Registration Year">
                        </div>

                        <div class="form-group">
                            <label for="vin">Vehicle VIN Number:</label>
                            <input type="text" id="vin" name="vin" placeholder="Enter Vehicle VIN Number">
                        </div>

                        <div class="form-group">
                            <label for="year">Vehicle Manufacture Year:</label>
                            <input type="text" id="year" name="year" placeholder="Enter Vehicle Manufacture Year">
                        </div>

                        <div class="form-group">
                            <label for="insu_pro">Vehicle Insurance Company:</label>
                            <input type="text" id="insu_pro" name="insu_pro" placeholder="Enter Insurance Company">
                        </div>

                        <div class="form-group">
                            <label for="insu_pn">Vehicle Insurance Number:</label>
                            <input type="text" id="insu_pn" name="insu_pn" placeholder="Enter Insurance Number">
                        </div>

                        <div class="form-group">
                            <label for="passenger_capacity">Vehicle Passenger Capacity:</label>
                            <input type="text" id="passenger_capacity" name="passenger_capacity"
                                placeholder="Enter Passenger Capacity">
                        </div>

                        

                        <div class="form-group">
                            <input type="submit" value="Register" class="register-button2">
                        </div>
                    </form>

                </section>

            </div>

        </div>
    </div>
    <script>
        document.getElementById('viewRegistrationBtn').addEventListener('click', function () {
            window.location.href = "./view.php";
        });

        document.getElementById('vehicleForm').addEventListener('submit', function (event) {
            // Get form fields
            const regNo = document.getElementById('reg_no').value;
            const vNo = document.getElementById('v_no').value;
            const name = document.getElementById('name').value;
            const year = document.getElementById('year').value;
            const capacity = document.getElementById('passenger_capacity').value;
            const vin = document.getElementById('vin').value;
            const model = document.getElementById('model').value;
            const insu_pro = document.getElementById('insu_pro').value;
            const insu_pn = document.getElementById('insu_pn').value;
            const image = document.getElementById('image').value;
            const images1 = document.getElementById('images1').value;
            const images2 = document.getElementById('images2').value;

            // Regular expressions for validation
            const numbersOnly = /^[0-9]+$/;

            // Flag to track if the form is valid
            let formIsValid = true;

            // Validation messages
            let validationMessages = [];

            // Validate fields for emptiness
            if (!regNo || !vNo || !name || !year || !capacity) {
                validationMessages.push('All fields must be filled.');
            }

            // Validate registration number (should contain only numbers)
            if (!numbersOnly.test(regNo)) {
                validationMessages.push('Registration number must consist of numbers only.');
            }

            // Validate "Year" field for numbers-only and exactly four digits
            if (!numbersOnly.test(year) || year.length !== 4) {
                validationMessages.push('Year must contain exactly four digits and consist of numbers only.');
            }

            // Display validation messages
            if (validationMessages.length > 0) {
                alert(validationMessages.join('\n'));
                formIsValid = false;
            }

            // If the form is not valid, prevent submission
            if (!formIsValid) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>