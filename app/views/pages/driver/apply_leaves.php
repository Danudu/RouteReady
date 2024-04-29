<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title>Apply Leave | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        .container {
            backdrop-filter: blur(10px) brightness(0.3);
            min-height: 100vh;
            padding-bottom: 30px;
            max-width: 800px;
            /* Added max-width */
            background-color: rgba(31, 33, 37, 0.4);
            /* Changed background color */
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        h2 {
            font-size: 36px;
            text-align: center;
        }

        .form-group {
            margin: 15px 0;
            /* Adjusted margin */
        }

        label {
            color: var(--white);
            /* Changed label color */
            font-weight: bold;

        }

        a {
            text-decoration: none;
        }

        input[type="date"],
        input[type="number"],
        textarea {
            width: 100%;
            height: 40px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid var(--text-light);
            background-color: var(--primary-color-light);
            color: var(--text-light);
            margin-top: 5px;
            /* Adjusted margin */
        }

        select {
            width: 100%;
            height: 40px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid var(--text-light);
            background-color: var(--primary-color-light);
            color: var(--text-light);
            margin-top: 5px;
            /* Adjusted margin */
        }

        textarea {
            height: 80px;
            /* Adjusted height */
        }

        .button {
            width: 100%;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 10px;
            /* Adjusted margin */
        }

        .button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .alert {
            background-color: #ffcccc;
            color: #cc0000;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
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
                    <a href="<?php echo URLROOT; ?>/deivers/view_time_table">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span class="icon_name">Schedule</span>
                    </a>
                    <span class="tooltip">Schedule</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/drivers/viewSalaryDetails/<?= $_SESSION['user_id'] ?>">
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
                        <span class="icon_name">Payments</span>
                    </a>
                    <span class="tooltip">Payments</span>
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
            <h2>Apply for Leave</h2>
            <!-- <?php if (isset($data['error'])): ?>
            <div class="alert"><?php echo $data['error']; ?></div>
        <?php endif; ?> -->

            <p>Medical Leaves Taken:
                <?php echo $data['medicalCount']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medical
                Leaves Remaining: <?php echo (24 - $data['medicalCount']); ?>
            </p>
            <p>Sick Leaves Taken:
                <?php echo $data['sickCount']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;Sick Leaves Remaining: <?php echo (12 - $data['sickCount']); ?>
            </p>
            <p>Personal Leaves Taken: <?php echo $data['personalCount']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Personal
                Leaves Remaining : <?php echo (6 - $data['personalCount']); ?></p>
            <p>Other Leaves Taken: <?php echo $data['otherCount']; ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;Other Leaves Remaining :<?php echo (6 - $data['otherCount']); ?></p>
            <form action="<?php echo URLROOT; ?>/drivers/submitLeaveApplication" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="type">Leave Type:</label>
                    <select id="type" name="type" required>
                        <option value="select">-Select-</option>
                        <option value="Medical Leave">Medical Leave</option>
                        <option value="Sick Leave">Sick Leave</option>
                        <option value="Personal">Personal</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group" id="medical-report-field" style="display: none;">
                    <label for="medical_report">Medical Report:</label>
                    <input type="file" id="medical_report" name="medical_report">
                </div>
                <div class="form-group">
                    <label for="std_date">Start Date:</label>
                    <input type="date" id="std_date" name="std_date" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="no_of_days">Number of Days:</label>
                    <input type="number" id="no_of_days" name="no_of_days" required readonly>
                </div>
                <div class="form-group">
                    <label for="reason">Reason:</label>
                    <textarea id="reason" name="reason"></textarea>
                </div>
                <button type="submit" class="button">Submit</button>
            </form>

            <!-- View Leaves Button -->
            <button onclick="window.location.href='<?php echo URLROOT; ?>/drivers/appliedLeaves'" class="button">View
                Leaves</button>

            <!-- Back Button -->
            <button onclick="window.location.href='<?php echo URLROOT; ?>/drivers/home'" class="button">Back</button>


            <!-- JavaScript -->
            <script>

                document.getElementById('type').addEventListener('change', function () {
                    var type = this.value;
                    var reasonField = document.getElementById('reason');

                    // Check if the selected type is 'Other'
                    if (type === 'Other') {
                        // Add the 'required' attribute to the reason field
                        reasonField.setAttribute('required', 'required');
                    } else {
                        // Remove the 'required' attribute from the reason field
                        reasonField.removeAttribute('required');
                    }
                });

                document.getElementById('type').addEventListener('change', function () {
                    var type = this.value;
                    var medicalReportField = document.getElementById('medical-report-field');
                    if (type === 'Medical Leave') {
                        medicalReportField.style.display = 'block';
                    } else {
                        medicalReportField.style.display = 'none';
                    }
                });

                document.getElementById('medical_report').addEventListener('change', function () {
                    var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if (this.files.length > 0 && !allowedTypes.includes(this.files[0].type)) {
                        this.setCustomValidity('Please select only an image file.');
                    } else {
                        this.setCustomValidity('');
                    }
                });



                // Function to calculate the number of days between two dates
                function calculateDays() {
                    var startDate = new Date(document.getElementById('std_date').value);
                    var endDate = new Date(document.getElementById('end_date').value);

                    // Check if both start date and end date are valid dates
                    if (startDate instanceof Date && !isNaN(startDate.getTime()) && endDate instanceof Date && !isNaN(endDate.getTime())) {
                        // Add one day to the end date
                        endDate.setDate(endDate.getDate() + 1);

                        var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
                        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                        // Update the number of days input field with the calculated value
                        document.getElementById('no_of_days').value = diffDays;
                    } else {
                        // Clear the number of days input field if either start date or end date is invalid
                        document.getElementById('no_of_days').value = '';
                    }
                }


                // Attach event listeners to start date and end date fields
                document.getElementById('std_date').addEventListener('change', calculateDays);
                document.getElementById('end_date').addEventListener('change', calculateDays);


            </script>
        </div>
    </div>


</body>

</html>