<?php

namespace TerminalGate;

require_once dirname(__FILE__) . "/../connections/database.php";

function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM terminal_gate ORDER BY Terminal & Gate DESC");
    $stmt->execute();
    return $stmt->get_result();
}


function delete($id) {
    global $mysql;
    $stmt = $mysql->prepare("DELETE FROM terminal_gate WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

