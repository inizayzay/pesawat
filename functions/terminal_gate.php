<?php

namespace TerminalGate;

require_once dirname(__FILE__) . "/../connections/database.php";

function find($id)
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM terminal_gate WHERE TerminalGateID = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result();
}

function store()
{
    global $mysql;

    $terminal = $_POST['Terminal'];
    $gate = $_POST['Gate'];

    $sql = "INSERT INTO terminal_gate (Terminal,Gate) VALUES (?,?)";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("ss", $terminal, $gate);

    if ($stmt->execute()) {
        echo "Airline berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

function update()
{
    global $mysql;

    $id = $_GET['id'];
    $terminal = $_POST['Terminal'];
    $gate = $_POST['Gate'];

    $sql = "UPDATE terminal_gate SET Terminal = ?, Gate = ?  WHERE TerminalGateID = ?";
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("ssi", $terminal, $gate, $id);

    if ($stmt->execute()) {
        echo "Terminal & Gate berhasil diupdate!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM terminal_gate ORDER BY TerminalGateID DESC");
    $stmt->execute();
    return $stmt->get_result();
}


function delete($id)
{
    global $mysql;
    $stmt = $mysql->prepare("DELETE FROM terminal_gate WHERE TerminalGateID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->execute()) {
        echo "Terminal & Gate berhasil dihapus!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
