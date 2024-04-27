<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/employee/employee.css">
    <title>Home | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
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
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/hrmanagers/dashboard">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="icon_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/pages/profile/<?=$_SESSION['user_id']?>">
                        <i class="fas fa-user"></i>
                        <span class="icon_name">Profile</span>
                    </a>
                    <span class="tooltip">Profile</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/addVehicles">
                        <i class="fas fa-users"></i>
                        <span class="icon_name">Vehicle</span>
                    </a>
                    <span class="tooltip">vehicle</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/hrmanagers/viewDrivers">
                        <i class="fas fa-truck-fast"></i>
                        <span class="icon_name">Drivers</span>
                    </a>
                    <span class="tooltip">Drivers</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/posts/terms">
                        <i class="fas fa-book-bookmark"></i>
                        <span class="icon_name">T&C</span>
                    </a>
                    <span class="tooltip">Terms & Conditions</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/viewPendingWorkTrips">
                        <i class="fas fa-book-bookmark"></i>
                        <span class="icon_name">WorkTrips</span>
                    </a>
                    <span class="tooltip">WorkTrips</span>
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
        <div class="wrapper">
            <div class="container">
                <h2>Pending Work Trip Reservations</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>Reason</th>
                            <th>Number of Passengers</th>
                            <th>Destination</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
    <!-- Loop through pending work trips -->
    <?php foreach ($data['pendingWorkTrips'] as $workTrip) : ?>
        <tr>
            <td><?php echo $workTrip->employee_name; ?></td>
            <td><?php echo $workTrip->email; ?></td>
            <td><?php echo $workTrip->reason; ?></td>
            <td><?php echo $workTrip->numofPassengers; ?></td>
            <td><?php echo $workTrip->destination; ?></td>
            <td><?php echo $workTrip->comments; ?></td>
            
            <td>
                <!-- Add form to approve or reject the work trip -->
                <form action="<?php echo URLROOT; ?>/admins/approveWorkTrip/<?php echo $workTrip->tripID; ?>" method="post">
                    <input type="hidden" name="action" value="approve">
                    <button type="submit" class="button">Approve</button>
                </form>
                <form action="<?php echo URLROOT; ?>/admins/approveWorkTrip/<?php echo $workTrip->tripID; ?>" method="post">
                    <input type="hidden" name="action" value="reject">
                    <button type="submit" class="button">Reject</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

                </table>
            </div>
        </div>
    </div>

    <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    };
</script>

</body>

</html>
