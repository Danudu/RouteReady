<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle</title>
    <link rel="stylesheet" href="../../../public/assets/css/Navigation.css">  
    <link rel="stylesheet" href="../../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
    <style>
        /* Add your CSS styles here */
        .edit-vehicle-form {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .edit-vehicle-form label {
            display: block;
            margin-bottom: 10px;
        }

        .edit-vehicle-form input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .edit-vehicle-form .edit-button {
            background-color: #000000;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <section class="header" style="width: 100%;display: flex;flex-direction: row;">
        <!-- Your navigation section -->
    </section>

    <div class="edit-vehicle-form">
        <h3 style="text-align: center;">Edit Vehicle</h3>
        <form action="<?php echo URLROOT; ?>/admins/editVehicle/<?php echo $data['registration_number']; ?>" method="POST">
    <label for="vehicleNumber">Vehicle Number:</label>
    <input type="text" id="vehicleNumber" name="vehicleNumber" value="<?php echo $data['vehicle_number']; ?>" required>

    <label for="vehicleType">Vehicle Type:</label>
    <input type="text" id="vehicleType" name="vehicleType" value="<?php echo $data['vehicle_type']; ?>" required>

    <label for="vehicleModel">Vehicle Model:</label>
    <input type="text" id="vehicleModel" name="vehicleModel" value="<?php echo $data['vehicle_model']; ?>" required>

    <label for="registrationYear">Registration Year:</label>
    <input type="text" id="registrationYear" name="registrationYear" value="<?php echo $data['registration_year']; ?>" required>

    <label for="vehicleYear">Manufacture Year:</label>
    <input type="text" id="vehicleYear" name="vehicleYear" value="<?php echo $data['manufacture_year']; ?>" required>

    <label for="vin">VIN Number:</label>
    <input type="text" id="vin" name="vin" value="<?php echo $data['vin_number']; ?>" required>

    <label for="insuranceCo">Insurance Company:</label>
    <input type="text" id="insuranceCo" name="insuranceCo" value="<?php echo $data['insurance_company']; ?>" required>

    <label for="insuranceNo">Insurance Number:</label>
    <input type="text" id="insuranceNo" name="insuranceNo" value="<?php echo $data['insurance_number']; ?>" required>

    <label for="capacity">Passenger Capacity:</label>
    <input type="text" id="capacity" name="capacity" value="<?php echo $data['passenger_capacity']; ?>" required>

    <button type="submit" class="edit-button">Update</button>
</form>

    </div>
</body>
</html>
