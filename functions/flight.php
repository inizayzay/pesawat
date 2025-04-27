<?php

require "./connections/database.php";

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

    $flightNumber = $_POST['flightNumber']; //  'JT123';
    $departureDate =  $_POST['departureDate']; // '2025-05-10';
    $departureAirport = $_POST['departureAirport']; //  'CGK';
    $arrivalAirport = $_POST['arrivalAirport']; //  'DPS';
    $departureTime =  $_POST['departureTime']; // '08:00:00';
    $boardingTime =  $_POST['boardingTime']; // '07:30:00';
    $airlineID = $_POST['airline'];
    $terminalGateID = $_POST['terminal'];

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
