<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Payment Details</title>
</head>

<body>
    <h1>Employee Payment Details</h1>
    <div>
        <p>Employee ID: <?php echo $data['employee_id']; ?></p>
        <p>Payment Period: <?php echo $data['start_month']; ?> - <?php echo $data['end_month']; ?> <?php echo $data['year']; ?></p>
    </div>
    <div>
        <h2>Reservations Count for Each Month:</h2>
        <ul>
            <?php foreach ($data['reservationsCount'] as $month => $count) : ?>
                <li><?php echo $month; ?>: <?php echo $count; ?> reservations</li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div>
        <h2>Payment for Each Month:</h2>
        <ul>
            <?php foreach ($data['paymentData'] as $month => $payment) : ?>
                <li><?php echo $month; ?>: $<?php echo $payment; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a href="<?php echo URLROOT; ?>/hrmanagers/home">Back to Home</a>
</body>

</html>
