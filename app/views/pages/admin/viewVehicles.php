<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
    <!-- Include CSS and other resources -->
</head>
<body>
    <div>
        <table class="table" border="1" style="border-left: 50%;">
            <tr>
                <th>Registration Number</th>
                <th>Vehicle Number</th>
                <th>Vehicle Type</th>
                <th>Capacity</th>
                <th colspan="3">Options</th>
            </tr>

            <?php
            // Loop through the vehicle data passed from the controller
            foreach ($vehicles as $vehicle) {
                echo "<tr>";
                echo "  <td>" . $vehicle["Registration_Number"] . "</td>";
                echo "  <td>" . $vehicle["Vehicle_Number"] . "</td>";
                echo "  <td>" . $vehicle["Vehicle_Name"] . "</td>";
                echo "  <td>" . $vehicle["capacity"] . "</td>";
                echo "  <td><a class='editbutton' href='viewmore.php?reg_no=" . $vehicle["Registration_Number"] . "'>View More</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
