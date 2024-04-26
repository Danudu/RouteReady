<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>View Reservations</title>
    <link rel="stylesheet" href="../../../public/assets/css/Navigation.css">  
    <link rel="stylesheet" href="../../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
    <style>
        /* Add your CSS styles here */
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th, .table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .editbutton {
            background-color: #000000;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <section class="header" style ="width: 100%;display:flex;flex-direction:row;">
        <!-- Your navigation section -->
    </section>
   
    <div>
    <h3 style="text-align: center;">Vehicle Registration Details</h3>
    <table class="table">
            <tr>
                <th>Registration Number</th>
                <th>Vehicle Number</th>
                <th>Vehicle Type</th>
                <th>Capacity</th>
                <th colspan="3">Options</th> <!-- Added colspan="3" for the new column -->
            </tr>

            <?php
            // Establish a database connection
            $host = "localhost";
            $username = "root";
            $password = "root";
            $db = "routeready_db";

            $conn = new mysqli($host, $username, $password, $db);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve all vehicle details
            $sql = "SELECT Registration_Number,Vehicle_Number,Vehicle_Name,capacity FROM VehicleDetails";
            $result = $conn->query($sql);
            ?>

            <?php if ($result->num_rows > 0) :?>
                <?php while ($row = $result->fetch_assoc()):?>

                    <?php $reg_no = $row["Registration_Number"];?>
                    <tr>
                        <td><?php echo $row["Registration_Number"] ?></td>;
                        <td><?php echo $row["Vehicle_Number"] ?></td>;
                        <td><?php echo $row["Vehicle_Name"] ?></td>;
                        <td><?php echo $row["capacity"] ?></td>;
                        <!-- <td>" . $row["Vehicle_Number"] . "</td>";
                        <td>" . $row["Vehicle_Name"] . "</td>";
                        <td>" . $row["capacity"] . "</td>"; -->
                        <td><a  href="<?php echo URLROOT ?>/admins/showVehicleDetails/<?php echo $reg_no ?>">View More</a></td>
                        <!-- controllers/Admins.php?action=view&?reg_no=$reg_no" -->
                       
                    </tr>

                <?php endwhile;?>

            <?php else:?>
                <tr><td colspan='7'>No vehicle details found</td></tr>
            <?php endif; ?>
            
            <!-- if ($result->num_rows > 0) {
                // Loop through the results and display the vehicle details

                while ($row = $result->fetch_assoc()) {
                    $reg_no = $row["Registration_Number"];

                    echo "<tr>";
                    echo "  <td>" . $row["Registration_Number"] . "</td>";
                    echo "  <td>" . $row["Vehicle_Number"] . "</td>";
                    echo "  <td>" . $row["Vehicle_Name"] . "</td>";
                    echo "  <td>" . $row["capacity"] . "</td>";

                    // echo "<td><a  href='/controllers/Admins.php?action=view&?reg_no=$reg_no'>View More</a></td>";
                    echo "<td><a href=''</td>";
                   
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No vehicle details found</td></tr>";
            } -->

            <?php
            // Close the database connection
            $conn->close();
            ?>
        </table>
    </div> 
</body>
