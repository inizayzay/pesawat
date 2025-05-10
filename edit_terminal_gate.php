<?php

require_once dirname(__FILE__) . "/functions/check.php";
require_once dirname(__FILE__) . "/functions/terminal_gate.php";

use TerminalGate as TerminalGate;

if (!check())
    header('location: login.php');


if (isset($_POST['edit']))
    TerminalGate\update();

ob_start();
?>
<div class="container mt-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="Terminal">Name Terminal</label>
            <input type="text" class="form-control" id="Terminal" name="Terminal" placeholder="Enter Terminal " required>
        </div>
        <div class="form-group">
            <label for="Gate">Name gate</label>
            <input type="text" class="form-control" id="Gate" name="Gate" placeholder="Enter Gate" required>
        </div>
        <button type="submit" class="btn btn-primary" name="create"> <i class="fas fa-save"></i> Save</button>
    </form>
</div>

<?php
$content = ob_get_clean();
$title = "Create Terminal & Gate";

include "./layouts/app.php"
?>