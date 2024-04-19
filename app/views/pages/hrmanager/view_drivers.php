<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/driver/driver.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="nav__logo">
                <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></a>
            </div>
            <div class="nav__links">
                <p class="link"><a href="<?php echo URLROOT; ?>/pages/home">Home</a></p>
            </div>
        </nav>
        <div class="wrapper">
            <div class="container2">
                <h2>Drivers</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Driver ID</th>
                            <th>Status</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['drivers'])): ?>
                            <?php foreach ($data['drivers'] as $driver): ?>
                                <tr>
                                    <td><?php echo $driver->name; ?></td>
                                    <td><?php echo $driver->emp_id; ?></td>
                                    <td><?php echo $driver->status; ?></td>
                                    <td><a class="button"
                                            href="<?php echo URLROOT; ?>/hrmanagers/moreDriver/<?php echo $driver->id; ?>">More</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No data available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
    
                <a class="button" href="<?php echo URLROOT; ?>/pages/home">Back</a>
            </div>
        </div>
    </div>
</body>

</html>