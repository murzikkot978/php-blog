<?php
require_once "conditions.php";
login();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userID = filter_input(INPUT_POST, 'userID', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $oldPhoto = filter_input(INPUT_POST, 'oldPhoto', FILTER_SANITIZE_STRING);
    if ($name === "" || $email === "") {
        add_flash_message("Name and Email cannot be empty.");
    } else {
        require "savePhoto.php";
        if ($photo) {
            if ($oldPhoto !== "default.png") {
                if (!unlink("./userPhoto/" . $oldPhoto)) {
                    add_flash_message("Cannot delete old photo.");
                    unlink("./userPhoto/" . $photo);
                    exit();
                }
            }
            require "databaseconection.php";
            try {
                $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, photo = :photo WHERE id = :id");
                $stmt->execute(["name" => $name, "email" => $email, "photo" => $photo, "id" => $userID]);
                header("Location: ../userProfile.php");
                exit();
            } catch (Exception $e) {
                add_flash_message("An error occurred, please try again later");
            }
        } else {
            require "databaseconection.php";
            try {
                $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
                $stmt->execute(["name" => $name, "email" => $email, "id" => $userID]);
                header("Location: ../userProfile.php");
                exit();
            } catch (Exception $e) {
                add_flash_message("An error occurred, please try again later");
            }
        }
    }
}