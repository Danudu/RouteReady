<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Payments</title>
</head>
<body>
    <?php if ($display_payments) : ?>
        <h1>Employee Payments</h1>
        <p>Employee ID: <?php echo $employee_id; ?></p>
        <p>Period: <?php echo date('F', mktime(0, 0, 0, $start_month, 1)) . ' to ' . date('F', mktime(0, 0, 0, $end_month, 1)); ?></p>
        <table>
            <tr>
                <th>Month</th>
                <th>Payment</th>
            </tr>
            <?php foreach ($payments as $month => $payment) : ?>
                <tr>
                    <td><?php echo $month; ?></td>
                    <td>$<?php echo $payment; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <h1>Enter Employee Details</h1>
        <form action="<?php echo URLROOT; ?>/hrmanagers/viewEmployeePayments" method="post">
            <label for="employee_id">Employee ID:</label>
            <input type="text" name="employee_id" id="employee_id">
            <label for="start_month">Start Month:</label>
            <select name="start_month" id="start_month">
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                    <option value="<?php echo $i; ?>"><?php echo date('F', mktime(0, 0, 0, $i, 1)); ?></option>
                <?php endfor; ?>
            </select>
            <label for="end_month">End Month:</label>
            <select name="end_month" id="end_month">
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                    <option value="<?php echo $i; ?>"><?php echo date('F', mktime(0, 0, 0, $i, 1)); ?></option>
                <?php endfor; ?>
            </select>
            <button type="submit">Calculate Payments</button>
        </form>
    <?php endif; ?>
</body>
</html>
