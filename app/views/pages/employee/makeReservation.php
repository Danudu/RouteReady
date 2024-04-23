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

<style>
    
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

:root {
  --primary-color: #111317;
  --primary-color-light: #1f2125;
  --primary-color-extra-light: #35373b;
  --text-light: #d1d5db;
  --white: #ffffff;
  --max-width: 1200px;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
  }

  .bg__blur {
    position: absolute;
    box-shadow: 0 0 1000px 50px var(--white);
    z-index: -1;
  }
  
body {
    /* font-family: "Poppins", sans-serif; */
    /* background-color: var(--primary-color); */
    background-image: url(http://localhost/RouteReady/public/img/pic3.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 100vh;
    
    /* min-height: 100vh; */
    /* max-height: none; */
    /* display: flex; */
    /* justify-content: center;
    align-items: center;
    min-height: 100vh; */
  }
  
  .container{
    backdrop-filter: blur(10px) brightness(0.3);
    min-height: 100vh;
  }

  .container .form{
    padding-bottom: 30px;
  }
  nav {
    max-width: var(--max-width);
    margin: auto;
    padding: 1rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
  }
  a {
    text-decoration: none;
  }
  .nav__logo {
    max-width: 90px;
    
  }
  
  .nav__logo img {
    width: 75%;
    border-radius: 30%;
  }
  
  .nav__links {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 3rem;
  }
  
  .link a {
    position: relative;
    padding-bottom: 0.75rem;
    color: var(--white);
  }
  
  .link a::after {
    content: "";
    position: absolute;
    height: 2px;
    width: 0;
    left: 0;
    bottom: 0;
    background-color: var(--text-light);
    transition: 0.3s;
  }
  
  .link a:hover::after {
    width: 50%;
  }

.topic-content h2 {
    text-align: center;
    margin-left: 25%;
    color: black;
    font-size: 30px;
}



.flatpickr-calendar {
    font-size: 12px; 
    width: 50px; 
     
}


body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h2 {
    margin-top: 0;
}

.form-box {
    max-width: 600px;
    margin: 50px auto;
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.input-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type="submit"] {
    width: auto;
    padding: 10px 20px;
    font-size: 18px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.input-group .error {
    color: red;
    font-size: 14px;
}


.button-box {
    display: flex;
    margin-bottom: 20px;
}

.toggle-btn {
    flex: 1;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #f4f4f4;
}

.toggle-btn:hover {
    background-color: #ddd;
}

.selected {
    background-color: #007bff;
    color: #fff;
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