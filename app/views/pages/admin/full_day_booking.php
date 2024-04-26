<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Day Booking</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div>
         <a href="<?php echo URLROOT; ?>/admins/redirectToTimetable" class="btn">Go To Schedule Page</a>
        
</div>
<div>
         <a href="<?php echo URLROOT; ?>/admins/showTimetable" class="btn">View Bookings</a>
        
</div>
    <h2>Full Day Booking</h2>
    <form method="post" action="<?php echo URLROOT ?>/admins/viewFullDayBooking">
        <label for="b_date">Date:</label>
        <input type="date" id="b_date" name="b_date" min="<?php echo date('Y-m-d'); ?>" required><br><br>

        <label for="location">Destination:</label>
        <input type="text" id="location" name="location" required><br><br>

        <label for="no_pas">Number of Passengers:</label>
        <input type="number" id="no_pas" name="no_pas" min="1" required><br><br>

        <label for="driver_id">Driver ID:</label>
        <input type="text" id="driver_id" name="driver_id" required><br><br>

        <label for="driver_id">Vehicle ID:</label>
        <input type="text" id="vehicle_id" name="vehicle_id" required><br><br>

        <input type="submit" value="Submit">
    </form>
    <script>
        // Block past dates in the date input field
        var today = new Date().toISOString().split('T')[0];
        document.getElementById("b_date").setAttribute('min', today);
    </script>

 
</body>
</html>
