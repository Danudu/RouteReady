<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">

    <title>Edit WorkTrips | RouteReady</title>
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
                    <a href="<?php echo URLROOT; ?>/employees/viewWorkTrips">
                        <i class="fa-solid fa-suitcase-rolling"></i>
                        <span class="icon_name">WorkTrips</span>
                    </a>
                    <span class="tooltip">WorkTrips</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/employees/viewMonthlyPayments">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span class="icon_name">Payment</span>
                    </a>
                    <span class="tooltip">Payment</span>
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
            <h2>Edit Work Trip Reservation</h2>
            <div class="form-box">
                <form action="<?php echo URLROOT; ?>/employees/updateWorkTripReservation" method="post"
                    class="input-group">
                    <input type="hidden" name="tripID" value="<?php echo $data['workTrip']->tripID; ?>">
                    <div class="column">
                        <section class="section">
                            <label for="e_name">Employee Name:</label><br>
                            <div class="employee-name">
                                <input type="text" id="employee_name" name="employee_name"
                                    value="<?php echo $data['workTrip']->employee_name; ?>">
                        </section>

                        <section class="section">
                            <label for="email">Email Address:</label><br>
                            <div class="pickup">
                                <input type="text" id="email" name="email"
                                    value="<?php echo $data['workTrip']->email; ?>">
                            </div>
                        </section>

                        <section class="section">
                            <label for="reason">Reason for Vehicle use:</label><br>
                            <div class="date">
                                <input type="text" id="reason" name="reason"
                                    value="<?php echo $data['workTrip']->reason; ?>">
                            </div>
                        </section>

                        <section class="section">
                            <label for="p_no">Number of Passengers:</label><br>
                            <div class="route">
                                <input type="number" id="numofPassengers" name="numofPassengers"
                                    value="<?php echo $data['workTrip']->numofPassengers; ?>">
                            </div>
                        </section>

                        <section class="section">
                            <label for="comments">Comments or Special Requests:</label><br>
                            <div class="date">
                                <textarea id="comments"
                                    name="comments"><?php echo $data['workTrip']->comments; ?></textarea>
                            </div>
                        </section>
                    </div>


                    <div class="column">
                        <section class="section">
                            <label for="des">Destination:</label><br>
                            <div class="pickup">
                                <input type="text" id="destination" name="destination"
                                    value="<?php echo $data['workTrip']->destination; ?>">

                            </div>
                        </section>

                        <section class="section">
                            <label for="tripdate">Reservation Date:</label><br>
                            <div class="dropoff">
                                <input type="date" id="tripDate" name="tripDate"
                                    value="<?php echo $data['workTrip']->tripDate; ?>">
                            </div>
                        </section>

                        <section class="section">
                            <label for="triptime">Reservation Time:</label><br>
                            <div class="dropoff">
                                <input type="time" id="tripTime" name="tripTime"
                                    value="<?php echo $data['workTrip']->tripTime; ?>">
                                <select id="ampm" name="ampm">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                        </section>



                        <section class="section">
                            <div class="submit"><input type="submit" value="update"></div>
                        </section>
                    </div>
                </form>
            </div>
        </div>

    </div>




</body>

</html>