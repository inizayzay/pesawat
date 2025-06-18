<?php

$mysql = new mysqli('localhost:3306', 'tiket_root', 'root', 'tiket_db');

if ($mysql->connect_error) {
    die("Error when connecting to database");
}
