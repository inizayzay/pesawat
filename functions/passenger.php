<?php
namespace Passenger;

require_once dirname(__FILE__) . "/../connections/database.php";

// Buat fungsi get
function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM passenger ORDER BY PassengerID DESC");
    $stmt->execute();
    return $stmt->get_result();
}