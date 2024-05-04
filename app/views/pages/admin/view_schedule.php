<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/content.css">
    <title>Schedule | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        body {
            background-image: url('http://localhost/RouteReady/public/img/pic5.jpg');
            background-size: cover;
            color: white;

        }

        .cell.with-data {
            background-color: yellow;
        }

        .timetable {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            grid-template-rows: repeat(13, 1fr);
            gap: 2px;
        }

        .cell {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
            min-width: 100px;
        }

        .day-header {
            background-color: black;
            color: white;
        }

        .time-slot {
            background-color: #888;
            color: white;
        }

        .form {
            text-align: center;
            margin-top: 20px;
        }

        .form-container {
            width: 30%;
            margin: 0 auto;
            border: 2px solid #ccc;
            padding: 20px;
            box-sizing: border-box;
        }

        .button-container {
            text-align: center;
        }

        /* Input Styles */
        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
            color: #333;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 20px;
            /* Adjust as needed */
        }

        input[type="week"] {
            width: 25%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
            color: #333;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 20px;
        }

        /* Input Focus Styles */
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
            /* Adjust color as needed */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            /* Adjust shadow as needed */
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
            /* transition: background-color 0.3s, box-shadow 0.3s, color 0.3s; */
            margin-top: 20px;
            /* Added margin top */
            background-color: white;
            color: black;
            border: 1px solid black;
        }

        .button-container a,
        .form-container a {
            color: white;
            text-decoration: underline;

        }

        .back-button {
            position: absolute;
            right: 20px;
            width: 25%;
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

        .button.back {
            position: absolute;
            right: 0;
            margin-right: 20px;
            width: 20%;

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
                        <i class="fa-solid fa-house"></i>
                        <span class="icon_name">Home</span>
                    </a>
                    <span class="tooltip">HomePage</span>
                </li>
            </ul>
            <!-- <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/hrmanagers/dashboard">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="icon_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
            </ul> -->
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
                    <a href="<?php echo URLROOT; ?>/admins/addVehicles">
                        <i class="fa-solid fa-van-shuttle"></i>
                        <span class="icon_name">Vehicle</span>
                    </a>
                    <span class="tooltip">Vehicle</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/redirectToTimetable">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span class="icon_name"> Schedule</span>
                    </a>
                    <span class="tooltip">Schedule</span>
                </li>
            </ul>



            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/handleFormSubmission">
                        <i class="fa-solid fa-comments-dollar"></i>
                        <span class="icon_name">ODSalary</span>
                    </a>
                    <span class="tooltip">ODSalary</span>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/viewhr">
                        <i class="fas fa-users"></i>
                        <span class="icon_name">HRManager</span>
                    </a>
                    <span class="tooltip">HRManger</span>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/viewPendingWorkTrips">
                        <i class="fa-solid fa-suitcase-rolling"></i>
                        <span class="icon_name">WorkTrips</span>
                    </a>
                    <span class="tooltip">WorkTrips</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/leaves_admin">
                        <i class="fa-solid fa-plus-minus"></i>
                        <span class="icon_name">Leaves</span>
                    </a>
                    <span class="tooltip">Leaves</span>
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
    <div class="background">
        <div class="main-content">
            <div class="container">
                <div class="wrapper">
                    </br>
                    </br>
                    <h2 class="topic" style="text-align: center;"> Schedule For the week:</h2>
                    <div class="button-container">

                        <input type="week" name="week" id="week" onchange="updateDateInput()">
                        <br>
                        <br>
                        <a href="<?php echo URLROOT; ?>/admins/viewFullDayBooking">View Full Day Booking</a></br>
                    </div>
                    </br>
                    </br>
                    <h3 style="text-align: center;">Short-Term Reservation</h3></br>

                    <div class="form-container">

                        <form method="post" action="<?php echo URLROOT; ?>/admins/redirectToTimetable">
                            <label for="b_date">Date:</label>
                            <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>"
                                required><br><br>

                            <label for="day">Select Day:</label>
                            <select name="day" id="day">
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select><br><br>

                            <label for="time_slot">Select Time Slot:</label>
                            <select name="time_slot" id="time_slot">
                                <?php
                                $timeSlots = array(
                                    "6:00 AM - 8:00 AM",
                                    "8:00 AM - 10:00 AM",
                                    "10:00 AM - 12:00 NOON",
                                    "12:00 NOON - 2:00 PM",
                                    "2:00 PM - 4:00 PM",
                                    "4:00 PM - 6:00 PM",
                                    "6:00 PM - 8:00 PM",
                                    "8:00 PM - 10:00 PM",
                                    "10:00 PM - 12:00 PM"
                                );

                                foreach ($timeSlots as $slot) {
                                    echo "<option value='$slot'>$slot</option>";
                                }
                                ?>
                            </select><br><br>

                            <label for="activity">Activity:</label>
                            <input type="text" name="activity" id="activity"><br><br>
                            <label for="driver_id">Driver ID:</label>
                            <input type="text" name="driver_id" id="driver_id"><br><br>
                            <label for="vehicle_id">Vehicle ID:</label>
                            <input type="text" name="vehicle_id" id="vehicle_id"><br><br>
                            <a href="<?php echo URLROOT; ?>/admins/availableVehicles/<?php echo date('Y-m-d'); ?>">View
                                Available Vehicles</a><br><br>

                            <input type="submit" name="submit" value="Submit">
                        </form>
                    </div>
                </div>

                </br>
                </br>

                <h2 style="text-align: center;">Schedule Time Table</h2>

                <div class="timetable">
                    <!-- Header -->
                    <div class="cell day-header"></div>
                    <div class="cell day-header">Monday</div>
                    <div class="cell day-header">Tuesday</div>
                    <div class="cell day-header">Wednesday</div>
                    <div class="cell day-header">Thursday</div>
                    <div class="cell day-header">Friday</div>
                    <div class="cell day-header">Saturday</div>
                    <div class="cell day-header">Sunday</div>

                    <!-- Time slots -->
                    <?php
                    // Establish database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "routeready_db";

                    $connection = new mysqli($servername, $username, $password, $database);

                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }

                    // Define time slots
                    $timeSlots = array(
                        "6:00 AM - 8:00 AM",
                        "8:00 AM - 10:00 AM",
                        "10:00 AM - 12:00 NOON",
                        "12:00 NOON - 2:00 PM",
                        "2:00 PM - 4:00 PM",
                        "4:00 PM - 6:00 PM",
                        "6:00 PM - 8:00 PM",
                        "8:00 PM - 10:00 PM",
                        "10:00 PM - 12:00 PM"
                    );
                    ?>


                    <?php foreach ($timeSlots as $slot): ?>
                        <div class='cell time-slot'><?php echo $slot; ?></div>

                        <?php foreach (array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday") as $day): ?>
                            <?php
                            // Fetch number of records for the current day and time slot from the database
                            $sql = "SELECT COUNT(*) AS count FROM timetable WHERE day = '$day' AND time_slot = '$slot'";
                            $result = $connection->query($sql);
                            $count = ($result->num_rows > 0) ? $result->fetch_assoc()['count'] : 0;
                            ?>
                            <!-- Display the number of records and view button if there's at least one record, otherwise display an empty cell -->
                            <?php if ($count > 0): ?>
                                <div class='cell with-data' style="color:black ">
                                    Records: <?php echo $count; ?><br>
                                    <td><a
                                            href="<?php echo URLROOT ?>/admins/timetable_view/<?php echo $day ?>/<?php echo $slot ?>">View
                                            More</a></td>
                                </div>
                            <?php else: ?>
                                <div class='cell'></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                    <?php
                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Collect form data
                        $date = isset($_POST['date']) ? $_POST['date'] : ''; // Check if date is set, otherwise assign an empty string
                        $day = $_POST['day'];
                        $time_slot = $_POST['time_slot'];
                        $activity = $_POST['activity'];
                        $driver_id = $_POST['driver_id'];
                        $vehicle_id = $_POST['vehicle_id'];

                        // Insert data into the database
                        $sql = "INSERT INTO timetable (date, day, time_slot, activity, driver_id, vehicle_id) 
                    VALUES ('$date', '$day', '$time_slot', '$activity', '$driver_id', '$vehicle_id')";

                        if ($connection->query($sql) === TRUE) {
                            echo "New record created successfully";
                            // Redirect to prevent form resubmission
                            header("Location: <?php echo URLROOT; ?>/admins/timetable_view/<?php echo $day ?>/<?php echo $slot ?>");
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . $connection->error;
                        }
                    }
                    $connection->close(); // Close the database connection here
                    ?>
                    <!-- End of row -->
                </div>

            </div>
        </div>
    </div>

    </div>

    <script>

        function viewTimetable(day, timeSlot) {
            window.location.href = 'timetable_view.php?day=' + encodeURIComponent(day) + '&time_slot=' + encodeURIComponent(timeSlot);
        }

        // Function to update the date input field based on the selected week
        function updateDateInput() {
            var weekInput = document.getElementById('week');
            var dateInput = document.getElementById('date');
            var selectedWeek = weekInput.value;

            // Extract year and week number from the input value
            var year = parseInt(selectedWeek.substring(0, 4));
            var weekNumber = parseInt(selectedWeek.substring(6));

            // Calculate the start and end dates of the selected week
            var startDate = getStartDateOfWeek(year, weekNumber);
            var endDate = new Date(startDate);
            endDate.setDate(startDate.getDate() + 6);

            // Clear previous options
            dateInput.innerHTML = '';

            // Update the options of the date select element
            var currentDate = new Date(startDate);
            while (currentDate <= endDate) {
                var dayOption = document.createElement('option');
                dayOption.value = formatDate(currentDate);
                dayOption.text = formatDate(currentDate);
                dateInput.appendChild(dayOption);
                currentDate.setDate(currentDate.getDate() + 1); // Increment date by 1 day
            }

            // Call updateDayInput to set the initial day based on the default week selection
            updateDayInput();
        }

        // Call the function initially to set the initial date range
        updateDateInput();

        // Function to get the start date of the week
        function getStartDateOfWeek(year, weekNumber) {
            var januaryFirst = new Date(year, 0, 1);
            var firstDayOfYear = januaryFirst.getDay();
            var daysToAdd = (weekNumber - 1) * 7 - firstDayOfYear + 1;
            return new Date(year, 0, daysToAdd);
        }

        // Function to update the day input field based on the selected date
        function updateDayInput() {
            var dateInput = document.getElementById('date');
            var dayInput = document.getElementById('day');
            var selectedDate = new Date(dateInput.value);
            var daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var selectedDay = daysOfWeek[selectedDate.getDay()];
            dayInput.value = selectedDay;
        }

        // Event listener to update day input field when the date selection changes
        document.getElementById('date').addEventListener('change', updateDayInput);

        // Function to format date as YYYY-MM-DD
        function formatDate(date) {
            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var day = date.getDate().toString().padStart(2, '0');
            return { $year } - { $month } - { $day };
        }
        document.getElementById('viewAvailableVehicles').addEventListener('click', function () {
            // Fetch available vehicles from the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Replace the content of a div with the response from the server
                        document.getElementById('availableVehicles').innerHTML = xhr.responseText;
                    } else {
                        // Handle error
                        console.error('Failed to fetch available vehicles');
                    }
                }
            };
            xhr.open('GET', '<?php echo URLROOT; ?>/admins/viewAvailableVehicles', true);
            xhr.send();
        });
        function redirectToViewSchedule(day, slot) {
            window.location.href = '<?php echo URLROOT; ?>/admins/viewSchedule?day=' + day + '&timeSlot=' + slot;
        }
    </script>

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>
</body>

</html>