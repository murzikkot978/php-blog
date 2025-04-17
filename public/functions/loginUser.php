<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    require_once "databaseconection.php";

    try {
        $cheking = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $cheking->execute(["email" => $email]);
        $user = $cheking->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["userID"] = $user["id"];
            $_SESSION["admin"] = $user["admin"];
            header("Location: index.php");
            exit();
        } else {
            add_flash_message("Try again");
        }

    } catch (Exception $e) {
        add_flash_message("An error occurred, please try again later");
    }
}
?>