<?php
require_once "conditions.php";
login();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "saveImage.php";
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
    $postID = filter_input(INPUT_POST, 'postID', FILTER_SANITIZE_NUMBER_INT);
    $oldImage = filter_input(INPUT_POST, 'oldImage', FILTER_SANITIZE_STRING);
    if ($title === "" || $content === "") {
        array_push($errors, "Title and Content cannot be empty.");
    } else {

        if (!empty($image)) {
            if (unlink("./images/" . $oldImage)) {
                require "databaseconection.php";
                try {

                    $stmt = $pdo->prepare("UPDATE blog SET title = :title, content = :content, image = :image WHERE id = :id");
                    $stmt->execute(["title" => $title, "content" => $content, "image" => $image, "id" => $postID]);
                    header("Location: ../index.php");
                } catch (Exception $e) {
                    array_push($errors, "An error occurred, please try again later");
                }
            } else {
                array_push($errors, "Can not change image.");
                unlink("./images/" . $image);
            }
        } else {
            require "databaseconection.php";
            try {
                $stmt = $pdo->prepare("UPDATE blog SET title = :title, content = :content WHERE id = :id");
                $stmt->execute(["title" => $title, "content" => $content, "id" => $postID]);
                header("Location: ../index.php");
            } catch (Exception $e) {
                array_push($errors, "An error occurred, please try again later");
            }
        }
    }
}