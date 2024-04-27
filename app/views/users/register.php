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
                            <button type="button" class="toggle-btn" onclick="other()">Other User</button>
                            <button type="button" class="toggle-btn" onclick="oursource()">Outsource Drivers</button>
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
                        <input type="text" name="address" value="<?php echo $data['address']; ?>" placeholder="Address">
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
                            <option value="driver">Driver</option>
                            <option value="hrmanager">HR Manager</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="input-box" id="driverDetails1" style="display: none;">
                        <input type="text" name="driver_license" placeholder="Driver License Number">
                    </div>
                    <div class="input-box" id="driverDetails2" style="display: none;">
                        <input type="text" name="vehicle_type" placeholder="Vehicle Type ">
                    </div>
                    <div class="input-box">
                        <!-- <label for="password">Password: <sup>*</sup></label> -->
                        <input type="password" name="password" value="<?php echo $data['password']; ?>"
                            placeholder="Type Password">
                        <span><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="input-box">
                        <!-- <label for="confirm_password">Confirm Password: <sup>*</sup></label> -->
                        <input type="password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>"
                            placeholder="Re-type Password">
                        <span><?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    <input type="submit" value="Register" class="btn">

                    <div class="register-link">
                        <p>Have an account? <a href="<?php echo URLROOT; ?>/users/login">Login</a></p>
                    </div>
                </form>

                <form id="outsource" action="<?php echo URLROOT; ?>/users/register" method="post">
                <div class="input-box">
                        <!-- <label for="name">Name: <sup>*</sup></label> -->
                        <input type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="full Name">
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
                        <input type="text" name="address" value="<?php echo $data['address']; ?>" placeholder="Address">
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
                            <option value="driver">Driver</option>
                            <option value="hrmanager">HR Manager</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="input-box" id="driverDetails1" style="display: none;">
                        <input type="text" name="driver_license" placeholder="Driver License Number">
                    </div>
                    <div class="input-box" id="driverDetails2" style="display: none;">
                        <input type="text" name="vehicle_type" placeholder="Vehicle Type ">
                    </div>
                    <div class="input-box">
                        <!-- <label for="password">Password: <sup>*</sup></label> -->
                        <input type="password" name="password" value="<?php echo $data['password']; ?>"
                            placeholder="Type Password">
                        <span><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="input-box">
                        <!-- <label for="confirm_password">Confirm Password: <sup>*</sup></label> -->
                        <input type="password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>"
                            placeholder="Re-type Password">
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
        document.getElementById('designation').addEventListener('change', function () {
            var driverDetails1 = document.getElementById('driverDetails1');
            var driverDetails2 = document.getElementById('driverDetails2');
            if (this.value === 'driver') {
                driverDetails1.style.display = 'block';
                driverDetails2.style.display = 'block';
            } else {
                driverDetails1.style.display = 'none';
                driverDetails2.style.display = 'none';
            }
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        daily(); // Call the daily function to set the initial state
    });

    var UserForm = document.getElementById("other");
    var OutsorceForm = document.getElementById("oursource");
    var button = document.getElementById("button");

    function other() {
        UserForm.style.display = "block";
        OutsorceForm.style.display = "none";
        button.style.left = "0";
    }

    function oursource() {
        UserForm.style.display = "none";
        OutsorceForm.style.display = "block";
        button.style.left = "110px";
    }
    </script>
</body>

</html>