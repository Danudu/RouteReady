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
        <form action="<?php echo URLROOT; ?>/drivers/submitLeaveApplication" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="type">Leave Type:</label>
                <select id="type" name="type" required>
                    <option value="select">-Select-</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Personal">Personal</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group" id="medical-report-field" style="display: none;">
                <label for="medical_report">Medical Report:</label>
                <input type="file" id="medical_report" name="medical_report">
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

    <!-- JavaScript -->
    <script>
        document.getElementById('type').addEventListener('change', function() {
            var type = this.value;
            var medicalReportField = document.getElementById('medical-report-field');
            if (type === 'Sick Leave') {
                medicalReportField.style.display = 'block';
            } else {
                medicalReportField.style.display = 'none';
            }
        });



        document.getElementById('type').addEventListener('change', function() {
    var type = this.value;
    var medicalReportField = document.getElementById('medical-report-field');
    var medicalReportInput = document.getElementById('medical_report');

    if (type === 'Sick Leave') {
        medicalReportField.style.display = 'block';
        // Clear previous error message
        medicalReportInput.setCustomValidity('');
    } else {
        medicalReportField.style.display = 'none';
    }
});

document.getElementById('medical_report').addEventListener('change', function() {
    var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (this.files.length > 0 && !allowedTypes.includes(this.files[0].type)) {
        this.setCustomValidity('Please select only an image file.');
    } else {
        this.setCustomValidity('');
    }
});

document.getElementById('std_date').addEventListener('change', function() {
    var currentDate = new Date();
    var selectedDate = new Date(this.value);
    
    // Remove the time part from currentDate for comparison
    currentDate.setHours(0, 0, 0, 0);

    if (selectedDate < currentDate) {
        this.setCustomValidity('Start date cannot be a previous date.');
    } else {
        this.setCustomValidity('');
    }
});


document.getElementById('end_date').addEventListener('change', function() {
    var currentDate = new Date();
    var selectedDate = new Date(this.value);
    if (selectedDate < currentDate) {
        this.setCustomValidity('End date cannot be a previous date.');
    } else {
        this.setCustomValidity('');
    }
});

document.getElementById('no_of_days').addEventListener('input', function() {
    if (!(/^\d+$/.test(this.value))) {
        this.setCustomValidity('Please enter only digits for number of days.');
    } else {
        this.setCustomValidity('');
    }
});




    </script>
</body>
</html>

