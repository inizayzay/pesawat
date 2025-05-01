<?php
require_once dirname(__FILE__) . "/functions/terminal_gate.php";
require_once dirname(__FILE__) . "/functions/check.php";

use TerminalGate as Terminal;

$terminal_gates = Terminal\get();

if (!check())
  header('location: login.php');

ob_start();
?>
<!-- Page Heading -->

<p class="mb-4">The Terminal & Gate page shows detailed information about airport terminals and boarding gates, powered by the DataTables plugin. DataTables makes it easy to explore and manage terminal and gate data efficiently through sorting, searching, and pagination features.<a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Terminal & Gate Data</h6>
  </div>
  <div class="card-body">
  <a href="tambah_terminal&gate.php" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i> Add Terminal & Gate</a></h6>

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Terminal</th>
            <th>Gate</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
                    while ($terminal_gate = $terminal_gates->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $terminal_gate['Terminal']; ?></td>
                            <td><?= $terminal_gate['Gate']; ?></td>
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
$title = "Terminal & Gate Data";

include "./layouts/app.php";
