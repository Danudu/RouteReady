<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Calculation</title>
    <style>
        /* Add your CSS styles here */
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Salary Calculation Form</h2>
        <form id="salaryForm" method="post" action="<?php echo URLROOT; ?>/admins/calculate">
            <label for="driver_id">Driver ID:</label>
            <input type="text" id="driver_id" name="driver_id" required><br><br>

            <label for="number_of_days">Number of Days Worked:</label>
            <input type="number" id="number_of_days" name="number_of_days" required><br><br>

            <label for="additional_deduction_days">Additional Deduction Days (Sudden Leaves):</label>
            <input type="number" id="additional_deduction_days" name="additional_deduction_days" required><br><br>

            <label for="basic_salary_per_day">Basic Salary Per Day:</label>
            <input type="number" id="basic_salary_per_day" name="basic_salary_per_day" value="2000" required><br><br>

            <label for="additional_deduction_payment">Additional Deduction Payment:</label>
            <input type="number" id="additional_deduction_payment" name="additional_deduction_payment" value="1000" required><br><br>

            <label for="service_commission_percentage">Service Commission Percentage:</label>
            <input type="number" id="service_commission_percentage" name="service_commission_percentage" value="10" required><br><br>

            <input type="submit" value="Calculate Salary">
        </form>
        <div id="errorMessages" class="error-message"></div>
    </div>

    <script>
        document.getElementById('salaryForm').addEventListener('submit', function(event) {
            var driverId = document.getElementById('driver_id').value;
            var numberOfDays = document.getElementById('number_of_days').value;
            var additionalDeductionDays = document.getElementById('additional_deduction_days').value;
            var basicSalaryPerDay = document.getElementById('basic_salary_per_day').value;
            var additionalDeductionPayment = document.getElementById('additional_deduction_payment').value;
            var serviceCommissionPercentage = document.getElementById('service_commission_percentage').value;

            var errorMessages = [];

            if (!driverId.trim()) {
                errorMessages.push('Driver ID is required');
            }

            if (isNaN(numberOfDays) || numberOfDays <= 0) {
                errorMessages.push('Number of days must be a positive number');
            }

            if (isNaN(additionalDeductionDays) || additionalDeductionDays < 0) {
                errorMessages.push('Additional deduction days must be a non-negative number');
            }

            if (isNaN(basicSalaryPerDay) || basicSalaryPerDay <= 0) {
                errorMessages.push('Basic salary per day must be a positive number');
            }

            if (isNaN(additionalDeductionPayment) || additionalDeductionPayment < 0) {
                errorMessages.push('Additional deduction payment must be a non-negative number');
            }

            if (isNaN(serviceCommissionPercentage) || serviceCommissionPercentage < 0 || serviceCommissionPercentage > 100) {
                errorMessages.push('Service commission percentage must be a number between 0 and 100');
            }

            var errorContainer = document.getElementById('errorMessages');
            errorContainer.innerHTML = '';

            if (errorMessages.length > 0) {
                errorMessages.forEach(function(message) {
                    var errorMessageNode = document.createElement('p');
                    errorMessageNode.textContent = message;
                    errorContainer.appendChild(errorMessageNode);
                });

                event.preventDefault();
            }
        });
 

   
        function toggleAdditionalDetails() {
            var checkBox = document.getElementById("edit_details");
            var additionalDetails = document.querySelector(".additional-details");
            if (checkBox.checked == true) {
                additionalDetails.style.display = "block"; // Show the additional details section
            } else {
                additionalDetails.style.display = "none"; // Hide the additional details section
            }
        }

        // Get input elements
        const driverIdInput = document.getElementById("driver_id");
        const paymentIdDisplay = document.getElementById("payment_id_display");

        // Add event listener to driver ID input field
        driverIdInput.addEventListener("input", function() {
            const driverIdValue = driverIdInput.value;
            const month = new Date().getMonth() + 1; // Get the current month (1-12)
            const year = new Date().getFullYear(); // 4-digit year
            const paymentId = driverIdValue + month.toString().padStart(2, '0') + year.toString().slice(-2); // Concatenate driver ID, month, and year
            paymentIdDisplay.textContent = "Generated Payment ID: " + paymentId;
        });
    </script>
</body>
</html>
