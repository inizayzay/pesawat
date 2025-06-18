<?php
namespace Register;

require_once dirname(__FILE__) . "/../connections/database.php";

use Exception;

/**
 * Ambil semua data penumpang
 */
function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM passenger ORDER BY PassengerID DESC");
    $stmt->execute();
    return $stmt->get_result();
}

function create($data)
{
    global $mysql;

    $mysql->begin_transaction();

    try {
        $fullName = $data['FullName'];
        $email = $data['contactEmail'];
        $gender = $data['gender'];
        $birthDate = $data['birth_date'];
        $placeOfBirth = $data['placeOfBirth'];
        $contactNumber = $data['contactNumber'];

        $password = $data['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $role = 'passenger';

        $stmt = $mysql->prepare("INSERT INTO user (Username, PasswordHash, Role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullName, $hashedPassword, $role);
        $stmt->execute();

        $userId = $mysql->insert_id;

        $stmt = $mysql->prepare("INSERT INTO passenger (Name, gender, BirthDate, PlaceOfBirth, ContactEmail, ContactNumber, UserID) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $fullName, $gender, $birthDate, $placeOfBirth, $email, $contactNumber, $userId);
        $stmt->execute();

        $mysql->commit();

        return [
            'success' => true,
        ];
    } catch (Exception $e) {
        $mysql->rollback();
        throw $e;
    }
}
