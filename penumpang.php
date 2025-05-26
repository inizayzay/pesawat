<?php
require_once dirname(__FILE__) . "/functions/passenger.php";
require_once dirname(__FILE__) . "/functions/check.php";

use Passenger as Passenger;

$passengers = Passenger\get();

// if (isset($_GET['action']) && $_GET['action'] === 'delete') {
//     Passenger\delete($_GET['id']);
// }

if (!check()) {
    header('location: login.php');
}

ob_start();
?>

<!-- Page Heading -->
<p class="mb-4">The Passenger page displays information about airline passengers using a third-party plugin called DataTables. DataTables helps organize and manage passenger data interactively, with features such as sorting, searching, and pagination.</p>

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
                                <a class="btn btn-primary" href="edit_penumpang.php?action=edit&id=<?= $passenger['PassengerID'] ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a class="btn btn-danger" href="?action=delete&id=<?= $passenger['PassengerID'] ?>">
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

<!-- Initialize DataTables -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable(); // This will turn the table into a DataTable
    });
</script>

<?php
$content = ob_get_clean();
$title = "Passenger Data";
include "./layouts/app.php";
?>