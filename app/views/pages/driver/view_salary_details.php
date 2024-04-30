<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Salary Details</title>
</head>
<body>
    <h1>Salary Details</h1>
    <?php if (!is_null($data['salary'])): ?>
        <table border="1">
            <tr>
                <th>Driver ID</th>
                <th>Number of Trips</th>
                <th>Basic Payment</th>
                <th>Total Amount</th>
                <th>Month</th>
                <th>Year</th>
            </tr>
            <?php foreach ($data['salary'] as $detail): ?>
                <tr>
                    <td><?php echo $detail->driver_id; ?></td>
                    <td><?php echo $detail->number_of_trips; ?></td>
                    <td><?php echo $detail->basic_payment; ?></td>
                    <td><?php echo $detail->total_amount; ?></td>
                    <td><?php echo $detail->month; ?></td>
                    <td><?php echo $detail->year; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No salary details available.</p>
    <?php endif; ?>
</body>
</html>
