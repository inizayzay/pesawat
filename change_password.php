<?php
require_once dirname(__FILE__) . "/functions/check.php";
require_once dirname(__FILE__) . "/connections/database.php";

if (!check()) {
    header('location: login.php');
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    
    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        $error = 'Semua field harus diisi!';
    } elseif ($newPassword !== $confirmPassword) {
        $error = 'Password baru dan konfirmasi password tidak cocok!';
    } elseif (strlen($newPassword) < 6) {
        $error = 'Password minimal 6 karakter!';
    } else {
        $userId = $_SESSION['user']['UserID'];
        $stmt = $mysql->prepare("SELECT PasswordHash FROM user WHERE UserID = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if (password_verify($currentPassword, $user['PasswordHash'])) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateStmt = $mysql->prepare("UPDATE user SET PasswordHash = ? WHERE UserID = ?");
            $updateStmt->bind_param("si", $hashedPassword, $userId);
            
            if ($updateStmt->execute()) {
                $_SESSION['success'] = 'Password berhasil diubah!';
                header('Location: profile.php');
                exit();
            } else {
                $error = 'Gagal mengubah password. Silakan coba lagi.';
            }
        } else {
            $error = 'Password saat ini salah!';
        }
    }
}

ob_start();
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
                </div>
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="current_password">Password Saat Ini</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                            <small class="form-text text-muted">Minimal 6 karakter</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="profile.php" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Ganti Password";
require "layouts/app.php";
