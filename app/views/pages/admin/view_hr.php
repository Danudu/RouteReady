<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/employee/employee.css">
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
                <h2>HR Managers</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Employee ID</th>
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
                        <?php if (!empty($data['hrmanagers'])): ?>
                            <?php foreach ($data['hrmanagers'] as $hrmanager): ?>
                                <tr>
                                    <td><?php echo $hrmanager->name; ?></td>
                                    <td><?php echo $hrmanager->emp_id; ?></td>
                                    <td><?php echo $hrmanager->email; ?></td>
                                    <td><?php echo $hrmanager->contact_num; ?></td>
                                    <td><?php echo $hrmanager->address; ?></td>
                                    <td><?php echo $hrmanager->department; ?></td>
                                    <td><?php echo $hrmanager->status; ?></td>
                                    <td>
                                        <?php if ($hrmanager->status === 'pending'): ?>
                                            <form
                                            action="<?php echo URLROOT; ?>/admins/updateHRStatus/<?php echo $hrmanager->id; ?>"
                                            method="POST">
                                            <button class="button" type="submit" name="action" value="approve">Approve</button>
                                        </form>
                                        <?php elseif ($hrmanager->status === 'approved'): ?>
                                            <form
                                                action="<?php echo URLROOT; ?>/admins/updateHRStatus/<?php echo $hrmanager->id; ?>"
                                                method="POST">
                                                <button class="button" type="submit" name="action" value="reject">Reject</button>
                                            </form>
                                        <?php elseif($hrmanager->status === 'rejected'): ?>
                                            <form
                                                action="<?php echo URLROOT; ?>/admins/updateHRStatus/<?php echo $hrmanager->id; ?>"
                                                method="POST">
                                                <button class="button" type="submit" name="action" value="approve">Approve</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form
                                            action="<?php echo URLROOT; ?>/admins/deleteHR/<?php echo $hrmanager->id; ?>"
                                            method="POST">
                                            <button class="button" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">No data available</td>
                        </tr>
                    <?php endif; ?>
                </table>

                <a class="button" href="<?php echo URLROOT; ?>/pages/home">Back</a>
            </div>
        </div>
    </div>
</body>

</html>