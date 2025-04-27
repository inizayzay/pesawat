<?php

require "./functions/check.php";

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
                    <tr>
                        <td>Flight</td>
                        <td>JT 602</td>
                        <td>20-03-2025</td>
                        <td>CGK</td>
                        <td>DJB</td>
                        <td>12:45</td>
                        <td>12:15</td>
                        <td><button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                                Edit
                            </button>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button></td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php

$content = ob_get_clean();
$title = "Flight Schedule Data";

include "./layouts/app.php";
