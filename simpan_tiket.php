<?php
include 'connections/database.php';
require_once dirname(__FILE__) . "/functions/check.php";

if (!check()) {
    header('Location: login.php');
    exit;
}

function generateRecordLocator($length = 6)
{
    return strtoupper(substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $length));
}

function generateETicketNumber()
{
    $airlineCode = rand(100, 999);
    $ticketSerial = str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
    return $airlineCode . '-' . $ticketSerial;
}

function generateSeatNumber()
{
    $row = rand(1, 40);
    $seatLetter = ['A', 'B', 'C', 'D', 'E', 'F'];
    return $row . $seatLetter[array_rand($seatLetter)];
}

function generateBoardingZone()
{
    return rand(1, 5);
}

$recordLocator = generateRecordLocator();
$eTicketNumber = generateETicketNumber();
$seatNumber = generateSeatNumber();
$boardingZone = generateBoardingZone();

if ($mysql->connect_error) {
    die("Koneksi gagal: " . $mysql->connect_error);
}

$authUser = $_SESSION['user'];
$authUserId = $authUser['UserID'];

$passenger = $mysql->query("SELECT * FROM passenger WHERE UserID = '$authUserId'");
$passengerID = $passenger->fetch_array(MYSQLI_ASSOC)['PassengerID'];

$flightID = $_POST['flightID'];

$stmt = $mysql->prepare("INSERT INTO ticket (RecordLocator, eTikcketNumber, SeatNumber, BoardingZone, PassengerID, FlightID) VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssii", $recordLocator, $eTicketNumber, $seatNumber, $boardingZone, $passengerID, $flightID);

if ($stmt->execute()) {
    echo "Data tiket berhasil disimpan!";
} else {
    echo "Gagal menyimpan data: " . $stmt->error;
}

$stmt->close();
$mysql->close();
