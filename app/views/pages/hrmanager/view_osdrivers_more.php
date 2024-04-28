<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OS-Driver - <?php if (!empty($data['driver'])): ?>
            <?php echo $data['driver']->name; ?>
        <?php endif; ?> | RouteReady
    </title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --text-lighter: #ffffff0f;
            --white: #ffffff;
            --max-width: 1200px;
        }

        body {
            background-color: var(--primary-color);
            color: var(--text-light);
            font-family: Arial, sans-serif;
            background-image: url(http://localhost/RouteReady/public/img/pic2.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            min-width: var(--max-width);

        }

        .container {
            backdrop-filter: blur(10px) brightness(0.3);
            min-height: 100vh;

        }


        nav {
            max-width: var(--max-width);
            margin: auto;
            padding: 1rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        a {
            text-decoration: none;
        }

        .nav__logo {
            max-width: 90px;

        }

        .nav__logo img {
            width: 75%;
            border-radius: 30%;
        }

        .nav__links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .link a {
            position: relative;
            padding-bottom: 0.75rem;
            color: var(--white);
        }

        .link a::after {
            content: "";
            position: absolute;
            height: 2px;
            width: 0;
            left: 0;
            bottom: 0;
            background-color: var(--text-light);
            transition: 0.3s;
        }

        .link a:hover::after {
            width: 50%;
        }

        .container2 {
            margin: 0 auto;
            padding: 20px;
        }

        .wrapper {

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

        .table-container {
            overflow-x: auto;
            max-width: 100%;
            margin-bottom: 20px;
            /* Add margin to separate from other content */
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            
            border-right: 1px solid var(--text-lighter);
            /* Add right border */
        }

        th:last-child,
        td:last-child {
            border-right: none;
            /* Remove right border for last column */
        }
    </style>
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


                <h2>OS Driver -
                    <?php if (!empty($data['driver'])): ?>
                        <?php echo $data['driver']->name; ?>
                    <?php endif; ?>
                </h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>OSDriver ID</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>NIC</th>
                                <th>Drivers License</th>
                                <th>Vehicle Type</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Years of Experience</th>
                                <th>Approve/Reject</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!empty($data['driver']) && !empty($data['osdriver'])): ?>
                                <tr>
                                    <td><?php echo $data['driver']->name; ?></td>
                                    <td><?php echo $data['osdriver']->id; ?></td>
                                    <td><?php echo $data['osdriver']->age; ?></td>
                                    <td><?php echo $data['driver']->email; ?></td>
                                    <td><?php echo $data['osdriver']->nic_number; ?></td>
                                    <td><?php echo $data['osdriver']->driver_license; ?></td>
                                    <td><?php echo $data['osdriver']->vehicle_type; ?></td>
                                    <td><?php echo $data['driver']->contact_num; ?></td>
                                    <td><?php echo $data['driver']->address; ?></td>
                                    <td><?php echo $data['driver']->designation; ?></td>
                                    <td><?php echo $data['driver']->status; ?></td>
                                    <td><?php echo $data['osdriver']->years_of_experience; ?></td>
                                    <td>
                                        <?php if ($data['driver']->status === 'pending'): ?>
                                            <form
                                                action="<?php echo URLROOT; ?>/hrmanagers/updateosdriverStatus/<?php echo $data['driver']->id; ?>"
                                                method="POST">
                                                <button class="button" type="submit" name="action"
                                                    value="approve">Approve</button>
                                            </form>
                                        <?php elseif ($data['driver']->status === 'approved'): ?>
                                            <form
                                                action="<?php echo URLROOT; ?>/hrmanagers/updateosdriverStatus/<?php echo $data['driver']->id; ?>"
                                                method="POST">
                                                <button class="button" type="submit" name="action"
                                                    value="reject">Reject</button>
                                            </form>
                                        <?php elseif ($data['driver']->status === 'rejected'): ?>
                                            <form
                                                action="<?php echo URLROOT; ?>/hrmanagers/updateosdriverStatus/<?php echo $data['driver']->id; ?>"
                                                method="POST">
                                                <button class="button" type="submit" name="action"
                                                    value="approve">Approve</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form
                                            action="<?php echo URLROOT; ?>/hrmanagers/deleteosdriver/<?php echo $data['driver']->id; ?>"
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
                </div>
                <a class="button" href="<?php echo URLROOT; ?>/hrmanagers/viewOSDrivers">Back</a>
            </div>
        </div>
    </div>


</body>

</html>