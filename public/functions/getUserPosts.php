<?php
require "databaseconection.php";
try {
    $stmt = $pdo->prepare("SELECT * FROM blog WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $user_id]);
    $posts = $stmt->fetchAll();
} catch (Exception $e) {
    add_flash_message("An error occurred, please try again later");
}