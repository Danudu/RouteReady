<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title>Edit WorkTrips | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">

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
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
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
            margin-bottom: 10px;
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

        .submit input[type="submit"] {
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

        .submit input[type="submit"]:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
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

        .comments textarea {
            height: 120px;
            /* Adjust the height as needed */
            resize: vertical;
            /* Allow vertical resizing */
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


        document.addEventListener('DOMContentLoaded', function () {
    // Retrieve the value of tripTime from the server
    const tripTimeValue = "<?php echo $data['workTrip']->tripTime; ?>";

    // Set the value of the tripTime input field
    document.getElementById('tripTime').value = tripTimeValue;
});

    </script>


<div class="main-content">
    <div class="container">
        <h2>Edit Work Trip Reservation</h2>
        <?php if (flash('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo flash('error'); ?>
                        </div>
                    <?php endif; ?>
        <div class="form-box">
            <form action="<?php echo URLROOT; ?>/employees/updateWorkTripReservation" method="post" class="input-group">
                <input type="hidden" name="tripID" value="<?php echo $data['workTrip']->tripID; ?>">
                <div class="column">
                    <section class="section">
                        <label for="e_name">Employee Name:</label>
                        <div class="employee-name">
                            <input type="text" id="employee_name" name="employee_name" value="<?php echo $data['workTrip']->employee_name; ?>" readonly>
                        </div>
                    </section>

                    <section class="section">
                        <label for="email">Email Address:</label>
                        <div class="pickup">
                            <input type="text" id="email" name="email" value="<?php echo $data['workTrip']->email; ?>" readonly>
                        </div>
                    </section>

                    <section class="section">
                        <label for="reason">Reason for Vehicle use:</label>
                        <div class="date">
                            <input type="text" id="reason" name="reason" value="<?php echo $data['workTrip']->reason; ?>">
                        </div>
                    </section>

                    <section class="section">
                        <label for="p_no">Number of Passengers:</label>
                        <div class="route">
                            <input type="number" id="numofPassengers" name="numofPassengers" value="<?php echo $data['workTrip']->numofPassengers; ?>">
                        </div>
                    </section>

                    <section class="section">
                        <label for="comments">Comments or Special Requests:</label>
                        <div class="comments">
                            <textarea id="comments" name="comments"><?php echo $data['workTrip']->comments; ?></textarea>
                        </div>
                    </section>
                </div>


                <div class="column">
                    <section class="section">
                        <label for="des">Destination:</label>
                        <div class="pickup">
                            <input type="text" id="destination" name="destination" value="<?php echo $data['workTrip']->destination; ?>">
                        </div>
                    </section>

                    <section class="section">
    <label for="tripdate">Select Date:</label>
    <input type="text" id="tripDate" name="tripDate" value="<?php echo $data['workTrip']->tripDate; ?>">
</section>


<section class="section">
    <label for="triptime">Select Time:</label>
    <div class="dropoff">
        <input type="time" id="tripTime" name="tripTime" value="<?php echo $data['workTrip']->tripTime; ?>" style="color:aliceblue">
        
        <select id="ampm" name="ampm">
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
    </div>
</section>


                    <section class="section">
                        <div class="submit"><input type="submit" value="Update"></div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

document.addEventListener("DOMContentLoaded", function () {
    setupFlatpickr(); // Call the setupFlatpickr function when the document is fully loaded
});

function setupFlatpickr() {
    var today = new Date();
    var tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1); // Get tomorrow's date

    // Set up Flatpickr with default date as tomorrow and minDate as tomorrow
    flatpickr("#tripDate", {
        defaultDate: '<?php echo $data['workTrip']->tripDate; ?>',
        minDate: tomorrow,
        dateFormat: "Y-m-d", // You can change the date format as needed
        static: true,
        position: "below"
    });
}

document.addEventListener('DOMContentLoaded', function () {
    // Retrieve the value of tripTime from the server
    const tripTimeValue = "<?php echo $data['workTrip']->tripTime; ?>";

    // Set the value of the tripTime input field
    document.getElementById('tripTime').value = tripTimeValue;
});


</script>

</body>
</html>