<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
    <style>
        /* Add your CSS styles here */
        /* Existing styles */
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

        /* Additional styles */
        .header {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: var(--primary-color);
            position: fixed;
            top: 0;
            left: -250px;
            transition: left 0.3s ease;
            z-index: 999;
            overflow-y: auto;
            padding-top: 60px;
        }

        .active {
            left: 0;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            color: var(--white);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 30px;
            margin-right: 10px;
        }

        .logo_name {
            font-size: 20px;
            font-weight: 600;
        }

        .buttons ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .buttons ul li {
            margin-bottom: 10px;
        }

        .buttons ul li a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--text-light);
            transition: 0.3s;
            padding: 10px;
        }

        .buttons ul li a:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
        }

        .tooltip {
            position: absolute;
            top: -20px;
            left: calc(100% + 10px);
            background-color: var(--primary-color-light);
            color: var(--white);
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .buttons ul li:hover .tooltip {
            opacity: 1;
        }
    </style>
</head>
<body>

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
    
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>
</body>
</html>
