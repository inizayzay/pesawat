<?php

$mysql = new mysqli('localhost:3306', 'root', '', 'tiket_pesawat');

if ($mysql->connect_error) {
    die("Error when connecting to database");
}
