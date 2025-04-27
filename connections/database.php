<?php

$mysql = new mysqli('localhost', 'root', '', 'tiket_pesawat');

if ($mysql->connect_error) {
    die("Error when connecting to database");
}
