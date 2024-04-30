<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/content.css">
    <title>Edit Bank details | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
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
            display: flex;
            justify-content: center;
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
            width: 100%;
        }

        label {
            color: var(--white);
            font-weight: bold;
            margin-bottom: 10px;
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
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
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


        .button_back {
            width: 100%;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
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

.button_back:hover {
    background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
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
                        <a href="<?php echo URLROOT; ?>/pages/home/<?= $_SESSION['user_id'] ?>">
                            <i class="fa-solid fa-house"></i>
                            <span class="icon_name">Home</span>
                        </a>
                        <span class="tooltip">HomePage</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/profile/<?= $_SESSION['user_id'] ?>">
                        <i class="fas fa-user"></i>
                        <span class="icon_name">Profile</span>
                    </a>
                    <span class="tooltip">Profile</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/submitLeaveApplication">
                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                        <span class="icon_name">Leaves</span>
                    </a>
                    <span class="tooltip">Apply Leaves</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewSchedule">
                    <i class="fa-regular fa-calendar-days"></i>
                        <span class="icon_name">Schedule</span>
                    </a>
                    <span class="tooltip">Schedule</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewSalary/<?= $_SESSION['user_id'] ?>">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span class="icon_name">Salary</span>
                    </a>
                    <span class="tooltip">Salary Reports</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewBankDetails">
                    <i class="fa-solid fa-money-check-dollar"></i>
                        <span class="icon_name">BankDetails</span>
                    </a>
                    <span class="tooltip">Bank Details</span>
                </li>
            </ul>
            <!-- <ul>
                <li id="showPopup">
                    <a href="#" onclick="event.preventDefault();" id="showPopup">
                        <i class="fas fa-book-bookmark"></i>
                        <span class="icon_name">T&C</span>
                    </a>
                    <span class="tooltip">Terms & Conditions</span>
                </li>
            </ul> -->
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
<div class="background">
        <div class="main-content">
            <div class="container">
                <div class="wrapper">

        <h2>Update Bank Details</h2>
        <form action="<?php echo URLROOT; ?>/drivers/editBankDetails" method="post">
            <div class="form-group">
                <label for="accountNo">Account Number:</label>
                <input type="text" id="accountNo" name="accountNo" value="<?php echo $data['bankDetails']->accountNo; ?>">
            </div>
            <div class="form-group">
                <label for="bankName">Bank Name:</label>
                <input type="text" id="bankName" name="bankName" value="<?php echo $data['bankDetails']->bankName; ?>">

            </div>
            <div class="form-group">
                <label for="branchName">Branch Name:</label>
                <input type="text" id="branchName" name="branchName" value="<?php echo $data['bankDetails']->branchName; ?>">

            </div>
            <div class="form-group">
                <label for="holdersName">Account Holder's Name:</label>
                <input type="text" id="holdersName" name="holdersName" value="<?php echo $data['bankDetails']->holdersName; ?>">
            </div>
            <button type="submit">Update Bank Details</button>
            <!-- back button -->
          
        </form>
        <a href="<?php echo URLROOT; ?>/drivers/viewBankDetails" class="button_back" id="back">Back</a>
        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>