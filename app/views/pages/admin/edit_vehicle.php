<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
    <style>
    /* Add your custom styles here */

    /* Styles for the form */
    .form-box {
        margin-top: 20px;
    }

    .form-box .button-box {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .form-box .toggle-btn {
        width: 45%;
        height: 45px;
        background: transparent;
        border: 2px solid #ffffff;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        cursor: pointer;
        font-size: 16px;
        color: #ffffff;
        font-weight: 600;
        text-align: center;
        line-height: 40px;
        text-decoration: none;
        transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
    }

    .form-box .toggle-btn:hover {
        background-color: #2a2c31;
        color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    }

    .form-box .column {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .form-box .section {
        margin-bottom: 20px;
    }

    .form-box label {
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 5px;
    }

    .form-box select,
    .form-box input[type="text"],
    .form-box input[type="date"] {
        width: 100%;
        padding: 10px;
        border-radius: 15px;
        border: 1px solid #ffffff;
        background-color: transparent;
        color: #ffffff;
        box-sizing: border-box;
        font-size: medium;
        margin-bottom: 20px;
    }

    .form-box input[type="submit"] {
        width: 100%;
        height: 45px;
        background: #ffffff;
        border: none;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        cursor: pointer;
        font-size: 20px;
        color: #2a2c31;
        font-weight: 600;
        text-align: center;
        line-height: 45px;
        display: inline-block;
        text-decoration: none;
        transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
    }

    .form-box input[type="submit"]:hover {
        background-color: #2a2c31;
        color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    }

    .form-box input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }

    .form-box input[type="text"]::placeholder,
    .form-box input[type="date"]::placeholder,
    .form-box select::placeholder {
        color: #ffffff;
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