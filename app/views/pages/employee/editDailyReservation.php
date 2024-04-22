

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Reservations</title>

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style2.css">
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
<body style="background-image: linear-gradient( rgba(29, 29, 29, 0.624), rgba(17, 16, 16, 0.886)), url(<?php echo URLROOT; ?>/img/road.jpg);">
<div class="topic-content">
        <h2>Edit Daily Reservation</h2>
</div>
<div class="form-box">
        <form action="<?php echo URLROOT; ?>/employees/updateDailyReservation" method="post" class="input-group" id="Daily">
            <input type="hidden" name="ReservationID" value="<?php echo $data['reservation']->ReservationID; ?>">
            <div class="column">
                        <section class="section">
                            <!-- Updated structure: label followed by the dropdown -->
                            <span class="dropdown-topic"><label class="topic" for="schedule">Schedule Type</label></span></br>
                <select name="schedule" id="schedule" class="schedule" onchange="changeRoute()">
                    <option value="Select" <?php echo ($data['reservation']->ScheduleType == 'Select') ? 'selected' : ''; ?>>Select</option>
                    <option value="ToWork" <?php echo ($data['reservation']->ScheduleType == 'ToWork') ? 'selected' : ''; ?>>To work</option>
                    <option value="FromWork" <?php echo ($data['reservation']->ScheduleType == 'FromWork') ? 'selected' : ''; ?>>From work</option>
                    <option value="BothWays" <?php echo ($data['reservation']->ScheduleType == 'BothWays') ? 'selected' : ''; ?>>Both ways</option>
                </select>
                </section>
        
          
                <section class="section"></br>
            <span class="dropdown-topic"><label class="topic" for="schedule">Route</label></span>
                <select name="route" id="route" class="route">
                    <option value="Nugegoda" <?php echo ($data['reservation']->Route == 'Nugegoda') ? 'selected' : ''; ?>>Nugegoda</option>
                    <option value="Kaluthara" <?php echo ($data['reservation']->Route == 'Kaluthara') ? 'selected' : ''; ?>>Kaluthara</option>
                    <option value="Gampaha" <?php echo ($data['reservation']->Route == 'Gampaha') ? 'selected' : ''; ?>>Gampaha</option>
                    <option value="Awissawella" <?php echo ($data['reservation']->Route == 'Awissawella') ? 'selected' : ''; ?>>Awissawella</option>
                </select>
                </section>
            </div>
            <div class="column">
    <section class="section">
                <span class="date-topic"></span> <label for="reservationDate">Reservation Date</label></span><br>
                <div class="date">
                <input type="date" name="Date" value="<?php echo $data['reservation']->Date; ?>">
            </div>
    </section>
        
    <section class="section" id="pickup">
            <span class="pickup-topic"></span><label for="pickup">Pick Up</label>
            <div class="pickup">
                <input type="text" name="pickup" value="<?php echo $data['reservation']->PickUp; ?>">
</section>
            </div>

           <div class="column">
        <section class="section" id="dropoff">
            <span class="drop-topic"></span><label for="dropoff">Drop Off</label>
            <div class="pickup">
                <input type="text" name="dropoff" value="<?php echo $data['reservation']->DropOff; ?>">
</section>
            </div>

            <div class="column">
            <section class="section">
                <div class="submit"><input type="submit" value="update"></div>
            </section>
        </div>
        </form>
</div>
</body>
</html>