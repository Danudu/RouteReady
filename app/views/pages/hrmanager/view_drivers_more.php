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
            <?php if (!empty($data['drivers'])): ?>
                <?php $driver = $data['drivers'][0]; ?>
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
                            <form action="<?php echo URLROOT; ?>/hrmanagers/updatedriverStatus/<?php echo $driver->id; ?>"
                                method="POST">
                                <button type="submit" name="action" value="reject">Reject</button>
                            </form>
                        <?php elseif ($driver->status === 'pending'): ?>
                            <form action="<?php echo URLROOT; ?>/hrmanagers/updatedriverStatus/<?php echo $driver->id; ?>"
                                method="POST">
                                <button type="submit" name="action" value="approve">Approve</button>
                            </form>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="<?php echo URLROOT; ?>/hrmanagers/deletedriver/<?php echo $driver->id; ?>"
                            method="POST">
                            <button type="submit">Delete</button>
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
</body>

</html>