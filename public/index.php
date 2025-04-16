<?php
$errors = [];
require_once "conditions.php";
login();
require "functions/flashMessage.php";
$user = checkLogin();
require "functions/getBlogs.php";
if (empty($posts)) {
    add_flash_message("There are no blogs yet");
}
require "functions/deletePost.php";
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

<div class="pages flex-col gap-[20px]">
    <p class="text-[60px] w-[300px]">PHP Blog</p>
    <div>
        <p class="text-[30px]">On this page you can see all blogs what we have on our site</p>
    </div>
    <div class="flex flex-col items-center">
        <p class="text-[60px] w-[200px] flex justify-center">Posts</p>

        <?php require "functions/displayMessage.php" ?>

    </div>
    <div class="grid grid-cols-2 gap-[10px]">
        <?php foreach ($posts as $post): ?>
            <div class="w-full h-auto ">
                <div class="w-full flex flex-col items-center colorGrid">
                    <p class="text-center  text-[30px]">
                        <?php echo $post['title'] ?>
                    </p>
                </div>

                <div class="relative">
                    <a href="postDetail.php?id=<?= $post['id'] ?>">
                        <img src="images/<?php echo $post["image"] ?>"
                             class="flex w-full h-auto imageGrid object-cover" alt="Post image">
                    </a>
                    <?php if ($user && $user === $post['user_id']): ?>
                        <a href="postEdition.php?id=<?= $post["id"] ?>"
                           class="absolute flex w-[30px] h-auto top-[-37px] left-[10px]"><img src="logos/logoEdit.png"
                                                                                              alt="Logo edit">
                        </a>
                        <form method="post">
                            <input type="hidden" value="<?= $post['id'] ?>" name="deletePost">
                            <input type="hidden" value="<?= $post['image'] ?>" name="deleteImage">
                            <button type="submit" name="delete"
                                    class="absolute flex w-[30px] h-auto top-[-37px] left-[60px]"><img
                                        src="logos/logoCorbeille.png"
                                        alt="Logo delete"></button>
                        </form>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

</body>
</html>