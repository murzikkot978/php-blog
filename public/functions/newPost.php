<?php
require_once "conditions.php";
login();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_EMAIL);
    $userID = $_SESSION['userID'];

    require "databaseconection.php";

    try {

        $stmt = $pdo->prepare("INSERT INTO blog (title, content, image, user_id) VALUES (:title, :content, :image, :user_id)");
        $stmt->execute(["title" => $title, "content" => $content, "image" => $image, "user_id" => $userID]);
        header("Location: ../index.php");
        exit();

    } catch (Exception $e) {
        array_push($errors, "An error occurred, please try again later : " . $e);
    }
}