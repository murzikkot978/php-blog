<?php
function login()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    return $_SESSION['userID'];
}

function checkLogin()
{
    if ($_SESSION['userID']) {
        return $_SESSION['userID'];
    }else{
        return false;
    }
}