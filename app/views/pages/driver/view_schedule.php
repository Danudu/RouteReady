<!-- Display full day bookings -->
<h2>Full Day Bookings</h2>
<ul>
    <?php foreach ($fullDayBookings as $booking) : ?>
        <li><?php echo $booking['details']; ?></li>
    <?php endforeach; ?>
</ul>

<!-- Display timetable details -->
<h2>Timetable Details</h2>
<ul>
    <?php foreach ($timetableDetails as $detail) : ?>
        <li><?php echo $detail['description']; ?></li>
    <?php endforeach; ?>
</ul>
