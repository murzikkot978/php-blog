<?php
require_once "conditions.php";
login();
require "functions/flashMessage.php";
$user = checkLogin();
connection($user);
require "functions/newPost.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="compiled.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php require "navigationBar.php" ?>

<div class="flex flex-col gap-5 justify-center items-center w-full h-full ">
    <div class="flex flex-col w-full h-full justify-center items-center">
        <p class="text-6xl w-64 flex justify-center">New post</p><br>

        <?php require "functions/displayMessage.php" ?>

        <form method="post" class="custom-form" enctype="multipart/form-data">
            <label for="title" class="text-2xl">Title</label>
            <input name="title" type="text" class="border-2 w-2xl h-10"><br>
            <label for="contetnt" class="text-2xl">Content</label>
            <textarea name="content" type="text" class="border-2 w-2xl h-28"></textarea><br>
            <label for="image" class="text-2xl">Image</label>
            <input name="image" type="file" class="border-2"><br>
            <button type="submit" name="upload" class="border-2 w-28">Submit</button>
        </form>

    </div>
</div>

</body>
</html>