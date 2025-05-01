<?php

require_once dirname(__FILE__) . "/connections/database.php";


// Buat fungsi get
function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM ticket ORDER BY TicketID DESC");
    $stmt->execute();
    return $stmt->get_result();
}