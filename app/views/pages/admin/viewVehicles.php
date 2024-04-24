<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Vehicles</title>
    <link rel="stylesheet" href="../../../public/assets/css/Navigation.css">  
    <link rel="stylesheet" href="../../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">

    <div>
        <table class="table" border="1" style="border-left: 50%;">
            <tr>
                <th>Registration Number</th>
                <th>Vehicle Number</th>
                <th>Vehicle Type</th>
                <th>Capacity</th>
                <th colspan="3">Options</th> <!-- Added colspan="3" for the new column -->
            </tr>

            <?php
            include_once('Admins.php');

            $admins = new Admins();
            $vehicles = $admins->getVehicleDetails();

            if (count($vehicles) > 0) {
                foreach ($vehicles as $vehicle) {
                    echo "<tr>";
                    echo "  <td>" . $vehicle->getRegistrationNumber() . "</td>";
                    echo "  <td>" . $vehicle->getVehicleNumber() . "</td>";
                    echo "  <td>" . $vehicle->getVehicleName() . "</td>";
                    echo "  <td>" . $vehicle->getCapacity() . "</td>";
                    echo "  <td><a class='editbutton' href='viewmore.php?reg_no=" . $vehicle->getRegistrationNumber() . "'>View More</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No vehicle details found</td></tr>";
            }
            ?>
        </table>
    </div> 
</body>
</html>