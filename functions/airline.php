<?php

namespace Airline;

require_once dirname(__FILE__) . "/../connections/database.php";


function find($id)
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM airline WHERE AirlineID = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result();
}


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

    $airlineID = (int) $_GET['id'];
    $airlineName = $_POST['airlineName'];

    $sql = "UPDATE airline 
    SET AirlineName = ?
    WHERE AirlineID = ?";

    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("si", $airlineName, $airlineID);

    if ($stmt->execute()) {
        echo "Airline berhasil diupdate!";
    } else {
        echo "Error: " . $stmt->error;
    }
}


function delete($id)
{
    global $mysql;

    $sql = "DELETE FROM airline WHERE AirlineID = ?";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $stmt->error;
    }
}
