<?php

require_once dirname(__FILE__) . "/functions/check.php";

if (!check())
  header('location: login.php');

ob_start();
?>

<div class="container">
  <h2>Search Flight Ticket</h2>

  <form onsubmit="return false;">
    <div class="input-group">
      <div class="input-icon">
        <i class="fas fa-plane-departure"></i>
        <input type="text" id="dari" placeholder="Departure City" required>
      </div>
      <button type="button" class="swap-btn" onclick="tukarLokasi()">
        <i class="fas fa-exchange-alt"></i>
      </button>
      <div class="input-icon">
        <i class="fas fa-plane-arrival"></i>
        <input type="text" id="tujuan" placeholder="Destination City" required>
      </div>
    </div>

    <div class="filter-bar">
      <div class="filter-btn">
        <i class="fas fa-plane"></i>
        <select id="Airline">
          <option value="">Airline</option>
          <option>Garuda Indonesia</option>
          <option>Lion Air</option>
          <option>Citilink</option>
        </select>
      </div>

      <div class="filter-btn">
        <i class="fas fa-tag"></i>
        <select id="Price">
          <option value="">Price</option>
          <option value="diatas 400">Di atas 400</option>
          <option value="dibawah 400">Di bawah 400</option>
        </select>
      </div>
    </div>

    <button type="submit">Search Ticket</button>

    <div class="result" onclick="pilihTiket(this)">
      <p><strong>Citilink</strong> • Jakarta to Jambi • 18:00 - 19:00 • Rp. 400.000</p>
    </div>
    <div class="result" onclick="pilihTiekt(this)"></div>
  </form>
</div>

<script>
  function tukarLokasi() {
    const dari = document.getElementById("dari");
    const tujuan = document.getElementById("tujuan");
    const temp = dari.value;
    dari.value = tujuan.value;
    tujuan.value = temp;
  }

  function pilihTiket(element) {
    // Hapus pilihan lain jika ada
    document.querySelectorAll('.result').forEach(el => el.classList.remove('selected'));

    // Tandai yang dipilih
    element.classList.add('selected');

    // Contoh: Simpan data atau tampilkan alert
  }
</script>

<?php
$content = ob_get_clean();

ob_start();
?>
<style>
  .container {
    max-width: 800px;
    margin: 0 auto;
    background: white;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
  }

  h2 {
    text-align: center;
    color: #007bff;
    margin-bottom: 30px;
  }

  .input-group {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
  }

  .input-icon {
    position: relative;
    flex: 1;
  }

  .input-icon i {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    color: #888;
  }

  .input-icon input {
    width: 100%;
    padding: 12px 12px 12px 40px;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 15px;
  }

  .swap-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: none;
    background-color: #e6f0ff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: transform 0.3s;
  }

  .swap-btn:hover {
    background-color: #cce0ff;
  }

  .filter-bar {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin: 20px 0;
  }

  .filter-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background-color: white;
    border: 1px solid #dce1e7;
    border-radius: 999px;
    cursor: pointer;
    font-size: 14px;
    color: #333;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
    position: relative;
  }

  .filter-btn select {
    border: none;
    background: transparent;
    font-size: 14px;
    padding-right: 18px;
    cursor: pointer;
    appearance: none;
  }

  .filter-btn select:focus {
    outline: none;
  }

  .filter-btn i {
    color: #555;
  }

  .filter-btn::after {
    content: '\f078';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    position: absolute;
    right: 14px;
    font-size: 10px;
    color: #666;
    pointer-events: none;
  }

  button[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 14px 24px;
    font-size: 16px;
    border: none;
    border-radius: 10px;
    width: 100%;
    cursor: pointer;
    transition: background 0.3s;
  }

  button[type="submit"]:hover {
    background-color: #0056b3;
  }

  .result {
    margin-top: 30px;
    padding: 20px;
    background-color: #eef3f8;
    border-radius: 12px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s, border 0.3s;
    border: 2px solid transparent;
  }

  .result:hover {
    background-color: #dde7f2;
  }

  .result.selected {
    border-color: #007bff;
    background-color: #d0e5ff;
  }

  @media (max-width: 600px) {
    .input-group {
      flex-direction: column;
    }

    .swap-btn {
      margin: 10px auto;
    }

    .filter-bar {
      flex-direction: column;
      gap: 10px;
    }
  }
</style>
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
$title = "";

include "./layouts/app.php"
?>