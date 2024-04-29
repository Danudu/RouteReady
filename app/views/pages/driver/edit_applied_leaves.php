<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Leave Application</title>
    <link rel="stylesheet" href="path/to/your/css/style.css"> <!-- Include your CSS file -->
    <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url(http://localhost/RouteReady/public/img/pic5.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        .container {
            backdrop-filter: blur(10px) brightness(0.3);
            min-height: 100vh;
            padding-bottom: 30px;
            max-width: 800px; /* Added max-width */
            background-color: rgba(31, 33, 37, 0.4); /* Changed background color */
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: auto;
            margin-top: 30px;
        }

        h2 {
            font-size: 36px;
            text-align: center;
        }

        .form-group {
            margin: 15px 0; /* Adjusted margin */
        }

        label {
            color: var(--white); /* Changed label color */
            font-weight: bold;
        }

        input[type="date"],
        input[type="number"],
        textarea {
            width: 100%;
            height: 40px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid var(--text-light);
            background-color: var(--primary-color-light);
            color: var(--text-light);
            margin-top: 5px; /* Adjusted margin */
        }

        select {
            width: 100%;
            height: 40px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid var(--text-light);
            background-color: var(--primary-color-light);
            color: var(--text-light);
            margin-top: 5px; /* Adjusted margin */
        }

        textarea {
            height: 80px; /* Adjusted height */
        }

        .button {
            width: 100%;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-top: 10px; /* Adjusted margin */
        }

        .button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        .alert {
            background-color: #ffcccc;
            color: #cc0000;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
       
        <h2>Edit Leave Application</h2>
        <?php if(isset($data['error'])) : ?>
            <div class="alert"><?php echo $data['error']; ?></div>
        <?php endif; ?>
        <form action="<?php echo URLROOT; ?>/drivers/updateLeaveApplication/<?php echo $data['leave']->leave_id; ?>"" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="leave_id" value="<?php echo $data['leave']->leave_id; ?>">
            <div class="form-group">
                <label for="type">Leave Type:</label>
                <select id="type" name="type" required>
                    <option value="Medical Leave" <?php echo ($data['leave']->type == 'Medical Leave') ? 'selected' : ''; ?>>Medical Leave</option>
                    <option value="Sick Leave" <?php echo ($data['leave']->type == 'Sick Leave') ? 'selected' : ''; ?>>Sick Leave</option>
                    <option value="Personal" <?php echo ($data['leave']->type == 'Personal') ? 'selected' : ''; ?>>Personal Leave</option>
                    <option value="Other" <?php echo ($data['leave']->type == 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="std_date">Start Date:</label>
                <input type="date" id="std_date" name="std_date" value="<?php echo $data['leave']->std_date; ?>" min="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" value="<?php echo $data['leave']->end_date; ?>" min="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group">
                <label for="no_of_days">Number of Days:</label>
                <input type="number" id="no_of_days" name="no_of_days" value="<?php echo $data['leave']->no_of_days; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea id="reason" name="reason"><?php echo $data['leave']->reason; ?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="0" <?php echo ($data['leave']->status == 0) ? 'selected' : ''; ?>>Pending</option>
                    <option value="1" <?php echo ($data['leave']->status == 1) ? 'selected' : ''; ?>>Approved</option>
                    <option value="2" <?php echo ($data['leave']->status == 2) ? 'selected' : ''; ?>>Rejected</option>
                </select>
            </div>
            <button type="submit" class="button">Update</button>
        </form>
    </div>
</body>
</html>
