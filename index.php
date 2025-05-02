<?php

require_once dirname(__FILE__) . "/functions/check.php";

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
  display: flex;
  gap: 5px; /* Ini buat kasih jarak */
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
  transform: scale(2);
  margin: 5; /* Reset margin default browser */

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
<form method="post" action="beli_tiket.php">

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
          <label for="from">From</label>
          <select id="single" name="departureAirport" class="form-control select2-departure-airport">
        <option></option>
        <optgroup label="Alaskan/Hawaiian Time Zone">
          <option value="AK">Alaska</option>
          <option value="HI" disabled="disabled">Hawaii</option>
        </optgroup>
      </select>
        </div>
        <div class="input-group">
          <label for="to">To</label>
          <select id="single" name="departureAirport" class="form-control select2-departure-airport">
        <option></option>
        <optgroup label="Alaskan/Hawaiian Time Zone">
          <option value="AK">Alaska</option>
          <option value="HI" disabled="disabled">Hawaii</option>
        </optgroup>
      </select>
        </div>
        <div class="input-group">
          <label for="departure">Go</label>
          <input type="date" id="departure" />
        </div>
        <div class="input-group checkbox-group">
  <label for="return">
    <input type="checkbox" id="return" />
    Round-Trip?
  </label>
</div>

        <div class="input-group">
          <label for="passenger">Passenger</label><br>
          <select name="Passenger" id="Passenger" class="form-control select2-Passenger">
        <option></option>
        <optgroup label="Adult (12+ years)">
          <option value="Adult">Adult</option>
        </optgroup>
        <optgroup label="Child (2-11 years)">
          <option value="Child">Child</option>
        </optgroup>
        <optgroup label="Infant (under 2 years)">
          <option value="Infant">Infant</option>
        </optgroup>
        </div>
        </select>
        <div class="input-group">
          <label for="Class">Class</label>
          <select id="Class" name="Class" class="form-control select2-departure-class">
        <option></option>
        <optgroup label="Business Class">
          <option value="BS">Business</option>
        </optgroup>
      </select>
        </div>
        <button type="submit">Ayo Cari</button>
      </form>
    </div>
  </div>
</body>
</html>


<?php
$content = ob_get_clean();

ob_start();
?>

<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">


<script>
  $(".select2-departure-airport, .select2-arrival-airport").select2({
    placeholder: 'Select Airport',
    width: '100%',
    containerCssClass: ':all:',
    theme: 'bootstrap',
    ajax: {
      url: 'api/airport.php',
      dataType: 'json',
      delay: 250,
      data: function(params) {
        return {
          name: params.term
        };
      },
      processResults: function(data) {
        return {
          results: data.map(function(airport) {
            return {
              id: airport.IataCode,
              text: `${airport.AirportName} – ${airport.Municipality} (${airport.IataCode})`
            };
          })
        };
      },
      cache: true
    }
  });
  $(document).ready(function() {
    // Aktifkan Select2 untuk dropdown Passenger
    $('.select2-Passenger').select2({
      placeholder: "Select passenger type",
      allowClear: true
    });

    // Aktifkan Select2 untuk dropdown Class
    $('.select2-departure-class').select2({
      placeholder: "Select class",
      allowClear: true
    });

    // Contoh event handler jika kamu mau menangkap perubahan value
    $('#Passenger').on('change', function() {
      console.log('Passenger selected:', $(this).val());
    });

    $('#Class').on('change', function() {
      console.log('Class selected:', $(this).val());
    });
  });


</script>

<?php 
$script = ob_get_clean();
$title = "Dashboard";

include "./layouts/app.php"
?>