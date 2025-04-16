<?php
try {
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $allUsers = $stmt->fetchAll();
} catch (PDOException $e) {
    add_flash_message("An error occurred, please try again later");
}