<?php

require_once dirname(__FILE__) . "/functions/check.php";
require_once dirname(__FILE__) . "/functions/airline.php";
require_once dirname(__FILE__) . "/functions/flight.php";

use Airline as Airline;
use Flight as Flight;

$airlines = Airline\get();

if (!check()) {
  header('Location: login.php');
  exit;
}


if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];
  $flights = Flight\filter($_GET);
}

ob_start();
?>

<div class="container">
  <?php
  if ($_SESSION['user']['Role'] == 'admin') {
    ?>

    <h2>Welcome Admin</h2>
  <?php } else { ?>

    <h2>Search Flight Ticket</h2>

    <form>
      <input type="hidden" name="filter" value="1">
      <div class="input-group">
        <div class="input-icon">
          <!-- <i class="fas fa-plane-departure"></i> -->
          <select id="dari" name="dari" placeholder="Departure City" required class="select2-departure-airport"></select>
        </div>
        <button type="button" class="swap-btn" onclick="tukarLokasi()">
          <i class="fas fa-exchange-alt"></i>
        </button>
        <div class="input-icon">
          <!-- <i class="fas fa-plane-arrival"></i> -->
          <select id="tujuan" name="tujuan" placeholder="Destination City" required
            class="select2-arrival-airport"></select>
        </div>
      </div>

      <div class="filter-bar">
        <div class="filter-btn">
          <i class="fas fa-plane"></i>
          <select id="Airline" name="airline">
            <option value="" disabled selected>-- Pilih Maskapai --</option>
            <?php while ($airline = $airlines->fetch_assoc()): ?>
              <option value="<?= $airline['AirlineID'] ?>"><?= $airline['AirlineName'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>

        <div class="filter-btn">
          <i class="fas fa-tag"></i>
          <select id="Price" name="price">
            <option value="">Price</option>
            <option value=">400">Lebih dari 400</option>
            <option value="<=400">Kurang atau sama dengan 400</option>
          </select>
        </div>
      </div>

      <button type="submit">Search Ticket</button>
      <?php if (isset($flights)): ?>
        <?php while ($flight = $flights->fetch_assoc()): ?>
          <div class="result" data-flight='<?= htmlspecialchars(json_encode($flight), ENT_QUOTES, 'UTF-8') ?>'
            onclick="pilihTiket(this)">
            <p><strong><?= $flight['airline_name'] ?></strong> • <?= $flight['departure_city'] ?> to
              <?= $flight['arrival_city'] ?> • <?= $flight['departure_time'] ?> • Rp.
              <?= number_format($flight['flight_price']) ?>
            </p>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </form>
    <?php
  }
  ?>
</div>

<!-- Modal -->
<div class="modal fade" id="flightModal" tabindex="-1" aria-labelledby="flightModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="simpan_tiket.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Tiket</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="flightID" value="" id="input-flight">

          <p><strong>Maskapai:</strong> <span id="modal-airline"></span></p>

          <p><strong>Dari:</strong> <span id="modal-departure"></span></p>

          <p><strong>Tujuan:</strong> <span id="modal-arrival"></span></p>

          <p><strong>Jam Berangkat:</strong> <span id="modal-time"></span></p>

          <p><strong>Harga:</strong> Rp <span id="modal-price"></span></p>
        </div>

        <div class="modal-footer">
          <button type="submit">Pesan Tiket</button>
        </div>
    </form>
  </div>
</div>


<script>
  function tukarLokasi() {
    const dari = document.getElementById("dari");
    const tujuan = document.getElementById("tujuan");
    const temp = dari.value;
    dari.value = tujuan.value;
    tujuan.value = temp;
    $("#dari").trigger("change");
    $("#tujuan").trigger("change");
  }

  function pilihTiket(element) {
    const flight = JSON.parse(element.dataset.flight)
    document.querySelectorAll('.result').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');

    document.getElementById('modal-airline').textContent = flight.airline_name;
    document.getElementById('modal-departure').textContent = flight.departure_city;
    document.getElementById('modal-arrival').textContent = flight.arrival_city;
    document.getElementById('modal-time').textContent = flight.departure_time;
    document.getElementById('modal-price').textContent = flight.flight_price.toLocaleString('id-ID');

    document.getElementById('input-flight').value = flight.FlightID

    const myModal = new bootstrap.Modal(document.getElementById('flightModal'));
    myModal.show();
  }
</script>

<?php
$content = ob_get_clean();

ob_start();
?>
<style>
  .container {
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

  .select2-container .select2-selection--single {
    height: 44px;
    padding-left: 40px;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 15px;
    display: flex;
    align-items: center;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #333;
    line-height: 44px;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 100%;
    right: 10px;
  }

  .select2-container {
    width: 100% !important;
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
    transition: background-color 0.3s;
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
    transition: background-color 0.3s;
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
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
<script>
  $(document).ready(function () {
    $(".select2-departure-airport, .select2-arrival-airport").select2({
      placeholder: 'Select Airport',
      width: '100%',
      ajax: {
        url: 'api/airport.php',
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            name: params.term
          };
        },
        processResults: function (data) {
          return {
            results: data.map(function (airport) {
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

    function getQueryParam(param) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(param);
    }

    function setSelect2Default($select, value, text) {
      if (value && text) {
        const option = new Option(text, value, true, true);
        $select.append(option).trigger('change');
      }
    }

    $.ajax({
      url: 'api/airport.php?code=' + getQueryParam('dari'),
      dataType: 'json',
      success: function (data) {
        const airport = data[0];
        setSelect2Default($('.select2-departure-airport'), airport.IataCode, `${airport.AirportName} – ${airport.Municipality} (${airport.IataCode})`);
      }
    });

    $.ajax({
      url: 'api/airport.php?code=' + getQueryParam('tujuan'),
      dataType: 'json',
      success: function (data) {
        const airport = data[0];
        setSelect2Default($('.select2-arrival-airport'), airport.IataCode, `${airport.AirportName} – ${airport.Municipality} (${airport.IataCode})`);
      }
    });

    document.getElementById("Airline").value = getQueryParam("airline") || "";
    document.getElementById("Price").value = getQueryParam("price") || "";
  });
</script>
<?php
$script = ob_get_clean();
$title = "";
include "./layouts/app.php";
