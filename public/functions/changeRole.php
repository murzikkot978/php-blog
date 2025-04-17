<?php
require_once "conditions.php";
login();
$verification = $_SESSION["userID"];
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userID = filter_input(INPUT_POST, 'userID', FILTER_SANITIZE_NUMBER_INT);
    $userRole = filter_input(INPUT_POST, 'userRole', FILTER_SANITIZE_NUMBER_INT);
    $admin = $userRole === '0';
    if ($verification != $userID) {
        require "databaseconection.php";
        try {
            $stmt = $pdo->prepare("UPDATE users SET admin = :admin WHERE id = :id");
            $stmt->execute(["admin" => (int)$admin, "id" => $userID]);
            header("Location: ../allUsersDetaile.php");
            exit();
        } catch (Exception $e) {
            add_flash_message("An error occurred, please try again later");

        }
    } else {
        add_flash_message("You can not change your role !");
    }
}
