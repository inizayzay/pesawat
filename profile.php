<?php
require_once dirname(__FILE__) . "/functions/check.php";
require_once dirname(__FILE__) . "/functions/passenger.php";

use Passenger as Passenger;

// Cek login
if (!check()) {
    header('location: login.php');
    exit();
}

// Ambil data user yang sedang login
$user = $_SESSION['user'];
$passenger = Passenger\getById($user['UserID'])->fetch_assoc();

ob_start();
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Profil Saya</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($passenger['Name'] ?? 'User') ?>&background=4e73df&color=fff&size=200" 
                         class="img-fluid rounded-circle mb-3" 
                         alt="Profile Picture"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <h4><?= htmlspecialchars($passenger['Name'] ?? 'Nama Pengguna') ?></h4>
                    <p class="text-muted"><?= htmlspecialchars($user['Role']) ?></p>
                </div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Nama Lengkap</th>
                                <td><?= htmlspecialchars($passenger['Name'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $passenger['gender'] === 'Male' ? 'Laki-laki' : ($passenger['gender'] === 'Female' ? 'Perempuan' : '-') ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?= $passenger['BirthDate'] ? date('d F Y', strtotime($passenger['BirthDate'])) : '-' ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?= htmlspecialchars($passenger['PlaceOfBirth'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= htmlspecialchars($passenger['ContactEmail'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><?= htmlspecialchars($passenger['ContactNumber'] ?? '-') ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-4">
                        <a href="edit_profile.php" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Profil
                        </a>
                        <a href="change_password.php" class="btn btn-outline-secondary">
                            <i class="fas fa-key"></i> Ganti Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Profil Saya";
require "layouts/app.php";
