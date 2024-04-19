<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $driver = $data['driver']; ?>
    <title>Driver - <?php if (!empty($data['driver'])): ?>
                        <?php echo $driver->name; ?>
                    <?php endif; ?>  | RouteReady
    </title>
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
                <?php $driver = $data['driver']; ?>
    
                <h2>Driver -
                    <?php if (!empty($data['driver'])): ?>
                        <?php echo $driver->name; ?>
                    <?php endif; ?>
                </h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Driver ID</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Approve/Reject</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
    
                        <?php if (!empty($data['driver'])): ?>
                            <tr>
                                <td><?php echo $driver->name; ?></td>
                                <td><?php echo $driver->emp_id; ?></td>
                                <td><?php echo $driver->email; ?></td>
                                <td><?php echo $driver->contact_num; ?></td>
                                <td><?php echo $driver->address; ?></td>
                                <td><?php echo $driver->department; ?></td>
                                <td><?php echo $driver->status; ?></td>
                                <td>
                                    <?php if ($driver->status === 'approved'): ?>
                                        <form
                                            action="<?php echo URLROOT; ?>/hrmanagers/updatedriverStatus/<?php echo $driver->id; ?>"
                                            method="POST">
                                            <button class="button" type="submit" name="action" value="reject">Reject</button>
                                        </form>
                                    <?php elseif ($driver->status === 'pending'): ?>
                                        <form
                                            action="<?php echo URLROOT; ?>/hrmanagers/updatedriverStatus/<?php echo $driver->id; ?>"
                                            method="POST">
                                            <button class="button" type="submit" name="action" value="approve">Approve</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="<?php echo URLROOT; ?>/hrmanagers/deletedriver/<?php echo $driver->id; ?>"
                                        method="POST">
                                        <button class="button" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No data available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <a class="button" href="<?php echo URLROOT; ?>/hrmanagers/viewDrivers">Back</a>
    
            </div>
        </div>
    </div>



</body>

</html>