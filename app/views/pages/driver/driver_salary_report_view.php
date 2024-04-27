<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Salary Report</title>
    <style>
        /* CSS styles */
    </style>
</head>
<body>
    <h2>Salary Report for</h2>

    <table border="1">
        <!-- Table header -->
        <tr>
            <th>Payment ID</th>
            <th>Driver ID</th>
            <th>Month</th>
            <th>Year</th>
            <th>Basic Salary</th>
            <th>Number Of Days Worked</th>
            <th>Additional Deduction Days(Sudden Leaves)</th>
            <th>Service Commission</th>
            <th>Total Salary</th>
            <th>Status</th>
        </tr>
        
        <?php

if (!empty($data["salaryReport"])) {
    $salaryReport = $data["salaryReport"];
    foreach ($salaryReport as $row) {
        echo "<tr>";
        echo "<td>" . $row->payment_id . "</td>";
        echo "<td>" . $row->driver_id . "</td>";
        echo "<td>" . $row->month . "</td>";
        echo "<td>" . $row->year . "</td>";
        echo "<td>" . $row->basic_salary . "</td>";
        echo "<td>" . $row->number_of_days_worked . "</td>";
        echo "<td>" . $row->sudden_leaves . "</td>";
        echo "<td>" . $row->service_commission . "</td>";
        echo "<td>" . $row->total_salary . "</td>";
        echo "<td>" . ($row->status == 1 ? 'Paid' : 'Not Paid') . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No records found</td></tr>";
}
?>
    </table>
</body>
</html>
