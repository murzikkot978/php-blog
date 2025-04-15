<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $deletePostId = filter_input(INPUT_POST, 'deletePost');
    $deleteImage = filter_input(INPUT_POST, 'deleteImage', FILTER_SANITIZE_STRING);
    if (unlink("./images/" . $deleteImage)) {
        require "databaseconection.php";
        try {
            $stmt = $pdo->prepare("DELETE FROM blog WHERE id = :id");
            $stmt->execute(['id' => $deletePostId]);
            header("Location: ../index.php");
        } catch (Exception $e) {
            array_push($errors, "An error occurred, please try again later");
        }
    }
}