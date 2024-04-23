<html>

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Make WorkTrip Reservation | RouteReady</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/worktrip.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
 
        <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const timeInput = document.getElementById('triptime');
                const ampmSelect = document.getElementById('ampm');

                timeInput.addEventListener('change', function () {
                    const selectedTime = timeInput.value;
                    const selectedAMPM = ampmSelect.value;
                    const formattedTime = selectedTime + ' ' + selectedAMPM;
                    timeInput.value = formattedTime;
                });
            });
        </script>

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
                <li>
                    <a href="<?php echo URLROOT; ?>/posts/terms_conditions">
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

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>


    <div class="main-content">

        <div class="container">
            <div class="form">
                <div class="wrapper__reg">
                    <h1>Work Trip Reservation</h1>
                    <form action="<?php echo URLROOT; ?>/employees/makeWorkTrip" method="post">
                        <div class="input-box">
                            <input type="text" id="e_name" name="e_name" placeholder="Employee Name">
                        </div>
                        <div class="input-box">
                            <input type="text" id="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="input-box">
                            <input type="text" id="reason" name="reason" placeholder="Reason for Vehicle use">
                        </div>
                        <div class="input-box">
                            <input type="text" name="p_no" placeholder="Number of Passengers">
                        </div>
                        <div class="input-box">
                            <input type="text" id="comments" name="comments" placeholder="Comments or Special Requests">
                        </div>
                        <div class="input-box">
                            <input type="text" id="des" name="des" placeholder="Destination">
                        </div>
                        <div class="input-box">
                            <input type="date" id="tripdate" name="tripdate">
                        </div>
                        <div class="input-box">
                            <input type="time" id="tripTime" name="triptime">
                            <select id="ampm" name="ampm">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                        <input type="submit" value="Reserve" class="btn">
                    </form>
                    <div class="register-link">
                        <a href="<?php echo URLROOT; ?>/employees/viewWorkTrips" class="btn">View Work Trips</a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>