<!DOCTYPE html>
<html lang="en">


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

    <style>
       @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");


.background {
    background-image: url(http://localhost:8888/RouteReady/public/img/pic5.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;


}

        .main-content {
            padding: 50px 0;
            backdrop-filter: blur(10px) brightness(0.8);
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .wrapper {
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            max-width: 800px;
            margin: auto;
            width: 800px;
        }

        h1 {
            color: var(--white);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: var(--white);
            font-weight: 600;
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

        .input-box textarea {
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
    </script>
    <div class="background">
        <div class="main-content">
            <div class="container">
                <div class="wrapper">
                    <h1>Work Trip Reservation</h1>
                    <?php if (flash('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo flash('error'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo URLROOT; ?>/employees/makeWorkTrip" method="post">
                    <div class="form-group">
    <label for="e_name">Employee Name:</label>
    <input type="text" id="e_name" name="e_name" placeholder="Employee Name" value="<?php echo $_SESSION['user_name']; ?>" readonly>
</div>
<div class="form-group">
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $_SESSION['user_email']; ?>" readonly>
</div>

                        <div class="form-group">
                            <label for="reason">Reason for Vehicle use:</label>
                            <input type="text" id="reason" name="reason" placeholder="Reason for Vehicle use"> 
                        </div>
                        <div class="form-group">
                            <label for="p_no">Number of Passengers:</label>
                            <input type="number" id="p_no" name="p_no" placeholder="Number of Passengers">
                        </div>
                        <div class="form-group">
                            <label for="comments">Comments or Special Requests:</label>
                            <div class="input-box">
                                <textarea id="comments" name="comments" placeholder="Comments or Special Requests">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="des">Destination:</label>
                            <input type="text" id="des" name="des" placeholder="Destination">
                        </div>
                        <div class="form-group">
                            <label for="tripdate">Select Date:</label>
                            <input type="date" id="tripdate" name="tripdate">
                        </div>
                        <div class="form-group">
                            <label for="triptime">Select Time:</label>
                            <input type="time" id="tripTime" name="triptime" style="color:aliceblue">
                            <select id="ampm" name="ampm">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                        <input type="submit" value="Reserve" class="button">
                    </form>
                    <div class="register-link">
                        <a href="<?php echo URLROOT; ?>/employees/viewWorkTrips" class="button">View Work Trips</a>
                    </div>
                </div>
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
    var tomorrowString = tomorrow.toISOString().split('T')[0];

    

    // Set up Flatpickr with default date as tomorrow and minDate as tomorrow
    flatpickr("#tripdate", {
        defaultDate: tomorrow,
        minDate: tomorrow,
        dateFormat: "Y-m-d", // You can change the date format as needed
        static: true,
        position: "below"
    });
}



</script>

</body>

</html>