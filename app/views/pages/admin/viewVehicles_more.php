

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
        .vehicle-container {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .vehicle-info {
            display: flex;
            flex-direction: column;
        }

        .vehicle-info > div {
            margin-bottom: 10px;
        }

        .edit-delete-buttons {
            display: flex;
            justify-content: flex-end;
        }

        .editbutton, .deletebutton {
            background-color: #000000;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            margin-left: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <section class="header" style="width: 100%;display: flex;flex-direction: row;">
        <!-- Your navigation section -->
    </section>

    <div class="vehicle-container">
        <h3 style="text-align: center;">Vehicle Registration Details</h3>
        <div class="vehicle-info">
            <div><strong>Registration Number:</strong> <?php echo $data['vehicles']->Registration_Number; ?></div>
            <div><strong>Vehicle Number:</strong> <?php echo $data['vehicles']->Vehicle_Number; ?></div>
            <div><strong>Vehicle Type:</strong> <?php echo $data['vehicles']->Vehicle_Name; ?></div>
            <div><strong>Vehicle Model:</strong> <?php echo $data['vehicles']->model; ?></div>
            <div><strong>Capacity:</strong> <?php echo $data['vehicles']->capacity; ?></div>
            <div><strong>Vehicle/Registered Year:</strong> <?php echo $data['vehicles']->Vehicle_Year . ' / ' . $data['vehicles']->Vehicle_Year; ?></div>
            <div><strong>Vin Number:</strong> <?php echo $data['vehicles']->vin; ?></div>
            <div><strong>Insurance Co.:</strong> <?php echo $data['vehicles']->insu_pro; ?></div>
            <div><strong>Insurance No.:</strong> <?php echo $data['vehicles']->insu_pn; ?></div>
        </div>
        <div class="edit-delete-buttons">
            <a href="<?php echo URLROOT; ?>/admins/viewvehicle/<?php echo $data['vehicles']->Registration_Number; ?>" class="editbutton">Back</a>
            
        </div>
    </div>
</body>
</html>
