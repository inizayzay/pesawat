<?php
require_once dirname(__FILE__) . "/functions/flight.php";

require_once dirname(__FILE__) . "/functions/check.php";

use Flight as Flight;

$Flights = Flight\get();

if (!check())
    header('location: login.php');

ob_start();
?>
<!-- Page Heading -->

<p class="mb-4">The Flight page provides flight data information using the DataTables plugin. This tool allows users to sort, search, and browse flight details easily in a dynamic and interactive table format<a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
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
                        <th>Fligt Number</th>
                        <th>Departure Date</th>
                        <th>Departure Airport</th>
                        <th>Arrival Airport</th>
                        <th>Departure Time</th>
                        <th>Boarding Time</th>
                        <th>Action</th>
                    </tr>
                <tbody>
                    <?php
                    while ($Flight = $Flights->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $Flight['FlightID']; ?></td>
                            <td><?= $Flight['FlightNumber']; ?></td>
                            <td><?= $Flight['DepartureDate']; ?></td>
                            <td><?= $Flight['DepartureAirport']; ?></td>
                            <td><?= $Flight['ArrivalAirport']; ?></td>
                            <td><?= $Flight['DepartureTime']; ?></td>
                            <td><?= $Flight['BoardingTime']; ?></td>

                            <td>
                                <button class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </button>
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
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
