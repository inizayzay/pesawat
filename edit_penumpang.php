<?php
require_once dirname(__FILE__) . "/functions/check.php";
require_once dirname(__FILE__) . "/functions/passenger.php";

use Passenger as Passenger;

// Cek login
if (!check()) {
    header('location: login.php');
    exit();
}

$error = '';
$success = '';
$passenger = null;

// Ambil data penumpang berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = Passenger\getById($id);
    if ($result && $result->num_rows > 0) {
        $passenger = $result->fetch_assoc();
    } else {
        $error = 'Data penumpang tidak ditemukan';
    }
} else {
    $error = 'ID penumpang tidak valid';
}

// Proses form update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Passenger\update($_POST);
    header('location: penumpang.php');
    exit();
}   
?>

<div class="container-fluid">
                    
                    <?php if ($passenger): ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Penumpang</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($passenger['PassengerID']); ?>">
                                
                                <div class="form-group">
                                    <label for="FullName">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="FullName" name="FullName" 
                                           value="<?php echo htmlspecialchars($passenger['Name']); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" 
                                               <?php echo ($passenger['gender'] === 'Male') ? 'checked' : ''; ?> required>
                                        <label class="form-check-label" for="male">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female"
                                               <?php echo ($passenger['gender'] === 'Female') ? 'checked' : ''; ?> required>
                                        <label class="form-check-label" for="female">Perempuan</label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" 
                                           value="<?php echo htmlspecialchars($passenger['BirthDate']); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="placeOfBirth">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" 
                                           value="<?php echo htmlspecialchars($passenger['PlaceOfBirth']); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="contactEmail">Email</label>
                                    <input type="email" class="form-control" id="contactEmail" name="contactEmail" 
                                           value="<?php echo htmlspecialchars($passenger['ContactEmail']); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="contactNumber">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="contactNumber" name="contactNumber" 
                                           value="<?php echo htmlspecialchars($passenger['ContactNumber']); ?>" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="penumpang.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
<?php
$content = ob_get_clean();
$title = "Edit Penumpang";

include "./layouts/app.php"
?>