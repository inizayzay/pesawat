<?php

require "./functions/check.php";
require "./functions/airline.php";

if (!check())
  header('location: login.php');


if (isset($_POST['create']))
  store();

ob_start();
?>
<div class="container mt-4">
  <form action="tambah_maskapai.php" method="post">
    <div class="form-group">
      <label for="airlineName">Name Airline</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Airline Name" required>
    </div>
    <button type="submit" class="btn btn-primary" name="create"> <i class="fas fa-save"></i> Save</button>
  </form>
</div>

<?php
$content = ob_get_clean();
$title = "Create Airline";

include "./layouts/app.php"
?>