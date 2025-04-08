<?php

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
    <div class="flex flex-col justify-center">
        <p class="text-[20px]">Date creation</p>
        <p class="text-[20px]">Name creator</p>
    </div>
    <div class="flex flex-col gap-[20px] items-center">
        <p class="flex text-[30px]">Title</p>
        <img src="images/image1.jpg" class="flex w-full rounded-[20px]">
        <p class="flex text-[20px]">Content for this post</p>
    </div>
</div>

</body>
</html>