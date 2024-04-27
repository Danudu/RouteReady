<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* White background */
            color: #000; /* Black text */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }

        .salary-report {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
            padding: 20px;
            border-radius: 10px;
        }

        .salary-report h2,
        .salary-report h3 {
            color: #fff; /* White text */
        }

        .salary-report p {
            color: #fff; /* White text */
            margin-bottom: 10px;
        }

        .salary-report hr {
            border-color: #fff; /* White border */
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .salary-report h3 {
            margin-top: 20px;
        }

        .salary-report h3:first-child {
            margin-top: 0;
        }
        .form {
           text-align: center;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;">Salary Report</h1>
<div class="form">
    <form method="get" action="">
        <label for="driver_id">Enter Driver ID:</label>
        <input type="text" id="driver_id" name="driver_id">
        <input type="submit" value="Get Salary Report">
    </form>
</div>

<?php
if (isset($data['salary_data'])) {
    $salary_data = $data['salary_data'];
    $bank_data = $data['bank_data'];
    echo "<div class='container'>";
    echo "<div class='salary-report'>";
    echo "<h2>Salary Report</h2>";
    echo "<h3>Driver ID: " . $salary_data['driver_id'] . "</h3>";
    echo "<hr>";
    echo "<h3>Salary Details:</h3>";
    echo "<p>Basic Salary: " . $salary_data['basic_salary'] . "</p>";
    echo "<p>Number of Days Worked: " . $salary_data['number_of_days'] . "</p>";
    echo "<p>Additional Deduction Days: " . $salary_data['additional_deduction_days'] . "</p>";
    echo "<p>Service Commission: " . $salary_data['service_commission'] . "</p>";
    echo "<p>Total Salary: " . $salary_data['total_salary'] . "</p>";
    echo "<h3>Bank Details:</h3>";
    if ($bank_data) {
        echo "<p>Account Number: " . $bank_data['accountNo'] . "</p>";
        echo "<p>Bank Name: " . $bank_data['bankName'] . "</p>";
        echo "<p>Branch Name: " . $bank_data['branchName'] . "</p>";
        echo "<p>Holder's Name: " . $bank_data['holdersName'] . "</p>";
    } else {
        echo "<p>No bank details found for Driver ID: " . $salary_data['driver_id'] . "</p>";
    }
    echo "</div>"; // Close salary-report div
    echo "</div>"; // Close container div
} elseif (isset($data['error'])) {
    echo "<p>" . $data['error'] . "</p>";
}
?>
</body>
</html>
