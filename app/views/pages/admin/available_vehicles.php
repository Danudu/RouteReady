<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Vehicles</title>
</head>
<body>
    <h1>Available Vehicles</h1>
    <ul>
        <?php foreach ($data['availableVehicles'] as $vehicle): ?> 
        

            <li><?php echo $vehicle->Registration_Number; ?></li>
          
        <?php endforeach; ?>
    </ul>
</body>
</html>
