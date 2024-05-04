<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Salary | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: white;

            .btn-delete i {
            font-size: 1.5em;
            /* Increase the size of the delete icon */
            background-color: transparent;
            /* Remove background color */
            border: none;
            /* Remove border */
            cursor: pointer;
            /* Set cursor to pointer */
        }

        .container {
            margin: 0 auto;
            padding: 20px;
        }

        .wrapper {
            backdrop-filter: blur(5px);
            background-color: rgb(31, 33, 37, 0.4);

            border: 2px solid var(--primary-color-extra-light);

            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: 30px;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }


        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid var(--primary-color-extra-light);
        }

        th {
            background-color: var(--primary-color);
        }


        tbody tr:hover {
            background-color: var(--primary-color-extra-light);

        }

        .button {
            width: 300px;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
        }

        .button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .button.back {
            position: absolute;
            right: 0;
            margin-right: 20px;
            
        }

            /* backdrop-filter: blur(10px) brightness(0.5); */


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
            <a href="<?php echo URLROOT; ?>/drivers/profile/<?= $_SESSION['user_id'] ?>">
                <i class="fas fa-user"></i>
                <span class="icon_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
    </ul>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/drivers/submitLeaveApplication">
            <i class="fa-solid fa-person-walking-arrow-right"></i>
                <span class="icon_name">Leaves</span>
            </a>
            <span class="tooltip">Apply Leaves</span>
        </li>
    </ul>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/drivers/viewSchedule">
            <i class="fa-regular fa-calendar-days"></i>
                <span class="icon_name">Schedule</span>
            </a>
            <span class="tooltip">Schedule</span>
        </li>
    </ul>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/drivers/viewSalary/<?= $_SESSION['user_id'] ?>">
            <i class="fa-solid fa-file-invoice-dollar"></i>
                <span class="icon_name">Salary</span>
            </a>
            <span class="tooltip">Salary Reports</span>
        </li>
    </ul>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/drivers/viewBankDetails">
            <i class="fa-solid fa-money-check-dollar"></i>
                <span class="icon_name">BankDetails</span>
            </a>
            <span class="tooltip">Bank Details</span>
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
            <div class="header">
<h2>Full Day Bookings</h2>
<table border="1">
    <tr>
        <th>Date</th>
        <th>Location</th>
        <th>Number of Passengers</th>
        <th>Driver ID</th>
        <th>Vehicle ID</th>
    </tr>
    <?php foreach ($data['fullDayBookings'] as $booking) : ?>
        <tr>
            <td><?php echo $booking->b_date; ?></td>
            <td><?php echo $booking->location; ?></td>
            <td><?php echo $booking->no_pas; ?></td>
            <td><?php echo $booking->driver_id; ?></td>
            <td><?php echo $booking->vehicle_id; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Timetable Details Table -->
<h2>Timetable Details</h2>
<table border="1">
    <tr>
        <th>Day</th>
        <th>Time Slot</th>
        <th>Activity</th>
        <th>Driver ID</th>
        <th>Vehicle ID</th>
        <th>Date</th>
    </tr>
    <?php foreach ($data['timetableDetails'] as $detail) : ?>
        <tr>
            <td><?php echo $detail->day; ?></td>
            <td><?php echo $detail->time_slot; ?></td>
            <td><?php echo $detail->activity; ?></td>
            <td><?php echo $detail->driver_id; ?></td>
            <td><?php echo $detail->vehicle_id; ?></td>
            <td><?php echo $detail->date; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function () {
        sidebar.classList.toggle("active");
    };
</script>

</html>

