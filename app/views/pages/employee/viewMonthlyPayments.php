<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Payments | RouteReady</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>


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

        input[type="submit"],
        .button {
            width: calc(50% - 10px); /* Adjusted width */
            height: 35px; /* Reduced height */
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 20px; /* Reduced border radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px; /* Reduced font size */
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 35px; /* Adjusted line height */
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 20px;
            margin-right: 10px; /* Added margin between buttons */
        }

        input[type="submit"]:hover,
        .button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .button-box {
            display: flex;
            justify-content: center; /* Center the buttons */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .button-box button:last-child {
            margin-right: 0; /* Remove margin from last button */
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

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>
    <div class="main-content">
        <div class="wrapper">
            
            <h2>Monthly Payments</h2>
    </br>
            <form action="<?php echo URLROOT; ?>/employees/viewMonthlyPayments" method="post">
                <div class="form-group">
                    <label for="month">Select Month:</label>
                    <select name="month" id="month">
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo ($data['selectedMonth'] == $i) ? 'selected' : ''; ?>>
                                <?php echo date('F', mktime(0, 0, 0, $i, 1)); ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="year">Select Year:</label>
                    <select name="year" id="year">
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
                <?php if (isset($data['totalPayment'])): ?>
    <div class="mt-3" style="text-align: center;" id="paymnet">
       <p style="font-size: 20px;">Total Payment for <?php echo date('F', mktime(0, 0, 0, $data['selectedMonth'], 1)); ?>,
            <?php echo $data['selectedYear']; ?>: $<?php echo $data['totalPayment']; ?>
        
    </div>
<?php endif; ?>
                
                <div class="button-box">
                    <button type="submit" class="button">View Payment</button>
                    <!-- View Reservations Button -->
                    <button type="button" class="button" id="viewReservationsBtn">View Reservations</button>
                </div>
            </form>

                    </br>
    <div>        
    <div class="button-box">
    <a href="<?php echo URLROOT; ?>/pages/home/<?= $_SESSION['user_id'] ?>" class="button" id="back">Back</a>
    <button id="downloadpdf" class="button">Download PDF</button>
</div>

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
</body>
<script>
    document.getElementById('showPopup').addEventListener('click', function () {
        console.log("Show popup clicked"); // Debug statement
        // Show the popup
        document.getElementById('popup').style.display = 'block';
    });

    document.getElementById('close').addEventListener('click', function () {
        console.log("Close button clicked"); // Debug statement
        // Close the popup
        document.getElementById('popup').style.display = 'none';
    });
</script>

<script>
        const filename = 'PDFFILE' + '.pdf';
        document.getElementById('downloadpdf').addEventListener('click', function () {
            // Select the element that you want to convert to PDF
            const element = document.getElementById('payment');

            // Specify the filename for the downloaded PDF
            html2pdf().from(element).save(filename);

            // html2pdf(element, {
            //     filename: filename
            // });
        });
    </script>
</html>