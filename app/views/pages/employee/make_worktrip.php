<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Worktrip Reservation</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const timeInput = document.getElementById('triptime');
            const ampmSelect = document.getElementById('ampm');

            timeInput.addEventListener('change', function () {
                const selectedTime = timeInput.value;
                const selectedAMPM = ampmSelect.value;
                const formattedTime = selectedTime + ' ' + selectedAMPM;
                timeInput.value = formattedTime;
            });
        });
    </script>

</head>

<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <div class="topic-content">
        <h2>Transport Reservation</h2>
    </div>

    <div class="form-box">
        <form action="<?php echo URLROOT; ?>/employees/makeWorkTrip" method="post">
            <div class="column">
                <section class="section">
                    <label for="e_name">Employee Name:</label><br>
                    <div class="employee-name">
                        <input type="text" id="e_name" name="e_name" placeholder="Enter Employee Name">
                    </div>
                </section>

                <section class="section">
                    <label for="email">Email Address:</label><br>
                    <div class="pickup">
                        <input type="text" id="email" name="email" placeholder="Enter Email address">
                    </div>
                </section>

                <section class="section">
                    <label for="reason">Reason for Vehicle use:</label><br>
                    <div class="date">
                        <input type="text" id="reason" name="reason" placeholder="Enter Reason">
                    </div>
                </section>

                <section class="section">
                    <label for="p_no">Number of Passengers:</label><br>
                    <div class="route">
                        <input type="text" name="p_no" placeholder="Enter Number of Passengers">
                    </div>
                </section>

                <section class="section">
                    <label for="comments">Comments or Special Requests:</label><br>
                    <div class="date">
                        <input type="text" id="comments" name="comments" placeholder="Enter Comments">
                    </div>
                </section>
            </div>


            <div class="column">
                <section class="section">
                    <label for="des">Destination:</label><br>
                    <div class="pickup">
                        <input type="text" id="des" name="des" placeholder="Enter Destination">
                    </div>
                </section>

                <section class="section">
                    <label for="tripdate">Reservation Date:</label><br>
                    <div class="dropoff">
                        <input type="date" id="tripdate" name="tripdate">
                    </div>
                </section>

                <section class="section">
                    <label for="triptime">Reservation Time:</label><br>
                    <div class="dropoff">
                        <input type="time" id="triptime" name="triptime">
                        <select id="ampm" name="ampm">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                </section>



                <section class="section">
                    <div class="submit"><input type="submit" value="Reserve"></div>
                </section>
            </div>
        </form>
    </div>

    <div style="padding: 10px 40px;
    border: 2px solid black;
    border-radius: 8px;
    max-width:30%;
    margin-top: 10px;  
    background: black;
    font-size: 15px;
    text-align:center;
    margin-left:30%;
">
        <a href="<?php echo URLROOT; ?>/employees/worktrip" class="new"
            style="color: white; text-decoration: none;">view</a>
    </div>


</body>

</html>