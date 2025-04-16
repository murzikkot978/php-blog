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

<div class="flex flex-col gap-[20px] justify-center items-center w-full h-full ">
    <div class="flex flex-col w-[100%] h-[100%] justify-center items-center">
        <p class="text-[60px] w-[300px] flex justify-center">Edit post</p><br>

        <?php require "functions/displayMessage.php" ?>

        <form class="custom-form" method="post" enctype="multipart/form-data">
            <label for="title" class="text-[20px]">Title</label>
            <input name="title" type="text" class="border-[2px] w-[500px] h-[30px]" value="<?= $post['title'] ?>"><br>
            <label for="content" class="text-[20px]">Content</label>
            <textarea name="content" type="text"
                      class="border-[2px] w-[500px] h-[100px]"><?= $post['content'] ?></textarea><br>
            <label for="image" class="text-[20px]">Image</label>
            <input name="image" type="file" class="border-[2px]"><br>
            <button type="submit" class="border-[2px] w-[100px]">Submit</button>
            <input type="hidden" name="postID" value="<?= $post['id'] ?>">
            <input type="hidden" name="oldImage" value="<?= $post['image'] ?>">
        </form>

    </div>
</div>

</body>
</html>