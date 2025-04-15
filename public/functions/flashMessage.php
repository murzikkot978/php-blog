<?php
function add_flash_message($message)
{
    $_SESSION["message"][] = $message;
}

function flash_message()
{
    return !empty($_SESSION['message']);
}

function get_messages()
{
    $messages = empty($_SESSION['message']) ? [] : $_SESSION['message'];
    unset($_SESSION["message"]);
    return $messages;
}