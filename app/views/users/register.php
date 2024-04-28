<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up | RouteReady</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/logreg/logreg.css">

    <style>
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --text-lighter: #ffffff0f;
            --white: #ffffff;
            --max-width: 1200px;
        }
        /* Style for the toggle buttons */
        .toggle-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
            border: 1px var(--text-light) solid;
            border-radius: 20px;

            background-color: var(--primary-color-extra-light);
            /* Change the background color as desired */
            color: #fff;    
            /* Change the text color as desired */
            transition: background-color 0.3s ease;
        }

        /* Style for the active toggle button */
        .toggle-btn.active {
            background-color: var(--text-light);
            color: var(--primary-color);
            /* Change the active background color as desired */
        }

        /* Style for the container of the toggle buttons */
        .button-box {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <div class="nav__logo">
                <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></a>
            </div>
            <ul class="nav__links">
                <li class="link"><a href="<?php echo URLROOT; ?>">Home</a></li>
                <li class="link"><a href="<?php echo URLROOT; ?>/#about">About</a></li>
                <li class="link"><a href="<?php echo URLROOT; ?>/#services">Services</a></li>
                <li class="link"><a href="<?php echo URLROOT; ?>/#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="form">
            <div class="wrapper__reg">
                <?php flash('register_success'); ?>
                <h1>Register</h1>
                <p>Please fill out this form to register</p>
                <div class="form-box">
                    <div class="button-box">
                        <button type="button" class="toggle-btn active" onclick="other()">Other User</button>
                        <button type="button" class="toggle-btn" onclick="outsource()">Outsource Drivers</button>

                    </div>
                    <form id="other" action="<?php echo URLROOT; ?>/users/register" method="post">
                        <div class="input-box">
                            <!-- <label for="name">Name: <sup>*</sup></label> -->
                            <input type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="Name">
                            <span><?php echo $data['name_err']; ?></span>
                        </div>
                        <div class="input-box">
                            <!-- <label for="emp_id">Employee ID: <sup>*</sup></label> -->
                            <input type="text" name="emp_id" value="<?php echo $data['emp_id']; ?>"
                                placeholder="Employee ID">
                            <span><?php echo $data['emp_id_err']; ?></span>
                        </div>
                        <div class="input-box">
                            <!-- <label for="email">Email: <sup>*</sup></label> -->
                            <input type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Email">
                            <span><?php echo $data['email_err']; ?></span>
                        </div>
                        <div class="input-box">
                            <!-- <label for="contact_num">Contact: <sup>*</sup></label> -->
                            <input type="text" name="contact_num" value="<?php echo $data['contact_num']; ?>"
                                placeholder="Contact">
                        </div>
                        <div class="input-box">
                            <!-- <label for="address">Address: <sup>*</sup></label> -->
                            <input type="text" name="address" value="<?php echo $data['address']; ?>"
                                placeholder="Address">
                        </div>
                        <div class="input-box">
                            <!-- <label for="department">Department: <sup>*</sup></label> -->
                            <input type="text" name="department" value="<?php echo $data['department']; ?>"
                                placeholder="Department">
                        </div>
                        <div class="input-box">
                            <!-- <label for="designation">Designation: <sup>*</sup></label> -->
                            <!-- <input type="text" name="designation" value="<?php echo $data['designation']; ?>" placeholder="Designation"> -->
                            <select class="select" name="designation" id="designation"
                                value="<?php echo $data['designation']; ?>" aria-placeholder="Designation">
                                <option disabled selected>Select designation...</option>
                                <option value="employee">Employee</option>
                                <option value="hrmanager">HR Manager</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <!-- <label for="password">Password: <sup>*</sup></label> -->
                            <input type="password" name="password" value="<?php echo $data['password']; ?>"
                                placeholder="Type Password">
                            <span><?php echo $data['password_err']; ?></span>
                        </div>
                        <div class="input-box">
                            <!-- <label for="confirm_password">Confirm Password: <sup>*</sup></label> -->
                            <input type="password" name="confirm_password"
                                value="<?php echo $data['confirm_password']; ?>" placeholder="Re-type Password">
                            <span><?php echo $data['confirm_password_err']; ?></span>
                        </div>
                        <input type="submit" value="Register" class="btn">

                        <div class="register-link">
                            <p>Have an account? <a href="<?php echo URLROOT; ?>/users/login">Login</a></p>
                        </div>
                    </form>
                    <form id="outsource" action="<?php echo URLROOT; ?>/users/registerOSDriver" method="post">
                        <div class="input-box">
                            <!-- <label for="name">Name: <sup>*</sup></label> -->
                            <input type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="Name">
                            <span><?php echo $data['name_err']; ?></span>
                        </div>
                        <div class="input-box">
                            <!-- <label for="email">Email: <sup>*</sup></label> -->
                            <input type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Email">
                            <span><?php echo $data['email_err']; ?></span>
                        </div>
                        <div class="input-box">
                            <!-- <label for="contact_num">Contact: <sup>*</sup></label> -->
                            <input type="text" name="contact_num" value="<?php echo $data['contact_num']; ?>"
                                placeholder="Contact">
                        </div>

                        <div class="input-box">
                            <input type="text" name="driver_license" value="<?php echo $data['driver_license']; ?>"
                                placeholder="Driver License Number">
                        </div>
                        <div class="input-box">
                            <!-- <label for="age">Age: <sup>*</sup></label> -->
                            <input type="text" name="age" value="<?php echo isset($data['age']) ? $data['age'] : ''; ?>"
                                placeholder="Age">
                        </div>

                        <div class="input-box">
                            <!-- <label for="nic_number">NIC Number: <sup>*</sup></label> -->
                            <input type="text" name="nic_number"
                                value="<?php echo isset($data['nic_number']) ? $data['nic_number'] : ''; ?>"
                                placeholder="NIC Number">
                        </div>


                        <div class="input-box">
                            <!-- <label for="address">Address: <sup>*</sup></label> -->
                            <input type="text" name="address" value="<?php echo $data['address']; ?>"
                                placeholder="Address">
                        </div>


                        <div class="input-box">
                            <!-- <label for="designation">Designation: <sup>*</sup></label> -->
                            <!-- <input type="text" name="designation" value="<?php echo $data['designation']; ?>" placeholder="Designation"> -->
                            <select class="select" name="designation" id="designation"
                                value="<?php echo $data['designation']; ?>" aria-placeholder="Designation">
                                <option value="osdriver">Outsource Driver</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <!-- <label for="vehicle_type">Vehicle Type: <sup>*</sup></label> -->
                            <input type="text" name="vehicle_type" value="<?php echo $data['vehicle_type']; ?>"
                                placeholder="Vehicle Type">
                        </div>
                        <div class="input-box">
                            <!-- <label for="years_of_experience">Years of Experience: <sup>*</sup></label> -->
                            <input type="text" name="years_of_experience"
                                value="<?php echo isset($data['years_of_experience']) ? $data['years_of_experience'] : ''; ?>"
                                placeholder="Years of Experience">
                        </div>

                        <div class="input-box">
                            <!-- <label for="password">Password: <sup>*</sup></label> -->
                            <input type="password" name="password" value="<?php echo $data['password']; ?>"
                                placeholder="Type Password">
                            <span><?php echo $data['password_err']; ?></span>
                        </div>
                        <div class="input-box">
                            <!-- <label for="confirm_password">Confirm Password: <sup>*</sup></label> -->
                            <input type="password" name="confirm_password"
                                value="<?php echo $data['confirm_password']; ?>" placeholder="Re-type Password">
                            <span><?php echo $data['confirm_password_err']; ?></span>
                        </div>
                        <input type="submit" value="Register" class="btn">
                        <div class="register-link">
                            <p>Have an account? <a href="<?php echo URLROOT; ?>/users/login">Login</a></p>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                other(); // Call the other function to set the initial state
            });

            var userForm = document.getElementById("other");
            var outsourceForm = document.getElementById("outsource");
            var otherBtn = document.querySelector(".toggle-btn:nth-child(1)");
            var outsourceBtn = document.querySelector(".toggle-btn:nth-child(2)");

            function other() {
                userForm.style.display = "block";
                outsourceForm.style.display = "none";
                otherBtn.classList.add("active");
                outsourceBtn.classList.remove("active");
            }

            function outsource() {
                userForm.style.display = "none";
                outsourceForm.style.display = "block";
                otherBtn.classList.remove("active");
                outsourceBtn.classList.add("active");
            }
        </script>

</body>

</html>