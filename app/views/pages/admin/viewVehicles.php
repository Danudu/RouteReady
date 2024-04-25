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
<body>
    <h1>List of Vehicles</h1>
    <table>
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Vehicle Number</th>
                <th>Vehicle Name</th>
                <th>Capacity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['vehicles'] as $vehicle): ?>
                <tr>
                    <td><?php echo $vehicle['Registration_Number']; ?></td>
                    <td><?php echo $vehicle['Vehicle_Number']; ?></td>
                    <td><?php echo $vehicle['Vehicle_Name']; ?></td>
                    <td><?php echo $vehicle['capacity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>