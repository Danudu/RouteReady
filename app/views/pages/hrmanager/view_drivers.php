<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>
</head>

<body>
    <h2>Drivers</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Driver ID</th>
              
                <th>Status</th>
                
        </thead>
        <tbody>
            <?php foreach ($data['drivers'] as $driver): ?>
                <tr>
                    <td><?php echo $driver->name; ?></td>
                    <td><?php echo $driver->emp_id; ?></td>
                 
                    <td><?php echo $driver->status; ?></td>
                    <td><a href="<?php echo URLROOT; ?>/hrmanagers/moreDriver/<?php echo $driver->id; ?>">More</a></td>
                 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="<?php echo URLROOT; ?>/pages/home">Back</a>
</body>

</html>