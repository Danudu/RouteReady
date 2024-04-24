<!-- viewVehicle.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
    <!-- Your CSS and other imports -->
</head>
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <section class="header" style ="width: 100%;display:flex;flex-direction:row;">
        <!-- Your HTML content for header -->
    </section>

    <div>
        <table class="table" border="1" style="border-left: 50%;">
            <tr>
                <th>Registration Number</th>
                <th>Vehicle Number</th>
                <th>Vehicle Type</th>
                <th>Capacity</th>
                <th colspan="3">Options</th>
            </tr>

            <?php foreach ($vehicles as $vehicle): ?>
                <tr>
                    <td><?php echo $vehicle['Registration_Number']; ?></td>
                    <td><?php echo $vehicle['Vehicle_Number']; ?></td>
                    <td><?php echo $vehicle['Vehicle_Name']; ?></td>
                    <td><?php echo $vehicle['capacity']; ?></td>
                    <td><a class='editbutton' href='viewmore.php?reg_no=<?php echo $vehicle['Registration_Number']; ?>'>View More</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
