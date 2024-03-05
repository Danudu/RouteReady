<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Website</title>
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
    <div class="container">
        <h1>Welcome to Our Website</h1>
        <p>Please select your role:</p>
        <a href="login.php?role=admin" class="button">Admin Login</a>
        <a href="<?php echo URLROOT; ?>/users/login" class="button">HR Manager Login</a>
        <a href="login.php?role=driver" class="button">Driver Login</a>
        <a href="login.php?role=employee" class="button">Employee Login</a>
        <p>Don't have an account? <a href="<?php echo URLROOT; ?>/users/register">Register here</a>.</p>

        <hr>

        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum viverra ex eu massa hendrerit efficitur. Proin vitae nisi nec enim facilisis rutrum. Nullam quis condimentum lorem. Vivamus feugiat purus a convallis convallis. Mauris euismod ex id turpis malesuada, vel suscipit risus placerat. Curabitur vel justo eu risus consectetur imperdiet. Nam vel velit eu ex sodales condimentum. Mauris quis elit et felis venenatis tincidunt. Curabitur faucibus vel elit at cursus. Integer eu sodales elit. Nunc consequat augue odio, at varius ex condimentum et. Nullam in nunc vel odio consequat gravida.</p>
    </div>
</body>
</html>
