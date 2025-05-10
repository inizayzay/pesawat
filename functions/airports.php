<?php

namespace Airport;

require_once dirname(__FILE__) . "/../connections/database.php";


function get()
{
    global $mysql;

    $name = $_GET['name'] ?? null;
    if (!empty($name)) {
        $name = "%" . $name . "%";
        $stmt = $mysql->prepare("SELECT AirportName,Municipality,IataCode FROM airport WHERE AirportName LIKE ? OR Municipality LIKE ? OR IataCode LIKE ? ORDER BY AirportName ASC LIMIT 10");
        $stmt->bind_param('sss', $name, $name, $name);
    } else {
        $stmt = $mysql->prepare("SELECT AirportName,Municipality,IataCode FROM airport ORDER BY AirportName ASC LIMIT 10");
    }
    $stmt->execute();
    $result = $stmt->get_result();

    $airports = [];

    while ($row = $result->fetch_assoc()) {
        $airports[] = $row;
    }

    return $airports;
}


function find($iataCode)
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT AirportName,Municipality,IataCode FROM airport WHERE IataCode =?");
    $stmt->bind_param('s', $iataCode);

    $stmt->execute();
    return $stmt->get_result();
}
