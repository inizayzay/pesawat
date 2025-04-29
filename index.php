<?php

require "./functions/check.php";

if (!check())
  header('location: login.php');

ob_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Booking Tiket Pesawat</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<style>
  body {
  font-family: 'Segoe UI', sans-serif;
  margin: 0;
  padding: 0;
  background: url('https://images.unsplash.com/photo-1549921296-3a6b99f3b2a9') no-repeat center center fixed;
  background-size: cover;
  align-items: center;
  
}

.background {
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  backdrop-filter: blur(2px);
}

.card {
  background-color: white;
  padding: 25px;
  border-radius: 12px;
  max-width: 400px;
  width: 90%;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.promo {
  display: flex;
  align-items: center;
  background: linear-gradient(to right, #7F00FF, #E100FF);
  color: white;
  padding: 10px;
  border-radius: 10px;
  margin-bottom: 15px;
}

.promo .icon {
  font-size: 20px;
  margin-right: 10px;
}

form .input-group {
  margin-bottom: 15px;
}

form label {
  display: block;
  font-weight: 600;
  margin-bottom: 5px;
}

form input[type="text"],
form input[type="date"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
}

.checkbox-group label {
  display: flex;
  align-items: center;
  gap: 10px; /* Ini buat kasih jarak */
  font-weight: 600;
}

.checkbox-group input[type="checkbox"] {
  transform: scale(1.3);
  margin: 0; /* Reset margin default browser */
}


button {
  width: 100%;
  background-color: #007BFF;
  color: white;
  font-size: 16px;
  padding: 12px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

</style>
<body>
  <div class="background">
    <div class="card">
      <div class="promo">
        <span class="icon">🎉</span>
        <p>
          Jaminan Harga Termurah! Ada tiket domestik yang lebih murah?
          Klaim 2x selisih harganya! (*)
        </p>
      </div>
      <form>
        <div class="input-group">
          <label for="from">Dari</label>
          <input type="text" id="from" value="Jakarta JKTC" readonly />
        </div>
        <div class="input-group">
          <label for="to">Ke</label>
          <input type="text" id="to" placeholder="Mau ke mana?" />
        </div>
        <div class="input-group">
          <label for="departure">Pergi</label>
          <input type="date" id="departure" />
        </div>
        <div class="input-group checkbox-group">
  <label for="return">
    <input type="checkbox" id="return" />
    Pulang-pergi?
  </label>
</div>

        <div class="input-group">
          <label for="passenger">Penumpang & Kelas</label>
          <input type="text" id="passenger" value="1 Penumpang, Ekonomi" readonly />
        </div>
        <button type="submit">Ayo Cari</button>
      </form>
    </div>
  </div>
</body>
</html>


<?php
$content = ob_get_clean();
$title = "Dashboard";

include "./layouts/app.php"
?>