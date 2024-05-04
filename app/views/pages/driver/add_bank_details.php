<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bank Details</title>
    <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            align-items: center;
        }

        .container {
            backdrop-filter: blur(10px) brightness(0.3);
            min-height: 100vh;
            padding-bottom: 30px;
            max-width: 800px;
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: auto;
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            font-size: 36px;
            text-align: center;
            color: var(--white);
        }

        .form-group {
            margin: 15px 0;
            align-items: center;
        }

        label {
            color: var(--white);
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            height: 40px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid var(--text-light);
            background-color: var(--primary-color-light);
            color: var(--text-light);
            margin-top: 5px;
        }

        button[type="submit"] {
            width: 100%;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0.9,0.9);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }
    </style>
</head>
<body>
<div class="main-content">
    <div class="wrapper">
        <div class="container">
            <h2>Add Bank Details</h2>
            <form action="<?php echo URLROOT; ?>/drivers/addBankDetails" method="post">
                <div class="form-group">
                    <label for="accountNo">Account Number:</label>
                    <input type="text" name="accountNo" required>
                </div>
                <div class="form-group">
                    <label for="bankName">Bank Name:</label>
                    <input type="text" name="bankName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="branchName">Branch Name:</label>
                    <input type="text" name="branchName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="holdersName">Account Holder's Name:</label>
                    <input type="text" name="holdersName" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Bank Details</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>