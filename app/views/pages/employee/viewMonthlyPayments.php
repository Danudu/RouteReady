<!-- payment_display.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Payments | RouteReady</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">

    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
</head>

<body>
    <!-- <h1>Reservation Payments</h1>
    <table>
        <thead>
            <tr>
                <th>Reservation ID</th>
                <th>Reservation Date</th>
                <th>Payment Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['payments'] as $payment): ?>
                <tr>
                    <td><?php echo $payment['reservation_id']; ?></td>
                    <td><?php echo $payment['reservation_date']; ?></td>
                    <td><?php echo $payment['payment_amount']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> -->

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
                    <h2 class="mt-3">Monthly Payments</h2>
                    <form action="<?php echo URLROOT; ?>/employees/viewMonthlyPayments" method="post">
                        <div class="form-group">
                            <label for="month">Select Month:</label>
                            <select name="month" id="month" class="form-control">
                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                    <option value="<?php echo $i; ?>" <?php echo ($data['selectedMonth'] == $i) ? 'selected' : ''; ?>>
                                        <?php echo date('F', mktime(0, 0, 0, $i, 1)); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="year">Select Year:</label>
                            <select name="year" id="year" class="form-control">
                                <?php
                                $currentYear = date('Y');
                                $startYear = $currentYear - 10; // Adjust as needed
                                $endYear = $currentYear + 10; // Adjust as needed
                                
                                for ($year = $startYear; $year <= $endYear; $year++) {
                                    echo '<option value="' . $year . '"' . ($data['selectedYear'] == $year ? ' selected' : '') . '>' . $year . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">View Payment</button>
                    </form>

                    <!-- View Reservations Button -->
                    <button type="button" class="btn btn-primary" id="viewReservationsBtn">View Reservations</button>

                    <?php // Check if totalPayment is set and display it if available
                    if (isset($data['totalPayment'])): ?>
                        <div class="mt-3">
                            <p>Total Payment for <?php echo date('F', mktime(0, 0, 0, $data['selectedMonth'], 1)); ?>,
                                <?php echo $data['selectedYear']; ?>: $<?php echo $data['totalPayment']; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('viewReservationsBtn').addEventListener('click', function () {
                var month = document.getElementById('month').value;
                var year = document.getElementById('year').value;
                window.location.href = "<?php echo URLROOT; ?>/employees/viewMonthlyReservations?month=" + month + "&year=" + year;
            });
        </script>
    </div>
</body>

</html>