<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Day Booking</title>
    <style>
        /* Provided CSS styles */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

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
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 20px;
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 20px;
        }

        input[type="submit"]:hover,
        .button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }
    </style>
</head>
<body class="background">
    <div class="main-content">
    <div>
         <a href="<?php echo URLROOT; ?>/admins/redirectToTimetable" class="btn">Go To Schedule Page</a>
        
</div>
<div>
         <a href="<?php echo URLROOT; ?>/admins/showTimetable" class="btn">View Bookings</a>
        
</div>
        <div class="container">
            <div class="wrapper">
                <h1>Full Day Booking</h1>
                <form method="post" action="<?php echo URLROOT ?>/admins/viewFullDayBooking">
                    <div class="form-group">
                        <label for="b_date">Date:</label>
                        <input type="date" id="b_date" name="b_date" min="<?php echo date('Y-m-d'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="location">Destination:</label>
                        <input type="text" id="location" name="location" required>
                    </div>

                    <div class="form-group">
                        <label for="no_pas">Number of Passengers:</label>
                        <input type="number" id="no_pas" name="no_pas" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="driver_id">Driver ID:</label>
                        <input type="text" id="driver_id" name="driver_id" required>
                    </div>

                    <div class="form-group">
                        <label for="vehicle_id">Vehicle ID:</label>
                        <input type="text" id="vehicle_id" name="vehicle_id" required>
                    </div>

                    <input type="submit" value="Submit" class="button">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
