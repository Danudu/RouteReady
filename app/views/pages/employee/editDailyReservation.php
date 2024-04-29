<?php
// Define function to determine class based on schedule type
function getClassBasedOnSchedule($currentType, $expectedType) {
    return ($currentType == $expectedType) ? '' : 'hidden';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">

    <title>Edit Daily Reservations | RouteReady</title>
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
        document.addEventListener("DOMContentLoaded", function () {
        setupFlatpickr();
    });


    function checkReservationAvailability() {
        var route = document.getElementById("route").value;
        var date = document.getElementById("reservationDateDaily").value;

        // Send AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo URLROOT; ?>/employees/checkReservationAvailability", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onload = function () {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                var errorDiv = document.getElementById("error");
                if (response.error) {
                    // Display error message
                    errorDiv.innerText = response.error;
                    errorDiv.style.display = "block"; // Show the error message
                } else {
                    // No error, submit the form
                    errorDiv.style.display = "none"; // Hide the error message
                    document.getElementById("Daily").submit();
                }
            }
        };
        xhr.send(JSON.stringify({ route: route, date: date }));
    }

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

    <div class="main-content">
        <div class="container">
            <div class="topic-content">
                <h2>Edit Daily Reservation</h2>
            </div>
            <div class="form-box">
            <?php if (flash('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo flash('error'); ?>
                        </div>
                    <?php endif; ?>
                <form action="<?php echo URLROOT; ?>/employees/updateDailyReservation" method="post" class="input-group"
                    id="Daily">
                    <input type="hidden" name="ReservationID"
                        value="<?php echo $data['reservation']->ReservationID; ?>">
                    <div class="column">
                        <section class="section">
                            <span class="dropdown-topic"><label class="topic" for="schedule">Schedule
                                    Type</label></span><br>
                            <select name="schedule" id="schedule" class="schedule" onchange="changeRoute()">
                                <option disabled selected>Select Type ...</option>
                                <option value="ToWork" <?php echo ($data['reservation']->ScheduleType == 'ToWork') ? 'selected' : ''; ?>>To work</option>
                                <option value="FromWork" <?php echo ($data['reservation']->ScheduleType == 'FromWork') ? 'selected' : ''; ?>>From work</option>
                                <option value="BothWays" <?php echo ($data['reservation']->ScheduleType == 'BothWays') ? 'selected' : ''; ?>>Both ways</option>
                            </select>
                        </section>

                        <section class="section">
                            <span class="dropdown-topic"><label class="topic" for="schedule">Route</label></span><br>
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
                            <span class="date-topic"></span> <label for="reservationDate">Reservation Date</label><br>
                            <div class="date">
                                <input type="date" name="Date" value="<?php echo $data['reservation']->Date; ?>" readonly>
                            </div>
                        </section>
                        <!-- Update the PHP code to include inline styles based on the schedule type -->
<section class="section" id="pickup" style="<?php echo ($data['reservation']->ScheduleType == 'ToWork') ? 'display:block;' : 'display:none;'; ?>">
    <span class="pickup-topic"></span><label for="pickup">Pick Up</label>
    <div class="pickup">
        <input type="text" id="pickupField" name="pickup" value="<?php echo $data['reservation']->PickUp; ?>">
    </div>
</section>

<section class="section" id="dropoff" style="<?php echo ($data['reservation']->ScheduleType == 'FromWork') ? 'display:block;' : 'display:none;'; ?>">
    <span class="drop-topic"></span><label for="dropoff">Drop Off</label>
    <div class="pickup">
        <input type="text" id="dropoffField"  name="dropoff" value="<?php echo $data['reservation']->DropOff; ?>">
    </div>
</section>

                    </div>
                    <div class="column">
                        <section class="section">
                            <div class="submit"><input type="submit" value="Update"></div>
                        </section>
                      
                    </div>
                    <div class="register-link">
                        <a href="<?php echo URLROOT; ?>/employees/viewReservation" class="button">View Transport Reservations</a>
                    </div>
                </form>
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
    document.addEventListener("DOMContentLoaded", function () {
        daily(); // Call the daily function to set the initial state
    });

    var dailyForm = document.getElementById("Daily");
    var button = document.getElementById("button");

    function daily() {
        dailyForm.style.display = "block";
        monthlyForm.style.display = "none";
        button.style.left = "0";
    }

    document.addEventListener("DOMContentLoaded", function () {
        setupFlatpickr(); // Call the setupFlatpickr function when the document is fully loaded
    });

    document.addEventListener("DOMContentLoaded", function () {
        setupFlatpickr(); // Call the setupFlatpickr function when the document is fully loaded
    });

    function setupFlatpickr() {
        var today = new Date();
        var tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1); // Get tomorrow's date
        var tomorrowString = tomorrow.toISOString().split('T')[0];

        var currentTime = today.getHours(); // Get the current hour

        // If it's after 3 PM, set the default date to tomorrow, else set it to today
        var defaultDate = currentTime >= 15 ? getNextDay(today) : today;

        var defaultDateString = defaultDate.toISOString().split('T')[0];

        var today = new Date();
        var tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1); // Get tomorrow's date
        var end = new Date(today);
        end.setDate(today.getDate() + 30); // Get the date after 30 days


        var tomorrowString = tomorrow.toISOString().split('T')[0]; // Convert tomorrow's date to string
        var endString = end.toISOString().split('T')[0]; // Convert the end date to strin

        var today = new Date();
        var tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1); // Get tomorrow's date
        var end = new Date(today);
        end.setDate(today.getDate() + 30); // Get the date after 30 days

        flatpickr("#reservationDateDaily", {
            defaultDate: tomorrowString, // Set the default date to tomorrow
            dateFormat: "Y-m-d",
            appendTo: document.getElementById("reservationDateDaily").parentNode,
            static: true,
            position: "below",
            minDate: tomorrowString, // Set the minimum date to tomorrow
            maxDate: tomorrowString // Set the maximum date to tomorrow
        });

        flatpickr("#reservationStartDate", {
            defaultDate: tomorrowString, // Set the default start date to tomorrow's date
            dateFormat: "Y-m-d",
            appendTo: document.getElementById("reservationStartDate").parentNode,
            static: true,
            position: "below",
            minDate: tomorrowString, // Set the minimum start date to tomorrow's date
            maxDate: endString, // Set the maximum start date to 30 days from today
        });

        flatpickr("#reservationEndDate", {
            defaultDate: endString, // Set the default end date to 30 days from today
            dateFormat: "Y-m-d",
            appendTo: document.getElementById("reservationEndDate").parentNode,
            static: true,
            position: "below",
            minDate: tomorrowString, // Set the minimum end date to tomorrow's date
            maxDate: endString, // Set the maximum end date to 30 days from today
        });
    }


    function getNextDay(date) {
        var nextDay = new Date(date);
        nextDay.setDate(date.getDate() + 1); // Get the date of the next day
        return nextDay;
    }


</script>

</html>