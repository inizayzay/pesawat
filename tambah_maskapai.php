<?php

require "./functions/check.php";

if (!check())
  header('location: login.php');

ob_start();
?>
<div class="container mt-4">
  <form action="tambah_maskapai.php" method="post">
    <div class="form-group">
      <label for="airlineName">Nama Maskapai</label>
      <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Masukkan nama maskapai" required>
    </div>
    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Simpan</button>
  </form>
</div>

<?php
$content = ob_get_clean();
$title = "Create Airline";

include "./layouts/app.php"
?>