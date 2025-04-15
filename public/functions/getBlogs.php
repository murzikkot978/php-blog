<?php
require "databaseconection.php";
try {
    $stmt = $pdo->prepare("SELECT * FROM blog");
    $stmt->execute();
    $posts = $stmt->fetchAll();
} catch (Exception $e) {
    add_flash_message("An error occurred, please try again later");
}