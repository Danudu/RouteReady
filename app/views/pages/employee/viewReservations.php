<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservations | RouteReady</title>
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

            /* backdrop-filter: blur(10px) brightness(0.5); */


        }

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

        .disabled {
            pointer-events: none;
            opacity: 0.6;
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
        <div class="wrapper">
            <div class="container">


                <!-- Display daily reservations -->
                <h2>Daily Reservations</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sortable">Schedule <span class="arrow">&#9660;</span></th>
                            <th class="sortable">Route <span class="arrow">&#9660;</span></th>
                            <th class="sortable">Date <span class="arrow">&#9660;</span></th>
                            <th>Pick Up</th>
                            <th>Drop Off</th>
                            <th colspan="2">Action</th> <!-- New column for action buttons -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['dailyReservations'] as $reservation): ?>
                            <tr>
                                <!-- Display reservation details -->
                                <td><?php echo $reservation->ScheduleType; ?></td>
                                <td><?php echo $reservation->Route; ?></td>
                                <td><?php echo $reservation->Date; ?></td>
                                <td><?php echo $reservation->PickUp; ?></td>
                                <td><?php echo $reservation->DropOff; ?></td>
                                <!-- Action buttons -->
                                <td>

                                    <?php
                                    $disableEdit = (strtotime($reservation->Date) < strtotime('tomorrow'));
                                    $disableDelete = (strtotime($reservation->Date) < strtotime('tomorrow'));
                                    ?>
                                    <a href="<?php echo URLROOT; ?>/employees/editDailyReservation/<?php echo $reservation->ReservationID; ?>"
                                        <?php if ($disableEdit)
                                            echo 'class="disabled"'; ?>>

                                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                                    </a>
                                </td>
                                <td>

                                    <form
                                        action="<?php echo URLROOT; ?>/employees/deleteReservation/<?php echo $reservation->ReservationID; ?>"
                                        method="post">
                                        <button type="submit" class="btn-delete" <?php if ($disableDelete)
                                            echo 'disabled'; ?>>
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br>
                <br>
                <!-- Display Monthly Reservations -->
                <h2>Monthly Reservations</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sortable">Schedule <span class="arrow">&#9660;</span></th>
                            <th class="sortable">Route <span class="arrow">&#9660;</span></th>
                            <th class="sortable">Start Date <span class="arrow">&#9660;</span></th>
                            <th>End Date</th>
                            <th>Pick Up</th>
                            <th>Drop Off</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['monthlyReservations'] as $reservation): ?>
                            <tr>
                                <!-- Display reservation details -->
                                <td><?php echo $reservation->ScheduleType; ?></td>
                                <td><?php echo $reservation->Route; ?></td>
                                <td><?php echo $reservation->StartDate; ?></td>
                                <td><?php echo $reservation->EndDate; ?></td>
                                <td><?php echo $reservation->PickUp; ?></td>
                                <td><?php echo $reservation->DropOff; ?></td>
                                <!-- Action buttons -->
                                <td>
                                    <?php
                                    $disableEdit = (strtotime($reservation->EndDate) < strtotime('tomorrow'));
                                    $disableDelete = (strtotime($reservation->EndDate) < strtotime('tomorrow'));
                                    ?>
                                    <a href="<?php echo URLROOT; ?>/employees/editMonthlyReservation/<?php echo $reservation->MReservationID; ?>"
                                        <?php if ($disableEdit)
                                            echo 'class="disabled"'; ?>>
                                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                                    </a>
                                </td>
                                <td>

                                    <form
                                        action="<?php echo URLROOT; ?>/employees/deleteMonthlyReservation/<?php echo $reservation->MReservationID; ?>"
                                        method="post">
                                        <button type="submit" class="btn-delete" <?php if ($disableDelete) echo 'disabled'; ?>>
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Add button for making a reservation -->
                <a href="<?php echo URLROOT; ?>/employees/makeReservation" class="button">Make a Reservation</a>

            </div>

        </div>
    </div>

</body>

</html>