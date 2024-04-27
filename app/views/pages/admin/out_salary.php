<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/employee/employee.css">

    <title>Out-Source Driver Salary Calculation</title>
    <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
        }

        .container {
    backdrop-filter: blur(10px) brightness(0.3);
    min-height: 100vh;
    min-width: var(--max-width);
    align-items: center;
    
}

        .additional-details {
            display: none; /* Hide the additional details section by default */
        }

        .wrapper {
            background-color: rgb(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: auto;
            margin-top: 30px;
            margin-left: 80px;
            margin-right: 80px;
            text-align: justify;
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
    </style>
</head>
<body>
    <div class="container" > 
    <nav>
            <div class="nav__logo">
                <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></a>
            </div>
            <div class="nav__links">
                <p class="link"><a href="<?php echo URLROOT; ?>/pages/home">Home</a></p>
            </div>
        </nav>
        <h2 style="text-align:center">Out-Source Driver Salary Calculation</h2>
        <div class="wrapper">
            <form method="post" action="<?php echo URLROOT; ?>/admins/handleFormSubmission">
                <label for="driver_id">Driver ID:</label>
                <input type="text" id="driver_id" name="driver_id" required><br><br>

                <label for="number_of_trips">Number of Trips Went:</label>
                <input type="number" id="number_of_trips" name="number_of_trips" required><br><br>

                <label for="edit_basic_payment">Edit Basic Payment:</label>
                <input type="checkbox" id="edit_basic_payment" name="edit_basic_payment" onchange="toggleBasicPaymentEdit()"><br><br>

                <div class="additional-details" id="basic_payment_edit_section">
                    <label for="basic_payment">Basic Payment:</label>
                    <input type="number" id="basic_payment" name="basic_payment" value="2000" required><br><br>
                </div>

                <input type="submit" class="button" value="Calculate Salary">
            </form>
        </div>
    </div>

    <script>
        function toggleBasicPaymentEdit() {
            var checkBox = document.getElementById("edit_basic_payment");
            var basicPaymentEditSection = document.getElementById("basic_payment_edit_section");
            if (checkBox.checked == true) {
                basicPaymentEditSection.style.display = "block"; // Show the basic payment editing section
            } else {
                basicPaymentEditSection.style.display = "none"; // Hide the basic payment editing section
            }
        }
    </script>
</body>
</html>
