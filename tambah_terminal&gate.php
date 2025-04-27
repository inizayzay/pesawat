<?php

require "./functions/check.php";

if (!check())
  header('location: login.php');

ob_start();
?>
<div class="container mt-4">
  <form action="" method="post">
    <div class="form-group">
      <label for="airlineName">Name Terminal</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Terminal " required>
    </div>
    <div class="form-group">
      <label for="airlineName">Name gate</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Gate" required>
    </div>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
  </form>
</div>

<?php
$content = ob_get_clean();
$title = "Create Terminal & Gate";

include "./layouts/app.php"
?>