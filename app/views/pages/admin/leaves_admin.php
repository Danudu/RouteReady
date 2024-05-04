<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/content.css">
    <title>Leaves | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        /* Add your CSS styles here */
        .main-content {
            padding: 50px 20px;
            background-image: url(http://localhost/RouteReady/public/img/pic7.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .wrapper {
            backdrop-filter: blur(10px) brightness(0.8);
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: 0 auto;
        }

        .container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px; /* Add some margin to separate from the footer */
            flex-direction: column;
        }

        h2 {
            color: var(--white);
            margin-bottom: 20px;
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid var(--primary-color-light);
        }

        .table th {
            background-color: var(--primary-color);
            color: var(--text-light);
        }

        .table tr:nth-child(even) {
            background-color: var(--primary-color-extra-light);
        }

        .table tr:hover {
            background-color: var(--primary-color-light);
        }

        .btn {
            width: 100px;
            height: 35px;
            background-color: var(--text-light);
            border: none;
            outline: none;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 35px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-bottom: 10px;
            margin-top: 10px;
        }
        .btn22 {
            width: 100px;
            height: 35px;
            background-color: var(--text-light);
            border: none;
            outline: none;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 35px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        

        .btn:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }
    </style>
</head>

<body>
<div class="sidebar">

        <div class="top">
            <div class="logo">
                <img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="">
                <span class="logo_name">Route Ready</span>
            </div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
        <div class="buttons">
            <ul>
                <li>
                    <a href="home">
                        <i class="fa-solid fa-house"></i>
                        <span class="icon_name">Home</span>
                    </a>
                    <span class="tooltip">HomePage</span>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/pages/profile/<?= $_SESSION['user_id'] ?>">
                        <i class="fas fa-user"></i>
                        <span class="icon_name">Profile</span>
                    </a>
                    <span class="tooltip">Profile</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/addVehicles">
                        <i class="fa-solid fa-van-shuttle"></i>
                        <span class="icon_name">Vehicle</span>
                    </a>
                    <span class="tooltip">Vehicle</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/redirectToTimetable">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span class="icon_name"> Schedule</span>
                    </a>
                    <span class="tooltip">Schedule</span>
                </li>
            </ul>



            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/handleFormSubmission">
                        <i class="fa-solid fa-comments-dollar"></i>
                        <span class="icon_name">ODSalary</span>
                    </a>
                    <span class="tooltip">ODSalary</span>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/viewhr">
                        <i class="fas fa-users"></i>
                        <span class="icon_name">HRManager</span>
                    </a>
                    <span class="tooltip">HRManger</span>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/viewPendingWorkTrips">
                        <i class="fa-solid fa-suitcase-rolling"></i>
                        <span class="icon_name">WorkTrips</span>
                    </a>
                    <span class="tooltip">WorkTrips</span>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/admins/leaves_admin">
                        <i class="fa-solid fa-plus-minus"></i>
                        <span class="icon_name">Leaves</span>
                    </a>
                    <span class="tooltip">Leaves</span>
                </li>
            </ul>
            <ul class="lobtn">
                <li>
                    <a href="<?php echo URLROOT; ?>/users/logout">
                        <i class="fas fa-arrow-right-from-bracket"></i>
                        <span class="icon_name">Logout</span>
                    </a>
                    <span class="tooltip">Logout</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="background">
        <div class="main-content">
            <div class="container">
                <div class="wrapper">    
        <h2>Leave Applications</h2>
        <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>
        <?php if (isset($data['success'])): ?>
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
                // var_dump($leaveApplications);
                foreach ($leaveApplications as $key => $leaveApplication):
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
                            <?php if ($leaveApplication->status == 0): ?>
                                <form action="<?php echo URLROOT; ?>/admins/processLeaveAction" method="post">
                                    <input type="hidden" name="leave_id" value="<?php echo $leaveApplication->leave_id; ?>">
                                    <button type="submit" name="action" value="approve" class="btn">Approve</button>
                                    <button type="submit" name="action" value="reject" class="btn">Reject</button>
                                </form>
                            <?php elseif ($leaveApplication->status == 1): ?>
                                <button class="btn22" disabled>Approved</button>
                            <?php elseif ($leaveApplication->status == 2): ?>
                                <button class="btn22" disabled>Rejected</button>
                            <?php endif; ?>
                        </td>
                    </tr>

                </tbody>
            <?php endforeach; ?>
        </table>
        <!-- back button -->
        <a href="<?php echo URLROOT; ?>/admins/home" class="btn">Back</a> 
    </div>
    </div>
        </div>
    </div>
</body>

</html>