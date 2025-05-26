<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="Login.css">
  </head>
  <body>
    <div class="login-container">
      <h2>login</h2>
      <form action="validasi.php" method="POST">
        <label for="Username">Email</label><input type="text" name="email" id="email" placeholder="Masukan Email" required>
        <label for="password">Password</label><input type="password" name="password" id="password" placeholder="Masukan Password" required>
        <label for="remember"><input type="checkbox" name="remember" id="remember">Remember-me</label>
        <button type="submit" name="submit">Login</button>
        <p><a href="lupa.html">Lupa kata sandi?</a></p>
        <p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
      </form>
    </div>
  </body>
</html>
