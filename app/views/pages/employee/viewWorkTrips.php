<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkTrip Reservations | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/worktrip.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
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
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.sortable').click(function () {
                var table = $(this).parents('table').eq(0);
                var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
                this.asc = !this.asc;
                if (!this.asc) {
                    rows = rows.reverse();
                    $(this).find('span').html('&#9650;');
                } else {
                    $(this).find('span').html('&#9660;');
                }
                for (var i = 0; i < rows.length; i++) {
                    table.append(rows[i]);
                }
            });
            function comparer(index) {
                return function (a, b) {
                    var valA = getCellValue(a, index),
                        valB = getCellValue(b, index);
                    return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB);
                };
            }
            function getCellValue(row, index) {
                return $(row).children('td').eq(index).text();
            }
        });
    </script>
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
            <h2>Work Trip Reservations</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Reason</th>
                        <th>Number of Passengers</th>
                        <th>Destination</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['workTripReservations'] as $workTripReservation): ?>
                        <tr>
                            <td><?php echo $workTripReservation->employee_name; ?></td>
                            <td><?php echo $workTripReservation->email; ?></td>
                            <td><?php echo $workTripReservation->reason; ?></td>
                            <td><?php echo $workTripReservation->numofPassengers; ?></td>
                            <td><?php echo $workTripReservation->destination; ?></td>
                            <td><?php echo $workTripReservation->comments; ?></td>
                            <td><?php echo $workTripReservation->tripDate; ?></td>
                            <td><?php echo $workTripReservation->tripTime; ?></td>
                            <td>
                                <a
                                    href="<?php echo URLROOT; ?>/employees/editWorkTrips/<?php echo $workTripReservation->tripID; ?>"><i
                                        class="fas fa-pencil-alt" style="color: black;"></i></a>
                            </td>
                            <td>
                                <form
                                    action="<?php echo URLROOT; ?>/employees/deleteWorkTripReservation/<?php echo $workTripReservation->tripID; ?>"
                                    method="post">
                                    <button type="submit" class="btn-delete"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div style="padding: 10px 40px;
    border: 2px solid black;
    border-radius: 8px;
    max-width:30%;
    margin-top: 10px;  
    background: black;
    font-size: 15px;
    text-align:center;
    margin-left:30%;
">

                <a href="<?php echo URLROOT; ?>/employees/makeWorkTrip" class="new"
                    style="color: white; text-decoration: none;">Make a Reservation</a>
            </div>
        </div>



</body>

</html>