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
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .content2 {
            padding: 20px;
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
                    <a href="<?php echo URLROOT; ?>/pages/profile/<?= $_SESSION['user_id'] ?>">
                        <i class="fas fa-user"></i>
                        <span class="icon_name">Profile</span>
                    </a>
                    <span class="tooltip">Profile</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/employees/viewReservation">
                        <i class="fa-solid fa-magnifying-glass-location"></i>
                        <span class="icon_name">Reservations</span>
                    </a>
                    <span class="tooltip">Reservations</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/employees/viewWorkTrips">
                        <i class="fa-solid fa-suitcase-rolling"></i>
                        <span class="icon_name">WorkTrips</span>
                    </a>
                    <span class="tooltip">WorkTrips</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/reservationPayment/displayPayments">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span class="icon_name">Payment</span>
                    </a>
                    <span class="tooltip">Payment</span>
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
                        <button type="button" class="btn2"><a href="<?php echo URLROOT; ?>/employees/viewReservation"
                                class="bt">Transport Reservation</a></button>
                        <button type="button" class="btn2"><a href="<?php echo URLROOT;
                        ; ?>/employees/viewWorkTrips" class="bt">WorkTrip Reservation</a></button>
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

<!-- https://www.youtube.com/watch?v=uy1tgKOnPB0 -->