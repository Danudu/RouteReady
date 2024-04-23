<html>
<title>Make Reservation | RouteReady</title>
<link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Reservation.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    function changeRoute() {
        var schedule = document.getElementById("schedule").value;
        var pickup = document.getElementById("pickup");
        var dropoff = document.getElementById("dropoff");

        if (schedule == "ToWork") {
            pickup.style.display = "block";
            dropoff.style.display = "none";
        } else if (schedule == "FromWork") {
            pickup.style.display = "none";
            dropoff.style.display = "block";
        } else {
            pickup.style.display = "block";
            dropoff.style.display = "block";
        }
    }

    function changeRouteMonthly() {
        var schedule = document.getElementById("monthly_schedule").value;
        var monthly_pickup = document.getElementById("monthly_pickup");
        var monthly_dropoff = document.getElementById("monthly_dropoff");

        if (schedule == "ToWork") {
            monthly_pickup.style.display = "block";
            monthly_dropoff.style.display = "none";
        } else if (schedule == "FromWork") {
            monthly_pickup.style.display = "none";
            monthly_dropoff.style.display = "block";
        } else {
            monthly_pickup.style.display = "block";
            monthly_dropoff.style.display = "block";
        }

    }
    // Call setupFlatpickr function when the document is fully loaded
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
                <h2>Transport Reservation</h2>
            </div>

            <?php if (flash('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo flash('error'); ?>
                </div>
            <?php endif; ?>


            <div class="form-box">

                <div class="button-box">
                    <div class="btn" id="button"></div>
                    <input type="hidden" name="reservation_type" id="reservation_type" value="">
                    <button type="button" class="toggle-btn" onclick="daily()">Daily Reservations</button>
                    <button type="button" class="toggle-btn" onclick="monthly()">Monthly Reservations</button>
                </div>


                <form id="Daily" action="<?php echo URLROOT; ?>/employees/makeReservation" method="post"
                    class="input-group">
                    <div class="column">
                        <section class="section">
                            <!-- Updated structure: label followed by the dropdown -->
                            <span class="dropdown-topic"><label class="topic" for="schedule">Schedule
                                    Type</label></span></br>
                            <select name="schedule" id="schedule" class="schedule" onchange="changeRoute()"
                                value="<?php echo $data['scheduleType']; ?>">
                                <option value="Select">Select</option>
                                <option value="ToWork">To work</option>
                                <option value="FromWork">From work</option>
                                <option value="BothWays">Both ways</option>
                            </select>
                        </section>




                        <section class="section"></br>
                            <span class="dropdown-topic"><label class="topic">Route</label></span>
                            <select name="route" class="route" value="<?php echo $data['route']; ?>">
                                <option value="Nugegoda">Nugegoda</option>
                                <option value="Kaluthara">Kaluthara</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Awissawella">Awissawella</option>
                            </select>
                        </section>
                    </div>

                    <div class="column">
                        <section class="section">
                            <span class="date-topic"></span> <label for="reservationDate">Reservation
                                Date</label></span><br>
                            <div class="date">
                                <input type="text" id="reservationDateDaily" name="Date" placeholder="reservation Date"
                                    readonly>
                            </div>
                        </section>

                        <section class="section" id="pickup">
                            <span class="pickup-topic"></span><label for="pickup">Pick Up</label>
                            <div class="pickup"> <input type="text" id="pickup" name="pickup"
                                    placeholder="Enter pickup city" value="<?php echo $data['pickup']; ?>"></div>
                        </section>
                    </div>

                    <div class="column">
                        <section class="section" id="dropoff">
                            <span class="drop-topic"></span><label for="dropoff">Drop Off</label>
                            <div class="pickup"> <input type="text" id="dropoff" name="dropoff"
                                    placeholder="Enter drop off city" value="<?php echo $data['dropoff']; ?>"></div>
                        </section>
                    </div>

                    <div class="column">
                        <section class="section">
                            <div class="submit"><input type="submit" value="Reserve"></div>
                        </section>
                    </div>
                </form>



                <form id="Monthly" action="<?php echo URLROOT; ?>/employees/monthlyMakeReservation" method="post"
                    class="input-group">
                    <div class="column">
                        <section class="section">
                            <label class="topic" for="monthly_schedule">Schedule Type</label></br>
                            <select name="schedule" id="monthly_schedule" class="schedule"
                                onchange="changeRouteMonthly()" value="<?php echo $data['scheduleType']; ?>">
                                <option value="Select">Select</option>
                                <option value="ToWork">To work</option>
                                <option value="FromWork">From work</option>
                                <option value="BothWays">Both ways</option>
                            </select>
                        </section>

                        <section class="section">
                            <span class="dropdown-topic"><label class="topic">Route</label></span>
                            <div class="dropdown"></br>
                                <select name="route" class="route" value="<?php echo $data['route']; ?>">
                                    <option value="Nugegoda">Nugegoda</option>
                                    <option value="Kaluthara">Kaluthara</option>
                                    <option value="Gampaha">Gampaha</option>
                                    <option value="Awissawella">Awissawella</option>
                                </select>
                            </div>
                        </section>
                    </div>

                    <div class="column">
                        <section class="section">
                            <span class="date-topic"></span> <label for="reservationStartDate">Reservation Start
                                Date</label></span><br>
                            <div class="date">
                                <input type="date" id="reservationStartDate" name="StartDate"
                                    placeholder="Reservation Start Date">
                            </div>
                        </section>

                        <section class="section">
                            <span class="date-topic"></span> <label for="reservationEndDate">Reservation End
                                Date</label></span><br>
                            <div class="date">
                                <input type="date" id="reservationEndDate" name="EndDate"
                                    placeholder="Reservation End Date">
                            </div>
                        </section>
                    </div>
                    <div class="column">
                        <section class="section" id="monthly_pickup">
                            <span class="pickup-topic"></span><label for="monthly_pickup">Pick Up</label>
                            <div class="pickup"> <input type="text" id="monthly_pickup" name="pickup"
                                    placeholder="Enter pickup city" value="<?php echo $data['pickup']; ?>"></div>
                        </section>

                        <section class="section" id="monthly_dropoff">
                            <span class="drop-topic"></span><label for="monthly_dropoff">Drop Off</label>
                            <div class="pickup"> <input type="text" id="monthly_dropoff" name="dropoff"
                                    placeholder="Enter drop off city" value="<?php echo $data['dropoff']; ?>"></div>
                        </section>
                    </div>

                    <div class="column">
                        <section class="section">
                            <div class="submit"><input type="submit" value="Reserve"></div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        daily(); // Call the daily function to set the initial state
    });

    var dailyForm = document.getElementById("Daily");
    var monthlyForm = document.getElementById("Monthly");
    var button = document.getElementById("button");

    function daily() {
        dailyForm.style.display = "block";
        monthlyForm.style.display = "none";
        button.style.left = "0";
    }

    function monthly() {
        dailyForm.style.display = "none";
        monthlyForm.style.display = "block";
        button.style.left = "110px";
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