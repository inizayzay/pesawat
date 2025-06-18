<?php

namespace Flight;

require_once dirname(__FILE__) . "/../connections/database.php";

function filter($filter)
{
    global $mysql;

    $params = [];
    $types = '';

    $query = "
    SELECT
    f.FlightID,
    airline.AirlineName  as airline_name,
    departure.Municipality as departure_city,
    arrival.Municipality as arrival_city,
    f.DepartureTime as departure_time,
    f.price as flight_price
    FROM flight f 
    JOIN airport departure ON departure.IataCode COLLATE utf8mb4_unicode_ci = f.DepartureAirport COLLATE utf8mb4_unicode_ci
    JOIN airport arrival ON arrival.IataCode COLLATE utf8mb4_unicode_ci = f.ArrivalAirport COLLATE utf8mb4_unicode_ci
    JOIN airline ON airline.AirlineID = f.AirlineID
    WHERE 1 = 1
    ";

    if (!empty($filter['dari'])) {
        $query .= " AND f.DepartureAirport = ?";
        $types .= 's';
        $params[] = $filter['dari'];
    }

    if (!empty($filter['tujuan'])) {
        $query .= " AND f.ArrivalAirport = ?";
        $types .= 's';
        $params[] = $filter['tujuan'];
    }

    if (!empty($filter['airline'])) {
        $query .= " AND f.AirlineID = ?";
        $types .= 'i';
        $params[] = (int)$filter['airline'];
    }

    if ($filter['price'] == '>400') {
        $query .= " AND price > 400000";
    } elseif ($filter['price'] == '<=400') {
        $query .= " AND price <= 400000";
    }

    $stmt = $mysql->prepare($query);
    if ($types !== '') {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    return $stmt->get_result();
}

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
    $price = $_POST['price'];

    $sql = "INSERT INTO flight (FlightNumber, DepartureDate, DepartureAirport, ArrivalAirport, DepartureTime, BoardingTime, AirlineID, TerminalGateID, MaxPassenger, price) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

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
        $price
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
    $price = $_POST['price'];

    $sql = "UPDATE flight 
    SET FlightNumber = ?, 
        DepartureDate = ?, 
        DepartureAirport = ?, 
        ArrivalAirport = ?, 
        DepartureTime = ?, 
        BoardingTime = ?, 
        AirlineID = ?, 
        TerminalGateID = ?, 
        MaxPassenger = ?,
        price = ?
    WHERE FlightID = ?";

    $stmt = $mysql->prepare($sql);
    $stmt->bind_param(
        "ssssssiiiii",
        $flightNumber,
        $departureDate,
        $departureAirport,
        $arrivalAirport,
        $departureTime,
        $boardingTime,
        $airlineID,
        $terminalGateID,
        $MaxPassenger,
        $price,
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
