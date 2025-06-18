<?php
require_once dirname(__FILE__) . "/functions/check.php";
require_once dirname(__FILE__) . "/functions/passenger.php";

use Passenger as Passenger;

if (!check()) {
    header('location: login.php');
    exit();
}

$user = $_SESSION['user'];
$passenger = Passenger\getById($user['UserID'])->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $passenger['PassengerID'],
        'FullName' => $_POST['fullname'],
        'gender' => $_POST['gender'],
        'birth_date' => $_POST['birth_date'],
        'placeOfBirth' => $_POST['place_of_birth'],
        'contactEmail' => $_POST['email'],
        'contactNumber' => $_POST['phone']
    ];
    
    if (Passenger\update($data)) {
        $_SESSION['success'] = "Profil berhasil diperbarui!";
        header('Location: profile.php');
        exit();
    } else {
        $error = "Gagal memperbarui profil. Silakan coba lagi.";
    }
}

ob_start();
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profil</h6>
        </div>
        <div class="card-body">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group row">
                    <label for="fullname" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fullname" name="fullname" 
                               value="<?= htmlspecialchars($passenger['Name'] ?? '') ?>" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" 
                                   value="Male" <?= ($passenger['gender'] ?? '') === 'Male' ? 'checked' : '' ?> required>
                            <label class="form-check-label" for="male">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" 
                                   value="Female" <?= ($passenger['gender'] ?? '') === 'Female' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="female">Perempuan</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="birth_date" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="birth_date" name="birth_date" 
                               value="<?= htmlspecialchars($passenger['BirthDate'] ?? '') ?>" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="place_of_birth" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" 
                               value="<?= htmlspecialchars($passenger['PlaceOfBirth'] ?? '') ?>" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?= htmlspecialchars($passenger['ContactEmail'] ?? '') ?>" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" id="phone" name="phone" 
                               value="<?= htmlspecialchars($passenger['ContactNumber'] ?? '') ?>" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="profile.php" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Edit Profil";
require "layouts/app.php";
