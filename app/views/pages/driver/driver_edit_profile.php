<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | <?php echo $data['user']->name; ?></title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css">
</head>

<body>
    <div class="container">
        <!-- <?php
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        ?> -->
        <nav>
            <div class="nav__logo">
                <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></a>
            </div>
            <ul class="nav__links">
                <li class="link"><a href="<?php echo URLROOT; ?>/pages/home">Home</a></li>
            </ul>
        </nav>
        <div class="form">
            <div class="wrapper__reg">
                <?php flash('Update_success'); ?>
                <form action="<?php echo URLROOT; ?>/drivers/edit_profile/<?= $_SESSION['user_id'] ?>" method="POST">
                    <h1>Edit Profile</h1>
                    <p>Please fill out this form to update</p>
                    <div class="input-box">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo $data['name']; ?>">
                        <span><?php echo $data['name_err']; ?></span>
                    </div>
                    <div class="input-box">
                        <label for="emp_id">Employee ID:</label>
                        <input type="text" name="emp_id" value="<?php echo $data['emp_id']; ?>">
                        <span><?php echo $data['emp_id_err']; ?></span>
                    </div>
                    <div class="input-box">
                        <label for="age">Age:</label>
                        <input type="text" name="age" value="<?php echo $data['age']; ?>">
                    </div>

                    <div class="input-box">
                        <label for="contact_num">Contact:</label>
                        <input type="text" name="contact_num" value="<?php echo $data['contact_num']; ?>">
                    </div>
                    <div class="input-box">
                        <label for="address">Address:</label>
                        <input type="text" name="address" value="<?php echo $data['address']; ?>">
                    </div>
                    <div class="input-box">
                        <label for="nic_number">NIC Number:</label>
                        <input type="text" name="nic_number" value="<?php echo $data['nic_number']; ?>">
                    </div>

                    <div class="input-box">
                        <label for="driver_license">Driver License:</label>
                        <input type="text" name="driver_license" value="<?php echo $data['driver_license']; ?>">
                    </div>
                    <div class="input-box">
                        <label for="vehicle_type">Vehicle Type:</label>
                        <input type="text" name="vehicle_type" value="<?php echo $data['vehicle_type']; ?>">
                    </div>
                    <div class="input-box">
                        <label for="years_of_experience">Years of Experience:</label>
                        <input type="text" name="years_of_experience" value="<?php echo $data['years_of_experience']; ?>">
                    </div>

                    <div class="input-box">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo $data['email']; ?>">
                        <span><?php echo $data['email_err']; ?></span>
                    </div>
                    
                    <div class="input-box">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Enter password">
                        <span><?php echo $data['password_err']; ?></span>
                    </div>
                    
                    <div class="input-box">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" name="confirm_password" placeholder="Re-type password">
                        <span><?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    
                    <input type="submit" value="Update" class="btn">
                    
                    <div class="register-link">
                        <p> <a href="<?php echo URLROOT; ?>/drivers/Profile/<?= $_SESSION['user_id'] ?>">Back</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>