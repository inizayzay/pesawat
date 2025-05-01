<?php

require_once dirname(__FILE__) . "/../functions/airports.php";

header('Content-Type: Application/Json');
echo json_encode(get());
