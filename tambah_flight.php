<?php

require "./functions/check.php";

if (!check())
  header('location: login.php');

ob_start();
?>
<div class="container mt-4">
  <form action="tambah_maskapai.php" method="post">
    <div class="form-group">
      <label for="airlineName">Flight Number</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Flight Number" required>
    </div>
    <div class="form-group">
      <label for="airlineName">Departure Date</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Departure Date" required>
    </div>
    <div class="form-group">
      <label for="airlineName">Departure Airport</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Departure Airport" required>
    </div>
    <div class="form-group">
      <label for="airlineName">Arrival Airport</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Arrival Airport" required>
    </div>
    <div class="form-group">
      <label for="airlineName">Departure Time</label>
      <input type="time" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Departure Time" required>
    </div>
    <div class="form-group">
      <label for="airlineName">Boarding Time</label>
      <input type="time" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Boarding Time" required>
    </div> 
    <div class="form-group">
      <label for="airlineName">Airline</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Airline" required>
    </div>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
  </form>
</div>

<?php
$content = ob_get_clean();
$title = "Create Flight";

include "./layouts/app.php"
?>