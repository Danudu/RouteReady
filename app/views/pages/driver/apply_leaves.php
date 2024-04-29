<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Leave Form</title>
</head>

<body>
    <h1>Apply Leave</h1>
    <form action="<?php echo URLROOT; ?>/leaves/applyLeave" method="post">
        <label for="leave_date">Leave Date:</label>
        <input type="date" id="leave_date" name="leave_date" required>

        <label for="leave_type">Leave Type:</label>
        <select id="leave_type" name="leave_type" required>
            <option value="general">General</option>
            <option value="medical">Medical</option>
        </select>

        <label for="reason">Reason:</label>
        <textarea id="reason" name="reason" required></textarea>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
