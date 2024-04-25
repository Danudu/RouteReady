<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Leave</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Apply for Leave</h2>
        <?php if(isset($data['error'])) : ?>
            <div class="alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>
        <form action="<?php echo URLROOT; ?>/drivers/submitLeaveApplication" method="POST">

        <div class="form-group">
    <label for="type">Leave Type:</label>
    <select id="type" name="type" required onchange="showHideMedicalReport()">
        <option value="select">-Select-</option>
        <option value="Sick Leave">Sick Leave</option>
        <option value="Personal">Personal</option>
        <option value="Other">Other</option>
    </select>
</div>

<div id="medicalReportField" style="display: none;" class="form-group">
    <label for="medical_report">Medical Report:</label>
    <input type="file" id="medical_report" name="medical_report" accept="image/*">
</div>

            <div class="form-group">
                <label for="std_date">Start Date:</label>
                <input type="date" id="std_date" name="std_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="no_of_days">Number of Days:</label>
                <input type="number" id="no_of_days" name="no_of_days" required>
            </div>
            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea id="reason" name="reason" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>


</body>
</html>
