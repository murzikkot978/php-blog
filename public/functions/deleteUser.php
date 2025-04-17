<?php
$id = $_SESSION['userID'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ../index.php");
    } catch (Exception $e) {
        add_flash_message("An error occurred, please try again later");
    }
}