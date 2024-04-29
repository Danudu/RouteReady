<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRManagers | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navbar2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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

        .wrapper{
   
   background-color: rgb(31, 33, 37, 0.4);
   
   border: 2px solid var(--primary-color-extra-light);

   color: var(--white);
   border-radius: 12px;
   padding: 30px 40px;
   margin: auto;
   margin-top: 30px;
   margin-left: 30px;
   margin-right: 30px;

}

h2 {
   margin-bottom: 20px;
}

table {
   width: 100%;
   border-collapse: collapse;
   margin-bottom: 20px;
}


th,
td {
   padding: 10px;
   text-align: left;
   border-bottom: 1px solid var(--primary-color-light);
}

th {
   background-color: var(--primary-color-light);
}


tbody tr:hover {
   background-color: var(--primary-color-extra-light);
   
}

.button {
   width: 150px;
   height: 45px;
   background: var(--text-light);
   border: none;
   outline: none;
   border-radius: 40px;
   box-shadow: 0 0 10px rgba(0, 0, 0, .1);
   cursor: pointer;
   font-size: 16px;
   color: var(--primary-color);
   font-weight: 600;
   text-align: center;
   line-height: 45px;
   display: inline-block;
   text-decoration: none;
   transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
}

.button:hover {
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
            <!-- <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/hrmanagers/dashboard">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="icon_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
            </ul> -->
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
                    <a href="<?php echo URLROOT; ?>/posts/terms">
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

<script>
let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");

btn.onclick = function () {
    sidebar.classList.toggle("active");
};
</script>


<div class="main-content">
    <div class="container">
        
        <div class="wrapper">
                <h2>HRManagers</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Employee ID</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Address</th>
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