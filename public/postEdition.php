<?php
require_once "conditions.php";
login();
$errors = [];
$user = checkLogin();
require "functions/getPost.php";
$user_id = $post['user_id'];
connection($user);
verificationID($user_id);
require "functions/editPost.php";
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
        <?php if (count($errors) > 0): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li class="text-[red] text-[20px]"><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
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