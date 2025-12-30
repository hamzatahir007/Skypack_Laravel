<?php include 'header.php'; ?>

<div class="container" style="margin-top:40px;margin-bottom:50px;">
    <h2 class="text-center">Add Travel Pictures</h2><br>

    <form action="save-travel-picture.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Travel Flight ID</label>
            <input type="number" name="travel_flight_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Picture Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="picture" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success btn-block">Upload</button>

    </form>
</div>

<?php include 'footer.php'; ?>
