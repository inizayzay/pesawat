<?php

require "./connections/database.php";

function store()
{
    global $mysql;

    $flightNumber = 'JT123';
    $departureDate = '2025-05-10';
    $departureAirport = 'CGK';
    $arrivalAirport = 'DPS';
    $departureTime = '08:00:00';
    $boardingTime = '07:30:00';
    $airlineID = 1;
    $terminalGateID = 2;

    $sql = "INSERT INTO Flight (FlightNumber, DepartureDate, DepartureAirport, ArrivalAirport, DepartureTime, BoardingTime, AirlineID, TerminalGateID) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysql->prepare($sql);
    $stmt->bind_param(
        "ssssssii",
        $flightNumber,
        $departureDate,
        $departureAirport,
        $arrivalAirport,
        $departureTime,
        $boardingTime,
        $airlineID,
        $terminalGateID
    );

    echo "Flight berhasil ditambahkan!";
}

function update()
{
    global $mysql;

    $flightNumber = 'JT123';
    $departureDate = '2025-05-10';
    $departureAirport = 'CGK';
    $arrivalAirport = 'DPS';
    $departureTime = '08:00:00';
    $boardingTime = '07:30:00';
    $airlineID = 1;
    $terminalGateID = 2;

    $sql = "UPDATE Flight 
    SET FlightNumber = ?, 
        DepartureDate = ?, 
        DepartureAirport = ?, 
        ArrivalAirport = ?, 
        DepartureTime = ?, 
        BoardingTime = ?, 
        AirlineID = ?, 
        TerminalGateID = ?
    WHERE FlightID = ?";

    $stmt = $mysql->prepare($sql);
    $stmt->bind_param(
        "ssssssii",
        $flightNumber,
        $departureDate,
        $departureAirport,
        $arrivalAirport,
        $departureTime,
        $boardingTime,
        $airlineID,
        $terminalGateID
    );

    echo "Flight berhasil ditambahkan!";
}
