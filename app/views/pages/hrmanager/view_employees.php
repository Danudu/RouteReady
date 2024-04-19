<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
</head>

<body>
    <h2>Employees</h2>
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
            <?php foreach ($data['employees'] as $employee): ?>
                <tr>
                    <td><?php echo $employee->name; ?></td>
                    <td><?php echo $employee->emp_id; ?></td>
                    <td><?php echo $employee->email; ?></td>
                    <td><?php echo $employee->contact_num; ?></td>
                    <td><?php echo $employee->address; ?></td>
                    <td><?php echo $employee->department; ?></td>
                    <td><?php echo $employee->status; ?></td>
                    <td>
                        <?php if ($employee->status === 'approved'): ?>
                            <form action="<?php echo URLROOT; ?>/hrmanagers/updateEmployeeStatus/<?php echo $employee->id; ?>" method="POST">
                                <button type="submit" name="action" value="reject">Reject</button>
                            </form>
                        <?php elseif ($employee->status === 'pending'): ?>
                            <form action="<?php echo URLROOT; ?>/hrmanagers/updateEmployeeStatus/<?php echo $employee->id; ?>" method="POST">
                                <button type="submit" name="action" value="approve">Approve</button>
                            </form>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="<?php echo URLROOT; ?>/hrmanagers/deleteEmployee/<?php echo $employee->id; ?>" method="POST">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?php echo URLROOT; ?>/pages/home">Back</a>
</body>

</html>