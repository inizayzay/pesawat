<?php

require_once dirname(__FILE__) . "/functions/airline.php";
require_once dirname(__FILE__) . "/functions/terminal_gate.php";
require_once dirname(__FILE__) . "/functions/check.php";
require_once dirname(__FILE__) . "/functions/flight.php";

use Airline as Airline;
use TerminalGate as Terminal;
use Flight as Flight;

$airlines = Airline\get();
$terminalGates = Terminal\get();


if (isset($_POST['create']))
  Flight\store();


if (!check())
  header('location: login.php');

ob_start();
?>
<div class="container mt-4">
  <form action="" method="post">
    <div class="form-group">
      <label for="flightNumber">Flight Number</label>
      <input type="text" class="form-control" id="flightNumber" name="flightNumber" placeholder="Enter Flight Number" required>
    </div>
    <div class="form-group">
      <label for="departureDate">Departure Date</label>
      <input type="date" class="form-control" id="departureDate" name="departureDate" placeholder="Enter Departure Date" required>
    </div>
    <div class="form-group">
      <label for="departureAirport">Departure Airport</label>
      <input type="text" class="form-control" id="departureAirport" name="departureAirport" placeholder="Enter Departure Airport" required>
    </div>
    <div class="form-group">
      <label for="arrivalAirport">Arrival Airport</label>
      <input type="text" class="form-control" id="arrivalAirport" name="arrivalAirport" placeholder="Enter Arrival Airport" required>
    </div>
    <div class="form-group">
      <label for="departureTime">Departure Time</label>
      <input type="time" class="form-control" id="departureTime" name="departureTime" placeholder="Enter Departure Time" required>
    </div>
    <div class="form-group">
      <label for="boardingTime">Boarding Time</label>
      <input type="time" class="form-control" id="boardingTime" name="boardingTime" placeholder="Enter Boarding Time" required>
    </div>
    <div class="form-group">
      <label for="airline">Airline</label>
      <select type="text" class="form-control" id="airline" name="airline" placeholder="Enter Airline" required>
        <option disabled value="">-- Pilih ---</option>
        <?php while ($airline = $airlines->fetch_assoc()) { ?>
          <option value="<?= $airline['AirlineID'] ?>"><?= $airline['AirlineName'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="terminal">Terminal & Gate</label>
      <select type="text" class="form-control" id="terminal" name="terminal" placeholder="Enter Airline" required>
        <option disabled value="">-- Pilih ---</option>
        <?php while ($terminalGate = $terminalGates->fetch_assoc()) { ?>
          <option value="<?= $terminalGate['TerminalGateID'] ?>"><?= $terminalGate['Terminal'] . ' ' . $terminalGate['Gate']; ?></option>
        <?php } ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary" name="create"> <i class="fas fa-save"></i> Save</button>
  </form>
</div>

<?php
$content = ob_get_clean();
$title = "Create Flight";

include "./layouts/app.php";
?>