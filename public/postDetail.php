<?php
session_start();
require "functions/flashMessage.php";
require "functions/getPost.php";
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

<div class="pages flex-col gap-[20px] pading300px">

    <?php require "functions/displayMessage.php" ?>

    <div class="flex flex-col justify-center">
        <p class="text-[20px] font-[700]">Create at : <?= $post["create_at"] ?></p>
        <p class="text-[20px] font-[700]">Created by : <?= $post["name"] ?></p>
    </div>
    <div class="flex flex-col gap-[20px] items-center">
        <p class="flex text-[50px] font-[1000]"><?= $post["title"] ?></p>
        <img src="images/<?= $post["image"] ?>" class="flex w-full rounded-[20px]">
        <p class="flex text-[25px]"><?= $post["content"] ?></p>
    </div>
</div>

</body>
</html>