<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Vehicles</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
   
<table>
    <tr>
        <th>Vehicle Number</th>
        <th>Vehicle Name</th>
        <th>Capacity</th>
        <th>Booked Days</th>
    </tr>
    <?php foreach($vehicles as $vehicle): ?>
    <tr>
        <td><?php echo $vehicle['Vehicle_Number']; ?></td>
        <td><?php echo $vehicle['Vehicle_Name']; ?></td>
        <td><?php echo $vehicle['capacity']; ?></td>
        <td><?php echo $this->getBookedDays($vehicle['Vehicle_Number']); ?></td> 
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
