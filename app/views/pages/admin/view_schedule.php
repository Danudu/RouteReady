<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <style>
        .cell.with-data {
            background-color: yellow; /* Choose your desired highlight color */
        }

        /* Add your CSS styles here */
        .timetable {
            display: grid;
            grid-template-columns: repeat(8, 1fr); /* 7 days + 1 for time slots */
            grid-template-rows: repeat(13, 1fr); /* 12 vertical rows + 1 for header */
            gap: 2px;
        }

        .cell {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
            min-width: 100px; /* Adjust based on your content */
        }

        .day-header {
            background-color: black; /* Set the background color of the day of the week row */
            color: white; /* Set the text color of the day of the week row */
        }

        .time-slot {
            background-color: #888; /* Set the background color of the time slot columns */
            color: white; /* Set the text color of the time slot columns */
        }
        .form {
            text-align: center;
            margin-top: 20px;
        }
        .form-container {
            width: 30%; 
            margin: 0 auto;
            border: 2px solid #ccc; 
            padding: 20px; /* Padding inside the container */
            box-sizing: border-box; /* Include padding and border in the width calculation */
        }
        .button-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;"> Schedule </h1>
    <div class="button-container">
        <label for="week"><h2>For The Week:</h2></label>
        <input type="week" name="week" id="week" onchange="updateDateInput()">
        <br>
        
    
    <br>
    
        <a href="<?php echo URLROOT; ?>/admins/viewFullDayBooking" class="button">View Full Day Booking</a>
    
        </div>
    <h2 style="text-align: center;">Short-Term Reservation</h2>

    <div class="form-container">

        <form method="post" action="<?php echo URLROOT; ?>/admins/redirectToTimetable">
            <label for="b_date">Date:</label>
            <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required><br><br>

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

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

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
$password = "root";
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
            <div class='cell with-data'>
                Records: <?php echo $count; ?><br>
                <a href="<?php echo URLROOT; ?>/admins/timetable_view" class="button">View</a>
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
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        }
        $connection->close(); // Close the database connection here
        ?>
        <!-- End of row -->
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
            return `${year}-${month}-${day}`;
        }
        document.getElementById('viewAvailableVehicles').addEventListener('click', function() {
        // Fetch available vehicles from the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
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
</body>
</html>
