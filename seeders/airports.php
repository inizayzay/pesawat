<?php

require_once dirname(__FILE__) . "/connections/database.php";

function readCSVtoJSON($filename)
{
    if (!file_exists($filename) || !is_readable($filename)) {
        return json_encode(["error" => "File tidak ditemukan atau tidak bisa dibaca"]);
    }

    $data = [];
    if (($handle = fopen($filename, 'r')) !== false) {
        $header = fgetcsv($handle);
        while (($row = fgetcsv($handle)) !== false) {
            $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}

$filename = "./data/airports.csv";
$airports = readCSVtoJSON($filename);

if (!is_array($airports)) {
    echo $airports;
} else {
    foreach ($airports as $airport) {
        $airportID = $mysql->real_escape_string($airport['id']);
        $airportName = $mysql->real_escape_string($airport['name']);
        $municipality = $mysql->real_escape_string($airport['municipality']);
        $iataCode = $mysql->real_escape_string($airport['iata_code']);

        $sql = "INSERT INTO Airport (AirportID, AirportName, Municipality, IataCode)
            VALUES ('$airportID', '$airportName', '$municipality', '$iataCode')";

        if ($mysql->query($sql) === TRUE) {
            echo "Data berhasil dimasukkan: $airportName<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}
