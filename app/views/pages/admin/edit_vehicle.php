<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle</title>

    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
    <style>
        /* Styles from editworktrip.php */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        .main-content {
            padding: 50px 0;
            background-image: url(http://localhost:8888/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .container {
            backdrop-filter: blur(10px) brightness(0.8);
            /* max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 10px; */
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            max-width: 800px;
            margin: auto;
            width: 800px;
        }

        .topic-content {
            text-align: center;
            margin-bottom: 30px;
        }

        .topic-content h2 {
            color: #fff;
            font-size: 28px;
            font-weight: 600;
        }

        .form-box {
            background-color: rgba(31, 33, 37, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        /* Adjustments specific to edit_vehicle.php */
        /* Adjustments if any */
    </style>
</head>

<body>

    <div class="edit-vehicle-form">
        <h3>Edit Vehicle</h3>
        <form action="<?php echo URLROOT; ?>/admins/editVehicle/<?php echo $data['registration_number']; ?>" method="POST" class="vehicle-form">
            <label for="vehicleNumber">Vehicle Number:</label>
            <input type="text" id="vehicleNumber" name="vehicleNumber" value="<?php echo $data['vehicle_number']; ?>" required class="form-input">

            <label for="vehicleType">Vehicle Type:</label>
            <input type="text" id="vehicleType" name="vehicleType" value="<?php echo $data['vehicle_type']; ?>" required class="form-input">

            <label for="vehicleModel">Vehicle Model:</label>
            <input type="text" id="vehicleModel" name="vehicleModel" value="<?php echo $data['vehicle_model']; ?>" required class="form-input">

            <label for="registrationYear">Registration Year:</label>
            <input type="text" id="registrationYear" name="registrationYear" value="<?php echo $data['registration_year']; ?>" required class="form-input">

            <label for="vehicleYear">Manufacture Year:</label>
            <input type="text" id="vehicleYear" name="vehicleYear" value="<?php echo $data['manufacture_year']; ?>" required class="form-input">

            <label for="vin">VIN Number:</label>
            <input type="text" id="vin" name="vin" value="<?php echo $data['vin_number']; ?>" required class="form-input">

            <label for="insuranceCo">Insurance Company:</label>
            <input type="text" id="insuranceCo" name="insuranceCo" value="<?php echo $data['insurance_company']; ?>" required class="form-input">

            <label for="insuranceNo">Insurance Number:</label>
            <input type="text" id="insuranceNo" name="insuranceNo" value="<?php echo $data['insurance_number']; ?>" required class="form-input">

            <label for="capacity">Passenger Capacity:</label>
            <input type="text" id="capacity" name="capacity" value="<?php echo $data['passenger_capacity']; ?>" required class="form-input">

            <button type="submit" class="edit-button">Update</button>
        </form>
    </div>

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>
</body>

</html>