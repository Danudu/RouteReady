<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">

    <title>Edit Monthly Reservations | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style2.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Reservation.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        .main-content {
            padding: 50px 0;
            background-image: url(http://localhost:8888/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .container {
            backdrop-filter: blur(10px) brightness(0.8);
            /* max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 10px; */
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            max-width: 800px;
            margin: auto;
            width: 800px;
        }

        .topic-content {
            text-align: center;
            margin-bottom: 30px;
        }

        .topic-content h2 {
            color: #fff;
            font-size: 28px;
            font-weight: 600;
        }

        .form-box {
            background-color: rgba(31, 33, 37, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: var(--white);
        }

        .date-topic {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }

        .date {
            margin-bottom: 20px;
        }

        input[type="submit"],
    .button {
        width: 100%;
        height: 45px;
        /* Increased height for larger button */
        background: var(--text-light);
        border: none;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        cursor: pointer;
        font-size: 20px;
        /* Increased font size */
        color: var(--primary-color);
        font-weight: 600;
        text-align: center;
        line-height: 45px;
        /* Centering text vertically */
        display: inline-block;
        text-decoration: none;
        transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
        margin-top: 20px;
        /* Added margin top */
    }

    input[type="submit"]:hover,
    .button:hover {
        background-color: var(--primary-color-light);
        color: var(--white);
        box-shadow: 0 0 10px var(--primary-color-extra-light);
    }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid var(--primary-color-light);
            background-color: var(--primary-color);
            color: var(--white);
            box-sizing: border-box;
            font-size: medium;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid var(--primary-color-light);
            background-color: var(--primary-color);
            color: var(--white);
            box-sizing: border-box;
            font-size: medium;
        }

        .button.back {
            position: absolute;
            right: 0;
            margin-right: 20px;
            
        }
        .register-link {
        text-align: center;
    }

    .register-link .button {
        border: 2px solid var(--text-light);
        /* Added border */
        background: transparent;
        color: var(--text-light);
    }

    .register-link .button:hover {
        background: var(--primary-color-light);
        /* Background on hover */
        color: var(--white);
    }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid var(--primary-color-light);
            background-color: var(--primary-color);
            color: var(--white);
            box-sizing: border-box;
            font-size: medium;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid var(--primary-color-light);
            background-color: var(--primary-color);
            color: var(--white);
            box-sizing: border-box;
            font-size: medium;
        }

      
    </style>

    <script>
       function changeRoute() {
        var schedule = document.getElementById("schedule").value;
        var pickup = document.getElementById("pickup");
        var dropoff = document.getElementById("dropoff");

        if (schedule == "ToWork") {
            pickup.style.display = "block";
            dropoff.style.display = "none";
            // Clear the drop off field
            document.getElementById("dropoffField").value = "";
        } else if (schedule == "FromWork") {
            pickup.style.display = "none";
            dropoff.style.display = "block";
            // Clear the pick up field
            document.getElementById("pickupField").value = "";
        } else {
            pickup.style.display = "block";
            dropoff.style.display = "block";
        }
    }

        function setupFlatpickr() {
            flatpickr("#reservationDateDaily", {
                minDate: "today",
                dateFormat: "Y-m-d",
                appendTo: document.getElementById("reservationDateDaily").parentNode,
                static: true,
                position: "below",
            });

            flatpickr("#reservationDateMonthly", {
                minDate: "today",
                dateFormat: "Y-m-d",
                appendTo: document.getElementById("reservationDateMonthly").parentNode,
                static: true,
                position: "below",
            });
        }

        // Call setupFlatpickr function when the document is fully loaded
        document.addEventListener("DOMContentLoaded", function () {
            setupFlatpickr();
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
                    <a href="<?php echo URLROOT; ?>/employees/viewMonthlyPayments">
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

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>


    <div class="main-content">
        <div class="container">
            <div class="topic-content">
                <h2>Edit Monthly Reservation</h2>
            </div>
            <div class="form-box">
            <?php if (flash('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo flash('error'); ?>
                        </div>
                    <?php endif; ?>
                <form action="<?php echo URLROOT; ?>/employees/updateMonthlyReservation" method="post"
                    class="input-group" id="Daily">
                    <input type="hidden" name="MReservationID"
                        value="<?php echo $data['reservation']->MReservationID; ?>">
                    <div class="column">
                        <section class="section">
                            <!-- Updated structure: label followed by the dropdown -->
                            <span class="dropdown-topic"><label class="topic" for="schedule">Schedule
                                    Type</label></span></br>
                            <select name="schedule" id="schedule" class="schedule" onchange="changeRoute()">
                                <option disabled selected>Select Type...</option>
                                <option value="ToWork" <?php echo ($data['reservation']->ScheduleType == 'ToWork') ? 'selected' : ''; ?>>To work</option>
                                <option value="FromWork" <?php echo ($data['reservation']->ScheduleType == 'FromWork') ? 'selected' : ''; ?>>From work</option>
                                <option value="BothWays" <?php echo ($data['reservation']->ScheduleType == 'BothWays') ? 'selected' : ''; ?>>Both ways</option>
                            </select>
                        </section>


                        <section class="section"></br>
                            <span class="dropdown-topic"><label class="topic" for="schedule">Route</label></span>
                            <select name="route" id="route" class="route">
                                <option disabled selected>Select Route...</option>
                                <option value="Nugegoda" <?php echo ($data['reservation']->Route == 'Nugegoda') ? 'selected' : ''; ?>>Nugegoda</option>
                                <option value="Kaluthara" <?php echo ($data['reservation']->Route == 'Kaluthara') ? 'selected' : ''; ?>>Kaluthara</option>
                                <option value="Gampaha" <?php echo ($data['reservation']->Route == 'Gampaha') ? 'selected' : ''; ?>>Gampaha</option>
                                <option value="Awissawella" <?php echo ($data['reservation']->Route == 'Awissawella') ? 'selected' : ''; ?>>Awissawella</option>
                            </select>
                        </section>
                    </div>
                    <div class="column">
                        <section class="section">
                            <span class="date-topic"></span> <label for="reservationStartDate">Reservation Start
                                Date</label></span><br>
                            <div class="date">
                                <input type="date" name="StartDate"
                                    value="<?php echo $data['reservation']->StartDate; ?>">
                            </div>
                        </section>

                        <section class="section">
                            <span class="date-topic"></span> <label for="reservationEndDate">Reservation end
                                Date</label></span><br>
                            <div class="date">
                                <input type="date" name="EndDate" value="<?php echo $data['reservation']->EndDate; ?>">
                            </div>
                        </section>
                    </div>
                    <div class="column">

                    <section class="section" id="pickup" style="<?php echo ($data['reservation']->ScheduleType == 'ToWork') ? 'display:block;' : 'display:none;'; ?>">
    <span class="pickup-topic"></span><label for="pickup">Pick Up</label>
    <div class="pickup">
        <input type="text" id="pickupField" name="pickup" value="<?php echo $data['reservation']->PickUp; ?>">
    </div>
</section>

<section class="section" id="dropoff" style="<?php echo ($data['reservation']->ScheduleType == 'FromWork') ? 'display:block;' : 'display:none;'; ?>">
    <span class="drop-topic"></span><label for="dropoff">Drop Off</label>
    <div class="pickup">
        <input type="text" id="dropoffField" name="dropoff" value="<?php echo $data['reservation']->DropOff; ?>">
    </div>
</section>

                    <div class="column">
                        <section class="section">
                            <div class="submit"><input type="submit" value="Update"></div>
                        </section>
                        <div class="register-link">
                        <a href="<?php echo URLROOT; ?>/employees/viewReservation" class="button">View Transport Reservations</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
</body>

</html>