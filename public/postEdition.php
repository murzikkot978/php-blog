<?php
require_once "conditions.php";
login();
require "functions/flashMessage.php";
require "functions/getPost.php";
require "functions/editPost.php";
$user = checkLogin();
$user_id = $post['user_id'];
$admin = $_SESSION['admin'];
connection($user);
verificationID($user_id, $admin);
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
        <p class="text-6xl
         w-3xs flex justify-center">Edit post</p><br>

        <?php require "functions/displayMessage.php" ?>

        <form class="custom-form" method="post" enctype="multipart/form-data">
            <label for="title" class="text-2xl">Title</label>
            <input name="title" type="text" class="border-2 w-2xl h-10" value="<?= $post['title'] ?>"><br>
            <label for="content" class="text-2xl">Content</label>
            <textarea name="content" type="text"
                      class="border-2 w-2xl h-28"><?= $post['content'] ?></textarea><br>
            <label for="image" class="text-2xl">Image</label>
            <input name="image" type="file" class="border-2"><br>
            <button type="submit" class="border-2 w-28">Submit</button>
            <input type="hidden" name="postID" value="<?= $post['id'] ?>">
            <input type="hidden" name="oldImage" value="<?= $post['image'] ?>">
        </form>

    </div>
</div>

</body>
</html>