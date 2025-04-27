<?php
ob_start();
?>
<!-- Page Heading -->

<p class="mb-4">The Ticket page displays airline ticket data with the help of the DataTables plugin. DataTables enhances the table experience by offering easy-to-use sorting, searching, and pagination functionalities for better navigation and data management.<a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ticket Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Record Locator</th>
                        <th>eTiket</th>
                        <th>Seat Number</th>
                        <th>Passenger</th>
                        <th>Action</th>
                    </tr>
</thead>
                <tbody>
                    <tr>
                        <td>11</td>
                        <td>WERKFP</td>
                        <td>1234567890</td>
                        <td>12D</td>
                        <td>1</td>
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
$title = "Ticket Data";

include "./layouts/app.php";
