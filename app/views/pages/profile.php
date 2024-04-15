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
                <p class="link"><a href="<?php echo URLROOT; ?>/hrmanagers/home">Home</a></p>
            </div>
        </nav>
        <div class="wrapper_prof">
            <h1>Profile</h1>
            <p class="welcome">Welcome, <?php echo $data['user']->name; ?>!</p>
            <p>This is your profile page where you can view and manage your information.</p>
            <ul>
                <li><strong>Name:</strong> <?php echo $data['user']->name; ?></li>
                <li><strong>Employee ID:</strong> <?php echo $data['user']->emp_id; ?></li>
                <li><strong>E-mail:</strong> <?php echo $data['user']->email; ?></li>
                <li><strong>Contact:</strong> <?php echo $data['user']->contact_num; ?></li>
                <li><strong>Address:</strong> <?php echo $data['user']->address; ?></li>
                <li><strong>Department:</strong> <?php echo $data['user']->department; ?></li>
                <li><strong>Role:</strong> <?php echo $data['user']->designation; ?></li>
                <li><strong>Registered Date:</strong> <?php echo $data['user']->date; ?></li>
            </ul>
            <div class="button-container">
                <a href="<?php echo URLROOT; ?>/hrmanagers/home" class="button">Back</a>
                <a href="<?php echo URLROOT; ?>/pages/edit_profile/<?= $_SESSION['user_id'] ?>" class="button">Edit
                    Profile</a>
            </div>
        </div>

    </div>
</body>

</html>