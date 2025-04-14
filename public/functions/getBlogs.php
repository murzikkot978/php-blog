<?php
require "databaseconection.php";
try {
    $stmt = $pdo->prepare("SELECT * FROM blog");
    $stmt->execute();
    $posts = $stmt->fetchAll();
} catch (Exception $e) {
    array_push($errors, "An error occurred, please try again later");
}