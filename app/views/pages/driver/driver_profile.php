<!DOCTYPE html>

</html>

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

    <?php flash('update_success'); ?>
    <div class="container">
        <nav>
            <div class="nav__logo">
                <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></a>
            </div>
            <div class="nav__links">
                <p class="link"><a href="<?php echo URLROOT; ?>/pages/home">Home</a></p>
            </div>
        </nav>
        <div class="wrapper_prof">
            <h1>Profile</h1>
            <p class="welcome">Welcome, <?php echo $data['user']->name; ?>!</p>
            <p>This is your profile page where you can view and manage your information.</p>
            <?php if ($data['user']->designation == 'driver'): ?>
                <ul>
                    <li><strong>Name:</strong> <?php echo $data['user']->name; ?></li>
                    <li><strong>Driver ID:</strong> <?php echo $data['user']->emp_id; ?></li>
                    <li><strong>Age:</strong> <?php echo $data['driver']->age; ?></li>
                    <li><strong>Contact:</strong> <?php echo $data['user']->contact_num; ?></li>
                    <li><strong>Address:</strong> <?php echo $data['user']->address; ?></li>
                    <li><strong>NIC Number:</strong> <?php echo $data['driver']->nic_number; ?></li>
                    <li><strong>License Number:</strong> <?php echo $data['driver']->driver_license; ?></li>
                    <li><strong>Vehicle Type:</strong> <?php echo $data['driver']->vehicle_type; ?></li>
                    <li><strong>Years Of Experience:</strong> <?php echo $data['driver']->years_of_experience; ?></li>
                    <li><strong>E-mail:</strong> <?php echo $data['user']->email; ?></li>

                </ul>
                <div class="button-container">
                    <a href="<?php echo URLROOT; ?>/drivers/edit_profile/<?= $_SESSION['user_id'] ?>" class="button">Edit
                        Profile</a>
                    <a href="<?php echo URLROOT; ?>/pages/home" class="button">Back</a>
                </div>
            <?php elseif ($data['user']->designation == 'osdriver'): ?>
                <ul>
                    <li><strong>Name:</strong> <?php echo $data['user']->name; ?></li>
                    <li><strong>Driver ID:</strong> <?php echo $data['user']->emp_id; ?></li>
                    <li><strong>Age:</strong> <?php echo $data['osdriver']->age; ?></li>
                    <li><strong>Contact:</strong> <?php echo $data['user']->contact_num; ?></li>
                    <li><strong>Address:</strong> <?php echo $data['user']->address; ?></li>
                    <li><strong>NIC Number:</strong> <?php echo $data['osdriver']->nic_number; ?></li>
                    <li><strong>License Number:</strong> <?php echo $data['osdriver']->driver_license; ?></li>
                    <li><strong>Vehicle Type:</strong> <?php echo $data['osdriver']->vehicle_type; ?></li>
                    <li><strong>Years Of Experience:</strong> <?php echo $data['osdriver']->years_of_experience; ?></li>
                    <li><strong>E-mail:</strong> <?php echo $data['user']->email; ?></li>

                </ul>
                <div class="button-container">
                    <a href="<?php echo URLROOT; ?>/drivers/edit_osprofile/<?= $_SESSION['user_id'] ?>" class="button">Edit
                        Profile</a>
                    <a href="<?php echo URLROOT; ?>/pages/home" class="button">Back</a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</body>

</html>