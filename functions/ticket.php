<?php

namespace Ticket;

require_once dirname(__FILE__) . "/../connections/database.php";

function find($id)
{
    global $mysql;

    $stmt = $mysql->prepare("
        SELECT 
        f.*,
        tg.*,
        t.SeatNumber,
        p.Name as passenger_name,
        departure_airport.IataCode as departure_airport_code, 
        arrival_airport.IataCode as arrival_airport_code ,
        departure_airport.AirportName as departure_airport_name, 
        arrival_airport.AirportName as arrival_airport_name 
        from ticket t
        inner join flight f on t.FlightID = f.FlightID 
        inner join passenger p on p.PassengerID = t.PassengerID 
        inner join airport departure_airport on departure_airport.IataCode = f.DepartureAirport 
        inner join airport arrival_airport on arrival_airport.IataCode = f.ArrivalAirport 
        inner join terminal_gate tg on f.TerminalGateID = tg.TerminalGateID 
        WHERE t.TicketID = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result();
}

// Buat fungsi get
function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM ticket ORDER BY TicketID DESC");
    $stmt->execute();
    return $stmt->get_result();
}

function delete($id)
{
    global $mysql;

    $sql = "DELETE FROM ticket WHERE TicketID = ?";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $stmt->error;
    }
}
