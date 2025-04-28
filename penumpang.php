<?php
require "./functions/passenger.php";
require "./functions/check.php";
$passengers = get();

if (!check())
  header('location: login.php');

  
ob_start();
?>
<!-- Page Heading -->
<p class="mb-4">The Passenger page displays information about airline passengers using a third-party plugin called DataTables. DataTables helps organize and manage passenger data interactively, with features such as sorting, searching, and pagination. <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Passenger Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($passenger = $passengers->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $passenger['PassengerID']; ?></td>
                            <td><?= $passenger['Name']; ?></td>
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
$title = "Passenger Data";

include "./layouts/app.php";
