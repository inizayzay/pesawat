<?php

session_start();

function check()
{
    if (isset($_SESSION['user']) && $_SESSION['user'])
        return $_SESSION['user'];

    return false;
}
