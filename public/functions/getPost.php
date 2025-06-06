<?php
$id = filter_input(INPUT_GET, 'id');
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    require "databaseconection.php";
    try {
        $stmt = $pdo->prepare("SELECT blog.id, blog.title, blog.content, blog.create_at, blog.image, blog.user_id , users.name FROM blog LEFT JOIN users ON blog.user_id = users.id WHERE blog.id = :id");
        $stmt->execute(['id' => $id]);
        $post = $stmt->fetch();
    } catch (Exception $e) {
        add_flash_message("An error occurred, please try again later");
    }
}
