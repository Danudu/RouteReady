<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/content.css">
    <title>Home | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">

    <style>
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: var(--primary-color-light);
            padding: 60px 30px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);

            max-width: 800px;
            color: var(--text-light);
        }

        .close {
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
            width: 30px;
            height: 30px;
            color: var(--primary-color);
            font-size: 25px;
            font-weight: 600;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
            background-color: var(--text-light);
        }

        .content2 {
            padding: 0 20px;
            height: 400px;
           
            overflow-y: auto;
            font-size: 14px;
            font-weight: 500;
        }

        .content2::-webkit-scrollbar {
            background-color: var(--primary-color-extra-light);
            width: 2px;
        }

        .content2::-webkit-scrollbar-thumb {
            background-color: var(--text-light);
        }

        .content2 h1 {
            text-transform: uppercase;
        }
        .terms {
            margin-top: 20px;
        }

        .terms ul {
            margin-bottom: 20px;
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
                        <span class="icon_name">Apply Leaves</span>
                    </a>
                    <span class="tooltip">Apply Leaves</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/deivers/view_time_table">
                    <i class="fa-regular fa-calendar-days"></i>
                        <span class="icon_name">Schedule</span>
                    </a>
                    <span class="tooltip">Schedule</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewSalaryDetails/<?= $_SESSION['user_id'] ?>">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span class="icon_name">Salary Reports</span>
                    </a>
                    <span class="tooltip">Salary Reports</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewBankDetails">
                    <i class="fa-solid fa-money-check-dollar"></i>
                        <span class="icon_name">Payments</span>
                    </a>
                    <span class="tooltip">Payments</span>
                </li>
            </ul>
            <ul>
                <li id="showPopup">
                    <a href="#" onclick="event.preventDefault();" id="showPopup">
                        <i class="fas fa-book-bookmark"></i>
                        <span class="icon_name">T&C</span>
                    </a>
                    <span class="tooltip">Terms & Conditions</span>
                </li>
            </ul>
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

    <div class="main-content">
        <div class="container">
            <div class="header">
                <h1>Route Ready Employee</h1>
            </div>
            <div class="main">
                <section class="welcome">
                    <div class="content">
                        <h1>Welcome Aboard!</h1>
                        <h3>Efficiency, Ease, Insights: <br>Your Corporate Mobility Revolution Begins with RouteReady
                        </h3>
                    </div>
                    <div>
                        
                    </div>
                </section>
            </div>
            <div class="footer">
                <p>&copy; 2023 Vehicle Reservation System.</p>
                <h4>Follow us</h4>
                <div class="footer-social">
                    <div class="footer-links">
                        <ul>
                            <li class="social"><a href="https://www.facebook.com/" class="social"><i
                                        class="fa-brands fa-facebook"></i></a></li>
                            <li class="social"><a href="https://twitter.com/" class="social"><i
                                        class="fa-brands fa-twitter"></i></a></li>
                            <li class="social"><a href="https://www.instagram.com/" class="social"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li class="social"><a href="https://www.linkedin.com/" class="social"><i
                                        class="fa-brands fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close">&times;</span>
            <div class="content2">
                <div>
                    <h1>Terms & Conditions</h1>
                    <!-- PHP echo statement for last updated date -->
                    <p>Last Updated on <?php echo $data['lastdate']; ?></p>
                </div>
                <div class="terms">
                    <?php foreach ($data['posts'] as $post): ?>
                        <ul>
                            <li>
                                <h4><?php echo $post->title; ?></h4>
                                <p><?php echo $post->body; ?></p>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>

</body>

<script>
    document.getElementById('showPopup').addEventListener('click', function () {
        console.log("Show popup clicked"); // Debug statement
        // Show the popup
        document.getElementById('popup').style.display = 'block';
    });

    document.getElementById('close').addEventListener('click', function () {
        console.log("Close button clicked"); // Debug statement
        // Close the popup
        document.getElementById('popup').style.display = 'none';
    });
</script>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function () {
        sidebar.classList.toggle("active");
    };
</script>

</html>
