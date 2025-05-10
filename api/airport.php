<?php

require_once dirname(__FILE__) . "/../functions/airports.php";

use Airport as Airport;

header('Content-Type: Application/Json');
echo json_encode(Airport\get());
