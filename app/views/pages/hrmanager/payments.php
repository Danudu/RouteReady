<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payments | RouteReady</title>

    <!-- Link to the CSS styles -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/viewMonthlyPayments.css"> <!-- Add this line for styling -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        .main-content {
            padding: 50px 0;
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
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
            margin: 50px auto;
            width: 800px;
        }

        h1 {
            color: var(--white);
            margin-bottom: 30px;
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
                        <i class="fa-solid fa-house"></i>
                        <span class="icon_name">Home</span>
                    </a>
                    <span class="tooltip">HomePage</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/hrmanagers/calculatePayments">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="icon_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
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
                    <a href="<?php echo URLROOT; ?>/hrmanagers/viewEmployees">
                        <i class="fas fa-users"></i>
                        <span class="icon_name">Employees</span>
                    </a>
                    <span class="tooltip">Employees</span>
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
    </div>
    <div class="main-content">
        <div class="wrapper">
            <h2>View Payments</h2>
            </br>
            <form action="<?php echo URLROOT; ?>/hrmanagers/calculatePayments" method="post">
                <label for="month">Select Month:</label>
                <select name="month" id="month">
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo ($data['selectedMonth'] == $i) ? 'selected' : ''; ?>>
                            <?php echo date('F', mktime(0, 0, 0, $i, 1)); ?>
                        </option>
                    <?php endfor; ?>
                </select>
                <label for="year">Select Year:</label>
                <select name="year" id="year">
                    <?php for ($i = date('Y'); $i >= 2020; $i--): ?>
                        <option value="<?php echo $i; ?>" <?php echo ($data['selectedYear'] == $i) ? 'selected' : ''; ?>>
                            <?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <button type="submit" class="button">View Payments</button>
                </br>
                </br>
            </form>
            </br>


            <!-- Display payments in a table -->
            <?php if (!empty($data['payments'])): ?>

                <h3>Payments for
                    <?php echo date('F Y', strtotime($data['selectedYear'] . '-' . $data['selectedMonth'] . '-01')); ?></h3>
                <table id="report">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Total Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['payments'] as $payment): ?>
                            <tr>
                                <td><?php echo $payment['emp_id']; ?></td>
                                <td><?php echo $payment['name']; ?></td>
                                <td><?php echo $payment['totalPayment']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No payments available for the selected month and year.</p>
        <?php endif; ?>
        <button id="downloadpdf">Download PDF</button></a>
    </div>


    </div>



    <script>
        // JavaScript to submit form when month and year are selected
        document.getElementById('month').addEventListener('change', function () {
            document.getElementById('paymentForm').submit();
        });

        document.getElementById('year').addEventListener('change', function () {
            document.getElementById('paymentForm').submit();
        });

        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const filename = 'PDFFILE' + '.pdf';
        document.getElementById('downloadpdf').addEventListener('click', function () {
            // Select the element that you want to convert to PDF
            const element = document.getElementById('report');

            // Specify the filename for the downloaded PDF

            html2pdf(element, {
                filename: filename
            });
        });
    </script>
</body>

</html>

<!-- View: pages/hrmanager/payments.php -->

