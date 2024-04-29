<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Applications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Leave Applications</h2>
        <?php if(isset($data['error'])) : ?>
            <div class="alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>
        <?php if(isset($data['success'])) : ?>
            <div class="alert alert-success"><?php echo $data['success']; ?></div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Type</th>
                    <th>Medical Report</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Number of Days</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $leaveApplications = $data['leaveApplications'];
                var_dump($leaveApplications);
                foreach ($leaveApplications as $key => $leaveApplication) : 
                ?>
                    <tr>
                        <td><?php echo $leaveApplication->user_id; ?></td>
                        <td><?php echo $leaveApplication->type; ?></td>
                        <td><?php echo (!empty($leaveApplication->medical_report)) ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $leaveApplication->std_date; ?></td>
                        <td><?php echo $leaveApplication->end_date; ?></td>
                        <td><?php echo $leaveApplication->no_of_days; ?></td>
                        <td><?php echo $leaveApplication->reason; ?></td>
                        <td>
                            <?php echo ($leaveApplication->status == 0) ? 'Pending' : (($leaveApplication->status == 1) ? 'Approved' : 'Rejected'); ?>
                        </td>
                        <td>
                        <?php if($leaveApplication->status == 0): ?>
                            <form action="<?php echo URLROOT; ?>/drivers/processLeaveAction" method="post">
                            <input type="hidden" name="leave_id" value="<?php echo $leaveApplication->leave_id; ?>">
                            <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                        </form>
                        <?php elseif ($leaveApplication->status == 1): ?>
                            <button class="btn btn-success" disabled>Approved</button>
                        <?php elseif ($leaveApplication->status == 2): ?>
                            <button class="btn btn-danger" disabled>Rejected</button>
                         <?php endif; ?>
                        </td>
                    </tr>
               
            </tbody>
            <?php endforeach; ?>    
        </table>
    </div>
</body>
</html>
