<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Reservations | RouteReady</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">

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
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-3">Monthly Reservations</h2>
                    <?php if (empty($data['reservations'])): ?>
                        <p>No reservations have been made for
                            <?php echo date('F Y', strtotime($data['selectedYear'] . '-' . $data['selectedMonth'] . '-01')); ?>
                        </p>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Schedule Type</th>
                                    <th>Route</th>
                                    <th>Date</th>
                                    <th>PickUp</th>
                                    <th>DropOff</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['reservations'] as $reservation): ?>
                                    <tr>
                                        <td><?php echo $reservation->ScheduleType; ?></td>
                                        <td><?php echo $reservation->Route; ?></td>
                                        <td><?php echo $reservation->Date; ?></td>
                                        <td><?php echo $reservation->PickUp; ?></td>
                                        <td><?php echo $reservation->DropOff; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>