<?php

// Ambil airline php
require "./functions/airline.php";


require "./functions/check.php";

use Airline as Airline;

// Iniii
$airlines = Airline\get();

if (!check())
    header('location: login.php');


ob_start();
?>
<!-- Page Heading -->
<p class="mb-4">The Airline Data page displays airline information using a third-party plugin called DataTables. DataTables makes it easier to manage data in an interactive table format, with features such as sorting, searching, and pagination.</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Airline Data</Data></h6>
    </div>
    <div class="card-body">
        <a href="tambah_maskapai.php" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i> Add Airline</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Airline Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Inii -->
                    <?php
                    while ($airline = $airlines->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $airline['AirlineID']; ?></td>
                            <td><?= $airline['AirlineName']; ?></td>
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
$title = "Airline Data";

include "./layouts/app.php";
