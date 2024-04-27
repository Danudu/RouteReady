<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Out-Source Driver Salary Calculation</title>
    <style>
        /* Add your CSS styles here */
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }
        .additional-details {
            display: none; /* Hide the additional details section by default */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Out-Source Driver Salary Calculation</h2>
        <form method="post" action="<?php echo URLROOT; ?>/admins/handleFormSubmission" >
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

            <input type="submit" value="Calculate Salary">
        </form>
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