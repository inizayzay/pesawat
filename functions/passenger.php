<?php
namespace Passenger;

require_once dirname(__FILE__) . "/../connections/database.php";

// Fungsi untuk mendapatkan semua data penumpang
function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM passenger ORDER BY PassengerID DESC");
    $stmt->execute();
    return $stmt->get_result();
}

// Fungsi untuk mendapatkan data penumpang berdasarkan ID
function getById($id)
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM passenger WHERE PassengerID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}

// Fungsi untuk membuat data penumpang baru
function create($data)
{
    global $mysql;

    $FullName      = $data['FullName'];
    $gender        = $data['gender'];
    $birthDate     = $data['birth_date'];
    $placeOfBirth  = $data['placeOfBirth'];
    $contactEmail  = $data['contactEmail'];
    $contactNumber = $data['contactNumber'];

    $stmt = $mysql->prepare("INSERT INTO passenger(Name, gender, BirthDate, PlaceOfBirth, ContactEmail, ContactNumber) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $FullName, $gender, $birthDate, $placeOfBirth, $contactEmail, $contactNumber);
    return $stmt->execute();
}

// Fungsi untuk memperbarui data penumpang
function update($data)
{
    global $mysql;

    $id            = $data['id'];
    $FullName      = $data['FullName'];
    $gender        = $data['gender'];
    $birthDate     = $data['birth_date'];
    $placeOfBirth  = $data['placeOfBirth'];
    $contactEmail  = $data['contactEmail'];
    $contactNumber = $data['contactNumber'];

    $stmt = $mysql->prepare("UPDATE passenger SET Name = ?, gender = ?, BirthDate = ?, PlaceOfBirth = ?, ContactEmail = ?, ContactNumber = ? WHERE PassengerID = ?");
    $stmt->bind_param("ssssssi", $FullName, $gender, $birthDate, $placeOfBirth, $contactEmail, $contactNumber, $id);
    return $stmt->execute();
}

function delete($id){
    global $mysql;

    $stmt = $mysql->prepare("DELETE FROM passenger WHERE PassengerID = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}