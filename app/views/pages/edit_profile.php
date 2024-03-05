<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
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
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="<?php echo URLROOT; ?>/pages/profile/<?=$_SESSION['user_id']?>">Back</a>
        <!-- <?php 
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        ?> -->
        <h1>Edit Profile</h1>
        <form action="<?php echo URLROOT; ?>/pages/edit_profile/<?=$_SESSION['user_id']?>" method="POST">
        <div>
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $data['name']; ?>">
                <span><?php echo $data['name_err'];?></span>
            </div>
            <div>
                <label for="emp_id">Employee ID:</label>
                <input type="text" name="emp_id" value="<?php echo $data['emp_id']; ?>">
                <span><?php echo $data['emp_id_err'];?></span>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $data['email']; ?>">
                <span><?php echo $data['email_err'];?></span>
            </div>
            <div>
                <label for="contact_num">Contact:</label>
                <input type="text" name="contact_num" value="<?php echo $data['contact_num']; ?>">

            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $data['address']; ?>">

            </div>
            <div>
                <label for="department">Department:</label>
                <input type="text" name="department" value="<?php echo $data['department']; ?>">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" value="<?php echo $data['password']; ?>">
                <span><?php echo $data['password_err'];?></span>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span><?php echo $data['confirm_password_err'];?></span>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="Update">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
