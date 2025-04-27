<?php

require "./connections/database.php";

function store()
{
    global $mysql;

    $terminal = $_POST['terminal'];

    $sql = "INSERT INTO terminal_gate (Terminal) VALUES (?)";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("s", $terminal);

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
