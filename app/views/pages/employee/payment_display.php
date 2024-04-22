<!-- payment_display.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Payments</title>
</head>
<body>
    <h1>Reservation Payments</h1>
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
    </table>
</body>
</html>