<?php

namespace Flight;

require_once dirname(__FILE__) . "/../connections/database.php";

function find($id)
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM flight WHERE FlightID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}

function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM flight ORDER BY FlightID DESC");
    $stmt->execute();
    return $stmt->get_result();
}

function store()
{
    global $mysql;

    $flightNumber = $_POST['flightNumber']; //  'JT123';
    $departureDate =  $_POST['departureDate']; // '2025-05-10';
    $departureAirport = $_POST['departureAirport']; //  'CGK';
    $arrivalAirport = $_POST['arrivalAirport']; //  'DPS';
    $departureTime =  $_POST['departureTime']; // '08:00:00';
    $boardingTime =  $_POST['boardingTime']; // '07:30:00';
    $airlineID = $_POST['airline'];
    $terminalGateID = $_POST['terminal'];
    $MaxPassenger = $_POST['airplanepassenger'];

    $sql = "INSERT INTO Flight (FlightNumber, DepartureDate, DepartureAirport, ArrivalAirport, DepartureTime, BoardingTime, AirlineID, TerminalGateID, MaxPassenger) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";

    $stmt = $mysql->prepare($sql);
    $stmt->bind_param(
        "ssssssiii",
        $flightNumber,
        $departureDate,
        $departureAirport,
        $arrivalAirport,
        $departureTime,
        $boardingTime,
        $airlineID,
        $terminalGateID,
        $MaxPassenger
    );

    $stmt->execute();

    echo "Flight berhasil ditambahkan!";
}

function update()
{
    global $mysql;

    $flightID = $_GET['id'];
    $flightNumber = $_POST['flightNumber'];
    $departureDate = $_POST['departureDate'];
    $departureAirport = $_POST['departureAirport'];
    $arrivalAirport = $_POST['arrivalAirport'];
    $departureTime = $_POST['departureTime'];
    $boardingTime = $_POST['boardingTime'];
    $airlineID = $_POST['airline'];
    $terminalGateID = $_POST['terminal'];
    $MaxPassenger = $_POST['airplanepassenger'];

    $sql = "UPDATE Flight 
    SET FlightNumber = ?, 
        DepartureDate = ?, 
        DepartureAirport = ?, 
        ArrivalAirport = ?, 
        DepartureTime = ?, 
        BoardingTime = ?, 
        AirlineID = ?, 
        TerminalGateID = ?, 
        MaxPassenger = ?
    WHERE FlightID = ?";

    $stmt = $mysql->prepare($sql);
    $stmt->bind_param(
        "ssssssiiii",
        $flightNumber,
        $departureDate,
        $departureAirport,
        $arrivalAirport,
        $departureTime,
        $boardingTime,
        $airlineID,
        $terminalGateID,
        $MaxPassenger,
        $flightID
    );
    $stmt->execute();

    echo "Flight berhasil diupdate!";
}

function delete($id)
{
    global $mysql;

    $sql = "DELETE FROM flight WHERE FlightID = ?";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $stmt->error;
    }
}
