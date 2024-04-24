<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add vehicles</title>
    <link rel="stylesheet" href="../../../public/assets/css/Navigation.css">  
    <link rel="stylesheet" href="../../../public/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,300;0,400;1,100&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ab9ce5f97.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <section class="header">
        <div class="side-nav">
            <a href="#" class="logo">
                <img src="../../../public/assets/img/logo.jpg" class="logo-img">
            </a>
           <ul class="side-content">
            <li><a href="../navigation.html"><i class="fa-solid fa-house-user"><p>Home</p> </i></a></li>
            <li><a href="../profile.html"><i class="fa-solid fa-user"><p>Profile</p></i> </a></li>
            <li><a href="../AddVehicles.html"><i class="fa-solid fa-bus-simple"><p>Vehicle</p> </i></a></li>
            <li><a href="../worktrip.html"><i class="fa-solid fa-car-rear"><p>WorkTrip</p> </i></a></li>
            <li><a href="../payment.html"><i class="fa-solid fa-money-check-dollar"><p>Payment Reports</p></i> </a></li>
            <li><a href="../HR_account.html"><i class="fa-solid fa-file-contract"><p>HR Accounts</p></i> </a></li>
            <li><a href="../schedule.html"><i class="fa-solid fa-qrcode"><p>Schedule</p></i> </a></li>
            <li><a href="../../employee/reservation/Home.html"><i class="fa-solid fa-right-from-bracket"><p>Log Out</p></i> </a></li>
            <div class="active" style="transition: top 0.5s;"></div>
            </ul>
        </div>

    
    <div class="topic-content">
        <h3>Vehicle Registration</h3>
    </div>
    <form action="AddVehicles.php" method="post">
        <section class="topic" >
            <div class="form">
                <div class="topic-content">
                    <h3> Vehicle Registration</h3>
                </div>
                
            
             <section class="section">
                <div class="submit input">
                    <button type="button" id="viewRegistrationBtn">View Registration</button>
                </div>
            </section>
            <div class="container clearfix">
                <div class="column">
                    <div style="margin-left:-200%;margin-top:0%">
               
                    
                    <div>
                        <section class="section">
                        <span class="drop-topic"></span> <label for="reg_no">Registration number:</label></span>
                        <div class="dropoff">
                        <input type="text" id="reg_no" name="reg_no" placeholder="Enter Registration Number"></div>
                        </section>
                    </div>
               
                    <br/>
                    <div>
                        <section class="section">
                        <span class="drop-topic"></span> <label for="v_no">Vehicle  Number(Number Plate):</label></span>
                        <div class="dropoff">
                        <input type="text" id="v_no" name="v_no" placeholder="Enter Vehicle Number"></div>
                        </section>
                    </div>
                    <br/>
                    <div>
                        <section class="section">
                        <span class="drop-topic"></span> <label for="name">Vehicle Type:</label></span>
                        <div class="dropoff">
                            <input type="text" id="name" name="name" placeholder="Enter Vehicle Type "></div>
                        </section>
                    </div>
                    <br/>
                    <div>
                        <section class="section">
                        <span class="drop-topic"></span> <label for="name">Vehicle Model:</label></span>
                        <div class="dropoff">
                            <input type="text" id="model" name="model" placeholder="Enter Vehicle Model "></div>
                        </section>
                    </div>
                    <br/>
                    <div>
                        <section class="section">
                        <span class="drop-topic"></span> <label for="name">Vehicle Registration Year:</label></span>
                        <div class="dropoff">
                            <input type="text" id="r_year" name="r_year" placeholder="Enter Vehicle Registration Year "></div>
                        </section>
                    </div>
                    <br/>
                    <div>
                        <section class="section">
                        <span class="drop-topic"></span> <label for="name">Vehicle VIN Number:</label></span>
                        <div class="dropoff">
                            <input type="text" id="vin" name="vin" placeholder="Enter Vehicle VIN Number "></div>
                        </section>
                    </div>
                    <br/>
                    <div>
                        <section class="section">
                        <span class="drop-topic"></span> <label for="year">Vehicle Manufacture Year:</label></span>
                        <div class="dropoff">
                            <input type="text" id="year" name="year" placeholder="Enter Vehicle  Manufacture Year "></div>
                        </section>
                    </div>
               
                    <br/>
                   
                    

                   
                </div>
                <div class="column">
                    <div style="margin-left:-100%;">
               
                        <div>
                            <section class="section">
                            <span class="drop-topic"></span> <label for="name">Vehicle Insurerance Company:</label></span>
                            <div class="dropoff">
                                <input type="text" id="insu_pro" name="insu_pro" placeholder="Enter Insurerance Company "></div>
                            </section>
                        </div>
                        <br/>
                        <div>
                            <section class="section">
                            <span class="drop-topic"></span> <label for="name">Vehicle Insurerance Number :</label></span>
                            <div class="dropoff">
                                <input type="text" id="insu_pn" name="insu_pn" placeholder="Enter Insurerance Number"></div>
                            </section>
                        </div>
                        <br/>
                   
                    <div>
                        <section class="section">
                        <span class="drop-topic"></span> <label for="capacity">Vehicle Passenger Capacity:</label></span>
                        <div class="dropoff">
                            <input type="text" id="capacity" name="capacity" placeholder="Enter Vehicle Capacity "></div>
                        </section>
                    </div>
                    
                
                   <br/>
                   <div>
                    <section class="section">
                    <span class="drop-topic"></span> <label for="image">Vehicle Front Photo :</label></span>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="image">Choose an image:</label><br>
                    <input type="file" name="image" id="image" accept="image/*" required>
                    </section>
                  </div>
                <br/>
                <div>
                    <section class="section">
                    <span class="drop-topic"></span> <label for="image">Vehicle Side Photo 1 :</label></span>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="image">Choose an image:</label><br>
                    <input type="file" name="images1" id="images1" accept="image/*" required>
                    </section>
                  </div>
                <br/>
                <div>
                    <section class="section">
                    <span class="drop-topic"></span> <label for="image">Vehicle Side Photo 2:</label></span>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="image">Choose an image:</label><br>
                    <input type="file" name="images2" id="images2" accept="image/*" required>
                    </section>
                  </div>
                <br/>

           
                 
                <section class="section">
                    <div class="submit"><input type="submit" value="Register"></div>
                 
                </section>
               
            </div>
        </div>
        </section>
    </section> 
</form>

<script>
    document.getElementById('viewRegistrationBtn').addEventListener('click', function() {
        window.location.href = "./ViewVehicles.php";
    });

    document.getElementById('vehicleForm').addEventListener('submit', function(event) {
        // Get form fields
        const regNo = document.getElementById('reg_no').value;
        const vNo = document.getElementById('v_no').value;
        const name = document.getElementById('name').value;
        const year = document.getElementById('year').value;
        const image = document.getElementById('image').value;
        const images1 = document.getElementById('images1').value;
        const images2 = document.getElementById('images2').value;
        const capacity = document.getElementById('capacity').value;
        const r_year = document.getElementById('r_year').value;
        const vin = document.getElementById('vin').value;
        const model = document.getElementById('model').value;
        const insu_pro = document.getElementById('insu_pro').value;
        const insu_pn = document.getElementById('insu_pn').value;
    

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

        // Validate "Year" field for numbers-only
        if (!numbersOnly.test(year)) {
            validationMessages.push('Year must contain numbers only.');
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
        // Validate "Year" field for numbers-only and exactly four digits
        if (!numbersOnly.test(year) || year.length !== 4) {
         validationMessages.push('Year must contain exactly four digits and consist of numbers only.');
        }

    });
</script>



