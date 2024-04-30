<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Display full day bookings -->
<h2>Full Day Bookings</h2>
<ul>
    <?php foreach ($data['fullDayBookings'] as $booking) : ?>
        <li><?php echo $booking->b_date; ?></li>
        <li><?php echo $booking->location; ?></li>
        <li><?php echo $booking->no_pas; ?></li>
        <li><?php echo $booking->driver_id; ?></li>
        <li><?php echo $booking->vehicle_id; ?></li>

    <?php endforeach; ?>
</ul>

<!-- Display timetable details -->
<h2>Timetable Details</h2>
<ul>
    <?php foreach ($data['timetableDetails'] as $detail) : ?>
        <li><?php echo $detail->day; ?></li>
        <li><?php echo $detail->time_slot; ?></li>
        <li><?php echo $detail->activity; ?></li>
        <li><?php echo $detail->driver_id; ?></li>
        <li><?php echo $detail->vehicle_id; ?></li>
        <li><?php echo $detail->date; ?></li>
    <?php endforeach; ?>
</body>
</html>

