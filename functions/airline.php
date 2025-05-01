<?php

namespace Airline;

require_once dirname(__FILE__) . "/../connections/database.php";


// Buat fungsi get
function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM airline ORDER BY AirlineID DESC");
    $stmt->execute();
    return $stmt->get_result();
}

function store()
{
    global $mysql;

    $airlineName = $_POST['airlineName'];

    $sql = "INSERT INTO Airline (AirlineName) VALUES (?)";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("s", $airlineName);

    if ($stmt->execute()) {
        echo "Airline berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

function update()
{
    global $mysql;

    $airlineName = $_POST['airlineName'];

    $sql = "UPDATE Airline 
    SET AirlineName = ?
    WHERE AirlineID = ?";

    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("ssi", $airlineName, $airlineID);

    if ($stmt->execute()) {
        echo "Airline berhasil diupdate!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
