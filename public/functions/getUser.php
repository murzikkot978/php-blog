<?php
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(["id" => $id]);
    $userInformation = $stmt->fetch();
} catch (PDOException $e) {
    add_flash_message("An error occurred, please try again later");
}