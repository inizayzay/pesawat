<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Boarding Pass</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: #f5f5f5;
    }
    .boarding-pass {
      max-width: 700px;
      margin: auto;
      background: white;
      border: 2px solid #ccc;
      padding: 20px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .logo {
      font-size: 24px;
      color: red;
      font-weight: bold;
    }
    .barcode {
      width: 120px;
      height: 60px;
      background: #000;
    }
    .info {
      margin-top: 20px;
    }
    .info h2 {
      margin-bottom: 5px;
    }
    .route {
      text-align: right;
      font-weight: bold;
      margin-bottom: 15px;
    }
    table {
      width: 100%;
      border: 1px solid #000;
      border-collapse: collapse;
    }
    td, th {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }
    .notes {
      font-size: 12px;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="boarding-pass">
  <div class="header">
    <div class="logo">Lion<span style="color:black;">Air</span><br><br>
    <small style="color: black;">Economy</small><br>
    <p style="font-size:9px; margin-top: 5px; color: black;">BOARDING PASS</p></div>
    <div class="barcode"></div>
  </div>

  <div class="info">
    <h2>MISS NABILA INNAS</h2>
    <div class="route">Soekarno Hatta Intl to Sultan Thaha Airport (CGK → DJB)</div>

    <table>
      <tr>
        <th>Flight</th>
        <th>Terminal/Gate</th>
        <th>Boarding Time</th>
        <th>Seat</th>
      </tr>
      <tr>
        <td>JT 602<br>December 20th 2021</td>
        <td>2D/D3</td>
        <td>12:15<br>Departure: 12:45</td>
        <td>12D</td>
      </tr>
    </table>

    <p style="margin-top: 10px;"><strong>Boarding Zone:</strong> ___________</p>
  </div>

  <div class="notes">
    <h4>IMPORTANT NOTES</h4>
    <ul>
      <li>Please take this boarding pass to the airport for your flight</li>
      <li>Checking in with baggage? Proceed to check-in counter 60 minutes before departure</li>
      <li>Carry-on only? Proceed to gate no later than 30 minutes before departure</li>
      <li>Ensure baggage is always in your possession and does not contain dangerous goods</li>
      <li>Report to boarding gate at least 30 minutes before departure</li>
    </ul>
  </div>
</div>

</body>
</html>
