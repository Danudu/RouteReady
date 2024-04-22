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
                    <a href="<?php echo URLROOT; ?>/reservationPayment/displayPayments">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span class="icon_name">Payment</span>
                    </a>
                    <span class="tooltip">Payment</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">
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

</body>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function () {
        sidebar.classList.toggle("active");
    };
</script>

</html>

<!-- https://www.youtube.com/watch?v=uy1tgKOnPB0 -->