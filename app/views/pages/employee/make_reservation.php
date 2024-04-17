<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div>
        <title>Make Reservation</title>
    </div>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Reservation.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        function changeRoute() {
            var schedule = document.getElementById("schedule").value;
            var pickup = document.getElementById("pickup");
            var dropoff = document.getElementById("dropoff");

            if (schedule == "ToWork") {
                pickup.style.display = "block";
                dropoff.style.display = "none";
            } else if (schedule == "FromWork") {
                pickup.style.display = "none";
                dropoff.style.display = "block";
            } else {
                pickup.style.display = "block";
                dropoff.style.display = "block";
            }
        }

        function changeRouteMonthly() {
            var schedule = document.getElementById("monthly_schedule").value;
            var monthly_pickup = document.getElementById("monthly_pickup");
            var monthly_dropoff = document.getElementById("monthly_dropoff");

            if (schedule == "ToWork") {
                monthly_pickup.style.display = "block";
                monthly_dropoff.style.display = "none";
            } else if (schedule == "FromWork") {
                monthly_pickup.style.display = "none";
                monthly_dropoff.style.display = "block";
            } else {
                monthly_pickup.style.display = "block";
                monthly_dropoff.style.display = "block";
            }
        }

        function setupFlatpickr() {
            flatpickr("#reservationDateDaily", {
                minDate: "today",
                dateFormat: "Y-m-d",
                appendTo: document.getElementById("reservationDateDaily").parentNode,
                static: true,
                position: "below",
            });

            flatpickr("#reservationDateMonthly", {
                minDate: "today",
                dateFormat: "Y-m-d",
                appendTo: document.getElementById("reservationDateMonthly").parentNode,
                static: true,
                position: "below",
            });
        }

        // Call setupFlatpickr function when the document is fully loaded
        document.addEventListener("DOMContentLoaded", function () {
            setupFlatpickr();
        });
    </script>


</head>



    <body
        style="background-image: linear-gradient( rgba(29, 29, 29, 0.624), rgba(17, 16, 16, 0.886)), url(<?php echo URLROOT; ?>/img/road.jpg);">
        <div class="topic-content">
            <h2>Transport Reservation</h2>
        </div>

        <div class="form-box">

            <div class="button-box">
                <div class="btn" id="button"></div>
                <input type="hidden" name="reservation_type" id="reservation_type" value="">
                <button type="button" class="toggle-btn" onclick="daily()">Daily </button>
                <button type="button" class="toggle-btn" onclick="monthly()">Monthly </button>
            </div>


            <form id="Daily" action="<?php echo URLROOT; ?>/employees/makeReservation" method="post"
                class="input-group">
                <div class="column">
                    <section class="section">
                        <!-- Updated structure: label followed by the dropdown -->
                        <span class="dropdown-topic"><label class="topic" for="schedule">Schedule
                                Type</label></span></br>
                        <select name="schedule" id="schedule" class="schedule" onchange="changeRoute()"
                            value="<?php echo $data['scheduleType']; ?>">
                            <option value="Select">Select</option>
                            <option value="ToWork">To work</option>
                            <option value="FromWork">From work</option>
                            <option value="BothWays">Both ways</option>
                        </select>
                    </section>




                    <section class="section"></br>
                        <span class="dropdown-topic"><label class="topic">Route</label></span>
                        <select name="route" class="route" value="<?php echo $data['route']; ?>">
                            <option value="Nugegoda">Nugegoda</option>
                            <option value="Kaluthara">Kaluthara</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Awissawella">Awissawella</option>
                        </select>
                    </section>
                </div>

                <div class="column">
                    <section class="section">
                        <span class="date-topic"></span> <label for="reservationDate">Reservation
                            Date</label></span><br>
                        <div class="date">
                            <input type="date" id="reservationDateDaily" name="Date" placeholder="reservation Date"
                                value="">
                        </div>
                    </section>

                    <section class="section" id="pickup">
                        <span class="pickup-topic"></span><label for="pickup">Pick Up</label>
                        <div class="pickup"> <input type="text" id="pickup" name="pickup"
                                placeholder="Enter pickup city" value="<?php echo $data['pickup']; ?>"></div>
                    </section>
                </div>

                <div class="column">
                    <section class="section" id="dropoff">
                        <span class="drop-topic"></span><label for="dropoff">Drop Off</label>
                        <div class="pickup"> <input type="text" id="dropoff" name="dropoff"
                                placeholder="Enter drop off city" value="<?php echo $data['dropoff']; ?>"></div>
                    </section>
                </div>

                <div class="column">
                    <section class="section">
                        <div class="submit"><input type="submit" value="Reserve"></div>
                    </section>
                </div>
            </form>



            <form id="Monthly" action="<?php echo URLROOT; ?>/employees/monthlyMakeReservation" method="post"
                class="input-group">
                <div class="column">
                    <section class="section">
                        <label class="topic" for="monthly_schedule">Schedule Type</label></br>
                        <select name="schedule" id="monthly_schedule" class="schedule" onchange="changeRouteMonthly()"
                            value="<?php echo $data['scheduleType']; ?>">
                            <option value="Select">Select</option>
                            <option value="ToWork">To work</option>
                            <option value="FromWork">From work</option>
                            <option value="BothWays">Both ways</option>
                        </select>
                    </section>

                    <section class="section">
                        <span class="dropdown-topic"><label class="topic">Route</label></span>
                        <div class="dropdown"></br>
                            <select name="route" class="route" value="<?php echo $data['route']; ?>">
                                <option value="Nugegoda">Nugegoda</option>
                                <option value="Kaluthara">Kaluthara</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Awissawella">Awissawella</option>
                            </select>
                        </div>
                    </section>
                </div>

                <div class="column">
                    <section class="section">
                        <span class="date-topic"></span> <label for="reservationStartDate">Reservation Start
                            Date</label></span><br>
                        <div class="date">
                            <input type="date" id="reservationStartDate" name="StartDate"
                                placeholder="Reservation Start Date" value="<?php echo $data['StartDate']; ?>">
                        </div>
                    </section>

                    <section class="section">
                        <span class="date-topic"></span> <label for="reservationEndDate">Reservation End
                            Date</label></span><br>
                        <div class="date">
                            <input type="date" id="reservationEndDate" name="EndDate" placeholder="Reservation End Date"
                                value="<?php echo $data['EndDate']; ?>">
                        </div>
                    </section>
                </div>

                <div class="column">
                    <section class="section" id="monthly_pickup">
                        <span class="pickup-topic"></span><label for="monthly_pickup">Pick Up</label>
                        <div class="pickup"> <input type="text" id="monthly_pickup" name="pickup"
                                placeholder="Enter pickup city" value="<?php echo $data['pickup']; ?>"></div>
                    </section>

                    <section class="section" id="monthly_dropoff">
                        <span class="drop-topic"></span><label for="monthly_dropoff">Drop Off</label>
                        <div class="pickup"> <input type="text" id="monthly_dropoff" name="dropoff"
                                placeholder="Enter drop off city" value="<?php echo $data['dropoff']; ?>"></div>
                    </section>
                </div>

                <div class="column">
                    <section class="section">
                        <div class="submit"><input type="submit" value="Reserve"></div>
                    </section>
                </div>
            </form>

        </div>

        </section>


    </body>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            daily(); // Call the daily function to set the initial state
        });

        var x = document.getElementById("Daily");
        var y = document.getElementById("Monthly");
        var z = document.getElementById("button");

        function daily() {
            x.style.left = "0%";
            y.style.left = "100%";
            z.style.left = "0%";
            x.classList.add('selected');
            y.classList.remove('selected');
        }

        function monthly() {
            x.style.left = "-500%";
            y.style.left = "0%";
            z.style.left = "110px";
            y.classList.add('selected');
            x.classList.remove('selected');
        }


    </script>


</html>