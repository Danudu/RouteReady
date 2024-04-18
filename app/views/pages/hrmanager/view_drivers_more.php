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
           
                <tr>
                    <td><?php echo $data['user']->name; ?></td>
                    <td><?php echo $data['user']->emp_id; ?></td>
                    <td><?php echo $data['user']->email; ?></td>
                    <td><?php echo $data['user']->contact_num; ?></td>
                    <td><?php echo $data['user']->address; ?></td>
                    <td><?php echo $data['user']->department; ?></td>
                    <td><?php echo $data['user']->status; ?></td>
                    <td>
                        <?php if ($data['user']->status === 'approved'): ?>
                            <form action="<?php echo URLROOT; ?>/hrmanagers/updatedriverStatus/<?php echo $data['user']->id; ?>" method="POST">
                                <button type="submit" name="action" value="reject">Reject</button>
                            </form>
                        <?php elseif ($data['user']->status === 'pending'): ?>
                            <form action="<?php echo URLROOT; ?>/hrmanagers/updatedriverStatus/<?php echo $data['user']->id; ?>" method="POST">
                                <button type="submit" name="action" value="approve">Approve</button>
                            </form>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="<?php echo URLROOT; ?>/hrmanagers/deletedriver/<?php echo $data['user']->id; ?>" method="POST">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    
                </tr>
            
        </tbody>
    </table>
</body>

</html>