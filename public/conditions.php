<?php
function login()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    return $_SESSION['userID'];
}

function logout()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $logout = filter_input(INPUT_POST, 'logout', FILTER_SANITIZE_STRING);
        if (isset($_POST[$logout])) {
            session_start();
            session_unset();

            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();

            header('Location: index.php');
        }
    }

}

function checkLogin()
{
    if ($_SESSION['userID']) {
        return $_SESSION['userID'];
    } else {
        return false;
    }
}

function connection($user)
{
    if (!isset($user) || $user === false) {
        header('Location: login.php');
    }
}

function verificationID($user_id, $admin)
{
    if ($_SESSION['userID'] !== $user_id && $admin !== 1) {
        header("Location: index.php");
        exit();
    }
}