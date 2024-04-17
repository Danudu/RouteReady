<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .btn-delete i {
            font-size: 1.5em; /* Increase the size of the delete icon */
            background-color: transparent; /* Remove background color */
            border: none; /* Remove border */
            cursor: pointer; /* Set cursor to pointer */
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sortable').click(function() {
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
                return function(a, b) {
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
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    
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
        <?php foreach ($data['dailyReservations'] as $reservation) : ?>
            <tr>
                <td><?php echo $reservation->ScheduleType; ?></td>
                <td><?php echo $reservation->Route; ?></td>
                <td><?php echo $reservation->Date; ?></td>
                <td><?php echo $reservation->PickUp; ?></td>
                <td><?php echo $reservation->DropOff; ?></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/employees/editDailyReservation/<?php echo $reservation->ReservationID; ?>"><i class="fas fa-pencil-alt" style="color: black;"></i></a>
                </td>
                <td>
                    <form action="<?php echo URLROOT; ?>/employees/deleteReservation/<?php echo $reservation->ReservationID; ?>" method="post">
                        <button type="submit" class="btn-delete"><i class="fas fa-trash-alt"></i></button>
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
<table class="table"  >
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
        <?php foreach ($data['monthlyReservations'] as $reservation) : ?>
            <tr>
                <td><?php echo $reservation->ScheduleType; ?></td>
                <td><?php echo $reservation->Route; ?></td>
                <td><?php echo $reservation->StartDate; ?></td>
                <td><?php echo $reservation->EndDate; ?></td>
                <td><?php echo $reservation->PickUp; ?></td>
                <td><?php echo $reservation->DropOff; ?></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/employees/editMonthlyReservation/<?php echo $reservation->id; ?>"><i class="fas fa-pencil-alt" style="color: black;"></i></a>
                </td>
                <td>
                    <form action="<?php echo URLROOT; ?>/employees/deleteMonthlyReservation/<?php echo $reservation->MReservationID; ?>" method="post">
                        <button type="submit" class="btn-delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Add button for making a reservation -->
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
    <a href="<?php echo URLROOT; ?>/employees/makeReservation" class="new" style="color: white; text-decoration: none;">Make a Reservation</a>
</div>

</body>
</html>