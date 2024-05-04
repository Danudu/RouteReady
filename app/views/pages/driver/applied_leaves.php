<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title>Applied Leaves | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        body {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .wrapper {
            background-color: rgba(1,1,1,1);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: auto;
            margin-top: 30px;
            margin-left: 30px;
            margin-right: 30px;
        }

        .button {
            width: 150px;
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

        /* Your existing table styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(0,0,0,1);
            padding: 20px;
            border-radius: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #333;
            color: white;
            text-align: left;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table td a {
            color: white;
            text-decoration: none;
            padding: 5px;
        }

        .table td a:hover {
            background-color: #555;
            border-radius: 3px;
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
            <!-- <ul>
                <li id="showPopup">
                    <a href="#" onclick="event.preventDefault();" id="showPopup">
                        <i class="fas fa-book-bookmark"></i>
                        <span class="icon_name">T&C</span>
                    </a>
                    <span class="tooltip">Terms & Conditions</span>
                </li>
            </ul> -->
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
            <div class="wrapper">
                <h2>Applied Leaves</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Leave ID</th>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Number of Days</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['appliedLeaves'] as $leave): ?>
                            <tr>
                                <td><?php echo $leave->leave_id; ?></td>
                                <td><?php echo $leave->type; ?></td>
                                <td><?php echo $leave->std_date; ?></td>
                                <td><?php echo $leave->end_date; ?></td>
                                <td><?php echo $leave->no_of_days; ?></td>
                                <td><?php echo $leave->reason; ?></td>
                                <td><?php echo ($leave->status == 0) ? 'Pending' : (($leave->status == 1) ? 'Approved' : 'Rejected'); ?>
                                </td>
                                <td><a
                                        href="<?php echo URLROOT; ?>/drivers/updateLeaveApplication/<?php echo $leave->leave_id; ?>"><i
                                            class="fas fa-pencil-alt" style="color: white;"></i></a></td>
                                <td><a
                                        href="<?php echo URLROOT; ?>/drivers/deleteLeaveApplication/<?php echo $leave->leave_id; ?>"><i
                                            class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- back button -->
                <a href="<?php echo URLROOT; ?>/drivers/home" class="button">Back</a>
            </div>

        </div>
    </div>
</body>

</html>
