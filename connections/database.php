<?php

$mysql = new mysqli('localhost:3308', 'root', '', 'tiket_pesawat');

if ($mysql->connect_error) {
    die("Error when connecting to database");
}
