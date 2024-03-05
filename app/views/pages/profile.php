<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php flash('update_success'); ?>
    <div class="container">
        <a href="<?php echo URLROOT; ?>/pages/home">Back</a>
        <!-- <?php
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        ?> -->
        <h1>User Profile</h1>
            <p>Welcome, <?php echo $data['user']->name; ?>!</p>
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
            <a href="<?php echo URLROOT; ?>/pages/edit_profile/<?=$_SESSION['user_id']?>" class="button">Edit Profile</a>
    </div>
</body>
</html>
