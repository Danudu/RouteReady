<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add vehicles</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <section class="header">
        <div class="topic-content">
            <h3>Vehicle Registration</h3>
        </div>
   
        <form id="vehicleForm" action="<?php echo URLROOT; ?>/admins/addVehicles" method="post">
            <div >
                 <a href="<?php echo URLROOT; ?>/admins/getVehicleDetails" class="btn">View Vehicles</a>
            </div>
            <div class="form-group">
                <button type="button" id="viewRegistrationBtn">View Registration</button>
            </div>
           
            <div class="form-group">
                <label for="reg_no">Registration number:</label>
                <input type="text" id="reg_no" name="reg_no" placeholder="Enter Registration Number">
            </div>
            
            <div class="form-group">
                <label for="v_no">Vehicle Number (Number Plate):</label>
                <input type="text" id="v_no" name="v_no" placeholder="Enter Vehicle Number">
            </div>

            <div class="form-group">
                <label for="name">Vehicle Type:</label>
                <input type="text" id="name" name="name" placeholder="Enter Vehicle Type">
            </div>
            
            <div class="form-group">
                <label for="model">Vehicle Model:</label>
                <input type="text" id="model" name="model" placeholder="Enter Vehicle Model">
            </div>
            
            <div class="form-group">
                <label for="r_year">Vehicle Registration Year:</label>
                <input type="text" id="r_year" name="r_year" placeholder="Enter Vehicle Registration Year">
            </div>
            
            <div class="form-group">
                <label for="vin">Vehicle VIN Number:</label>
                <input type="text" id="vin" name="vin" placeholder="Enter Vehicle VIN Number">
            </div>
            
            <div class="form-group">
                <label for="year">Vehicle Manufacture Year:</label>
                <input type="text" id="year" name="year" placeholder="Enter Vehicle Manufacture Year">
            </div>
            
            <div class="form-group">
                <label for="insu_pro">Vehicle Insurance Company:</label>
                <input type="text" id="insu_pro" name="insu_pro" placeholder="Enter Insurance Company">
            </div>
            
            <div class="form-group">
                <label for="insu_pn">Vehicle Insurance Number:</label>
                <input type="text" id="insu_pn" name="insu_pn" placeholder="Enter Insurance Number">
            </div>
            
            <div class="form-group">
                <label for="capacity">Vehicle Passenger Capacity:</label>
                <input type="text" id="capacity" name="capacity" placeholder="Enter Passenger Capacity">
            </div>
            
            <div class="form-group">
                <label for="image">Vehicle Front Photo:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label for="images1">Vehicle Side Photo 1:</label>
                <input type="file" name="images1" id="images1" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label for="images2">Vehicle Side Photo 2:</label>
                <input type="file" name="images2" id="images2" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>

        <script>
            document.getElementById('viewRegistrationBtn').addEventListener('click', function() {
                window.location.href = "./view.php";
            });

            document.getElementById('vehicleForm').addEventListener('submit', function(event) {
                // Get form fields
                const regNo = document.getElementById('reg_no').value;
                const vNo = document.getElementById('v_no').value;
                const name = document.getElementById('name').value;
                const year = document.getElementById('year').value;
                const capacity = document.getElementById('capacity').value;
                const vin = document.getElementById('vin').value;
                const model = document.getElementById('model').value;
                const insu_pro = document.getElementById('insu_pro').value;
                const insu_pn = document.getElementById('insu_pn').value;
                const image = document.getElementById('image').value;
                const images1 = document.getElementById('images1').value;
                const images2 = document.getElementById('images2').value;

                // Regular expressions for validation
                const numbersOnly = /^[0-9]+$/;

                // Flag to track if the form is valid
                let formIsValid = true;

                // Validation messages
                let validationMessages = [];

                // Validate fields for emptiness
                if (!regNo || !vNo || !name || !year || !capacity) {
                    validationMessages.push('All fields must be filled.');
                }

                // Validate registration number (should contain only numbers)
                if (!numbersOnly.test(regNo)) {
                    validationMessages.push('Registration number must consist of numbers only.');
                }

                // Validate "Year" field for numbers-only and exactly four digits
                if (!numbersOnly.test(year) || year.length !== 4) {
                    validationMessages.push('Year must contain exactly four digits and consist of numbers only.');
                }

                // Display validation messages
                if (validationMessages.length > 0) {
                    alert(validationMessages.join('\n'));
                    formIsValid = false;
                }

                // If the form is not valid, prevent submission
                if (!formIsValid) {
                    event.preventDefault();
                }
            });
        </script>
    </section>
</body>
</html>