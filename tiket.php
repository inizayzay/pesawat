<?php
require_once dirname(__FILE__) . "/functions/ticket.php";
require_once dirname(__FILE__) . "/functions/check.php";
use Ticket as Ticket;
$tickets = Ticket\get();
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    Ticket\delete($_GET['id']);
}

if (!check())
  header('location: login.php');

  
ob_start();
?>
<!-- Page Heading -->

<p class="mb-4">The Ticket page displays airline ticket data with the help of the DataTables plugin. DataTables enhances the table experience by offering easy-to-use sorting, searching, and pagination functionalities for better navigation and data management.<a target="_blank" href="https://datatables.net"></a></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-bold text-primary">Ticket Data</h6>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Unduh/ Cetak Tiket</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Record Locator</th>
                        <th>eTicket Number</th>
                        <th>Seat Number</th>
                        <th>Passenger</th>
                        <th>Flight ID</th>
                        <th>Action</th>
                    </tr>
</thead>
                <tbody>
                <?php
                    while ($ticket = $tickets->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?=$ticket['TicketID']; ?></td>
                            <td><?= $ticket['RecordLocator']; ?></td>
                            <td><?= $ticket['eTicketNumber']; ?></td> 
                            <td><?=$ticket['SeatNumber']; ?></td>
                            <td><?=$ticket['PassengerID']; ?></td>
                            <td><?=$ticket['FlightID']; ?></td>
                            <td>
                                <a class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="?action=delete&id=<?= $ticket['TicketID']; ?>">
                                    <i class="fas fa-trash"></i>
                                    Hapus
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
$title = "Ticket Data";

include "./layouts/app.php";
