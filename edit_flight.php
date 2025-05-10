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

$flight = Flight\find($_GET['id'])->fetch_assoc();

print_r($flight);

ob_start();
?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

<div class="container mt-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="flightNumber">Flight Number</label>
            <input type="text" class="form-control" id="flightNumber" name="flightNumber" value="<?= $flight['FlightNumber'] ?>" placeholder="Enter Flight Number" required>
        </div>
        <div class="form-group">
            <label for="departureDate">Departure Date</label>
            <input type="date" class="form-control" id="departureDate" name="departureDate" value="<?= $flight['DepartureDate'] ?>" placeholder="Enter Departure Date" required>
        </div>
        <div class="form-group">
            <label for="single" class="control-label">Departure Airport</label>
            <select id="single" name="departureAirport" class="form-control select2-departure-airport">
                <option></option>
                <optgroup label="Alaskan/Hawaiian Time Zone">
                    <option value="AK">Alaska</option>
                    <option value="HI" disabled="disabled">Hawaii</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group">
            <label for="single" class="control-label">Arrival Airport</label>
            <select id="single" name="arrivalAirport" class="form-control select2-arrival-airport">
                <option></option>
                <optgroup label="Alaskan/Hawaiian Time Zone">
                    <option value="AK">Alaska</option>
                    <option value="HI" disabled="disabled">Hawaii</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group">
            <label for="departureTime">Departure Time</label>
            <input type="time" class="form-control" id="departureTime" name="departureTime" value="<?= $flight['DepartureTime'] ?>" placeholder="Enter Departure Time" required>
        </div>
        <div class="form-group">
            <label for="boardingTime">Boarding Time</label>
            <input type="time" class="form-control" id="boardingTime" name="boardingTime" value="<?= $flight['BoardingTime'] ?>" placeholder="Enter Boarding Time" required>
        </div>
        <div class="form-group">
            <label for="airline">Airline</label>
            <select type="text" class="form-control" id="airline" name="airline" placeholder="Enter Airline" required>
                <option disabled value="">-- Pilih ---</option>
                <?php while ($airline = $airlines->fetch_assoc()) { ?>
                    <option <?= $airline['AirlineID'] === $flight['AirlineID'] ? 'checked' : '' ?> value="<?= $airline['AirlineID'] ?>"><?= $airline['AirlineName'] ?></option>
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
        <div class="form-group">
            <label for="flightNumber">Max Passenger</label>
            <input type="text" class="form-control" id="airplane passenger" name="airplanepassenger" value="<?= $flight['MaxPassenger'] ?>" placeholder="Enter passenger" required>
        </div>
        <button type="submit" class="btn btn-primary" name="create"> <i class="fas fa-save"></i> Save</button>

    </form>
</div>
<?php
$content = ob_get_clean();


ob_start();
?>

<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>

<script>
    $(".select2-departure-airport, .select2-arrival-airport").select2({
        placeholder: 'Select Airport',
        width: '100%',
        containerCssClass: ':all:',
        theme: 'bootstrap',
        ajax: {
            url: 'api/airport.php',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    name: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: data.map(function(airport) {
                        return {
                            id: airport.IataCode,
                            text: `${airport.AirportName} – ${airport.Municipality} (${airport.IataCode})`
                        };
                    })
                };
            },
            cache: true
        }
    });

    const defaultOption = new Option("Nama User Default", 2, true, true);
    $('#userSelect').append(defaultOption).trigger('change');
</script>

<?php

$script = ob_get_clean();

$title = "Create Flight";
include "./layouts/app.php";
?>