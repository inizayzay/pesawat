<?php
require_once dirname(__FILE__) . "/functions/flight.php";
require_once dirname(__FILE__) . "/functions/check.php";

use Flight as Flight;

$flights = Flight\get();

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    Flight\delete($_GET['id']);
}

if (!check()) header('location: login.php');

ob_start();
?>
<!-- Page Heading -->
<p class="mb-4">
    The Flight page provides flight data information using the DataTables plugin. This tool allows users to sort, search, and browse flight details easily in a dynamic and interactive table format.
</p>

<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Flight Schedule Data</h6>
    </div>
    <div class="card-body">
        <a href="tambah_flight.php" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i> Add Flight</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Flight Number</th>
                        <th>Departure Date</th>
                        <th>Departure Airport</th>
                        <th>Arrival Airport</th>
                        <th>Departure Time</th>
                        <th>Boarding Time</th>
                        <th>Max Passenger</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($flight = $flights->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $flight['FlightID']; ?></td>
                            <td><?= $flight['FlightNumber']; ?></td>
                            <td><?= $flight['DepartureDate']; ?></td>
                            <td><?= $flight['DepartureAirport']; ?></td>
                            <td><?= $flight['ArrivalAirport']; ?></td>
                            <td><?= $flight['DepartureTime']; ?></td>
                            <td><?= $flight['BoardingTime']; ?></td>
                            <td><?= $flight['MaxPassenger']; ?></td>
                            <td>
                                <a class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a class="btn btn-danger" href="?action=delete&id=<?= $flight['FlightID'] ?>">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Flight Schedule Data";

include "./layouts/app.php";
