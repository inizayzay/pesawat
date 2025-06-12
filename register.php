<?php
require_once dirname(__FILE__) . "/functions/register.php";
require_once dirname(__FILE__) . "/functions/check.php";

use Register as register;

$register = register\get();
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    Ticket\delete($_GET['id']);
}

if (!check()) {
  header("Location: login.php");
  exit;
}


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    register\create($_POST);
}

ob_start();
?>

<p class="mb-4">
  The Passenger page displays information about airline passengers using a third-party plugin called DataTables.
  DataTables helps organize and manage passenger data interactively, with features such as sorting, searching, and pagination.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registrasi Diri</h6>
  </div>

  <div class="container mt-4 ml-2 mb-4  ">
<form method="POST" action="functions/passenger.php">
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="fullName" name="FullName" placeholder="Enter Full Name" required>
      </div>

      <div class="form-group">
        <label>Gender</label><br>
        <label>
          <input type="radio" name="gender" value="Male" required>
          <span class="mr-4">Male</span>
        </label>
        <label class="ml-3">
          <input type="radio" name="gender" value="Female" required>
          <span>Female</span>
        </label>
      </div>

      <div class="form-group">
        <label for="birth_date">Birth Date</label>
        <input type="date" class="form-control" id="birth_date" name="birth_date" required>
      </div>
      <div class="form-group">
        <label for="placeOfBrith">Place Of Birth</label>
        <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" placeholder="Enter Place Of Birth" required>
      </div>
      <div class="form-group">
        <label for="contact_email">Contact Email</label>
        <input type="text" class="form-control" id="contactEmail" name="contactEmail" placeholder="Enter Contact Email" required>    
      </div>
      <div class="form-group">
        <label for="contact_number">Contact Number</label>
        <input type="number" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter Contact Number" required>
      </div>

      <button type="submit" class="btn btn-primary" name="create" >
        <i class="fas fa-save"></i> Save
      </button>
    </form>
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
