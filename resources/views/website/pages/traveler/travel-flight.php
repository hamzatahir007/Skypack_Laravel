<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    

    <!--====== Title ======-->
    <title>Luggagelink</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="#assets/images/favicon.png" type="image/png">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="./Home _ ClassiFied_files/magnific-popup.css">

    <!--====== Nice Select CSS ======-->
    <link rel="stylesheet" href="./Home _ ClassiFied_files/nice-select.css">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="./Home _ ClassiFied_files/slick.css">

    <!--====== Price Range CSS ======-->
    <link rel="stylesheet" href="./Home _ ClassiFied_files/ion.rangeSlider.min.css">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="./Home _ ClassiFied_files/fontawesome.min.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="./Home _ ClassiFied_files/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="./Home _ ClassiFied_files/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="./Home _ ClassiFied_files/style.css">

</head>


<?php include './components/header.php'; ?>

<div class="container" style="margin-top:140px;margin-bottom:50px;">
    <h2 class="text-center">Add Travel Flight</h2><br>

    <form action="save-travel-flight.php" method="POST" enctype="multipart/form-data">

        <!-- <div class="form-group">
            <label>Traveler ID</label>
            <input type="number" name="traveler_id" class="form-control" required>
        </div> -->
<div class="row">

        <div class="col-md-6">
            <label>PNR Number</label>
            <input type="text" name="pnr_no" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label>Flight Date</label>
            <input type="date" name="flight_date" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label>Origin</label>
            <input type="text" name="origin" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label>Origin Date Time</label>
            <input type="datetime-local" name="origin_date_time" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Destination</label>
            <input type="text" name="destination" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label>Destination Date Time</label>
            <input type="datetime-local" name="destination_date_time" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Status</label>
            <select id="selectOp" class="form-control" name="status">
                <option value="Pending">Pending</option>
                <option value="In-Transit">In Transit</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="col-md-6">
            <label>Active</label>
            <select id="selectOp" class="form-control" name="active">
                <option value="Yes">Active</option>
                <option value="No">Inactive</option>
            </select>
        </div>

        <div class="col-md-6">
            <label>Ticket Picture</label>
            <input type="file" name="ticket_pic" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Weight (kg)</label>
            <input type="text" name="weight" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Rate Per Unit</label>
            <input type="number" name="rate_per_unit" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Total</label>
            <input type="number" name="total" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Key Field</label>
            <input type="text" name="keyfield" class="form-control">
        </div>

        <!-- <div class="form-group">
            <label>QR Code</label>
            <input type="text" name="Qrcode" class="form-control">
        </div> -->
    </div>
 <br>
        <button type="submit" class="btn btn-primary btn-block">Save Flight</button>
    </form>
</div>

<?php include './components/footer.php'; ?>
