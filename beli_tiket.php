
<!-- Page Heading -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pencarian Tiket Pesawat</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        td {
            padding: 10px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .swap-icon {
            text-align: center;
            font-size: 12px;
            color: #000; 
            cursor: pointer;
            transform: rotate(90deg);
            margin:  auto;
            display: left;
        }

        .swap-icon:hover {
            color: #0056b3;
        }

        .result-table {
            width: 100%;
            border: 1px solid #ccc;
            text-align: center;
            background-color: #d3d3d3;
            border-radius: 10px;
        }

       
        button {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

<h1>Pencarian Tiket Pesawat</h1>

<form method="post" action="simpan.php">
    <table>
        <tr>
            <td>
                <label for="maskapai">Filter Maskapai</label><br>
                <select name="maskapai" id="maskapai" required>
                    <option value="">-- Pilih Maskapai --</option>
                    <option value="Garuda Indonesia">Garuda Indonesia</option>
                    <option value="Lion Air">Lion Air</option>
                    <option value="Citilink">Citilink</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="Harga">Filter Harga</label><br>
                <select name="Harga" id="Harga">
                    <option value="">-- Pilih Rentang Harga --</option>
                    <option value="diatas 400">Di atas 400</option>
                    <option value="dibawah 400">Di bawah 400</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="dari" id="dari" placeholder="Dari (asal)" required>
            </td>
        </tr>
        <tr>
            <td>
                <i class="fas fa-exchange-alt swap-icon" onclick="tukarLokasi()"></i>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="tujuan" id="tujuan" placeholder="Ke (tujuan)" required>
            </td>
        </tr>
    </table>

    <!-- Tabel hasil penerbangan -->
    <table class="result-table">
        <tr>
            <td><strong>Citilink</strong><br><b>Jakarta - Jambi</b><br>CGK-DJB</td>
            <td>18.00 - 19.00</td>
            <td>Rp. 400.000</td>
        </tr>
    </table>

    <button type="submit">Kirim Data</button>
</form>

<script>
function tukarLokasi() {
    const dari = document.getElementById("dari");
    const tujuan = document.getElementById("tujuan");
    const temp = dari.value;
    dari.value = tujuan.value;
    tujuan.value = temp;
}
</script>

</body>
</html>
<?php
