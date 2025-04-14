<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = filter_input(INPUT_GET, 'id');
    require "databaseconection.php";
    try {
        $stmt = $pdo->prepare("SELECT blog.title, blog.content, blog.create_at, blog.image, users.name FROM blog JOIN users ON blog.user_id = users.id WHERE blog.id = :id");
        $stmt->execute(['id' => $id]);
        $post = $stmt->fetch();
    } catch (Exception $e) {
        array_push($errors, "An error occurred, please try again later");
    }
}
