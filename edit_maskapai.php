<?php

require_once dirname(__FILE__) . "/functions/check.php";
require_once dirname(__FILE__) . "/functions/terminal_gate.php";
require_once dirname(__FILE__) . "/functions/airline.php";

use Airline as Airline;

if (!check())
    header('location: login.php');

if (isset($_POST['edit']))
    Airline\update();

$airline = Airline\find($_GET['id'])->fetch_assoc();

ob_start();
?>
<div class="container mt-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="airlineName">Name Airline</label>
            <input type="text" class="form-control" id="airlineName" name="airlineName" placeholder="Enter Airline Name" value="<?= $airline['AirlineName'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="edit"> <i class="fas fa-save"></i> Save</button>
    </form>
</div>

<?php
$content = ob_get_clean();
$title = "Create Airline";

include "./layouts/app.php"
?>