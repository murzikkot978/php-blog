<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deletePostId = filter_input(INPUT_POST, 'deletePost');
    $deleteImage = filter_input(INPUT_POST, 'deleteImage', FILTER_SANITIZE_STRING);
    if (unlink("./images/" . $deleteImage)) {
        require "databaseconection.php";
        try {
            $stmt = $pdo->prepare("DELETE FROM blog WHERE id = :id");
            $stmt->execute(['id' => $deletePostId]);
            header("Location: ../index.php");
        } catch (Exception $e) {
            add_flash_message("An error occurred, please try again later");
        }
    } else {
        add_flash_message("Can not change image.");
    }
}