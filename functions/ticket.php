<?php
namespace Ticket;

require_once dirname(__FILE__) . "/../connections/database.php";

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