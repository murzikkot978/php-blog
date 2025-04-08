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

<div class="pages flex-col gap-[20px]">
    <p class="text-[60px] w-[300px] flex justify-center">PHP Blog</p>
    <div>
        <p class="text-[30px]">On this page you can see all blogs what we have on our site</p>
    </div>
    <div class="flex justify-center">
        <p class="text-[60px] w-[200px] flex justify-center">Posts</p>
    </div>
    <div class="grid grid-cols-2 gap-[10px]">
        <div class="w-full h-auto ">
            <div class="w-full flex flex-col items-center colorGrid">
                <p class="text-center  text-[30px]">
                    Title
                </p>
            </div>

            <div class="relative">
                <a href="postDetail.php">
                    <img src="images/image1.jpg" class="flex w-full h-auto imageGrid object-cover">
                </a>
                <a href="postEdition.php" class="absolute logoEdit"><img src="logos/logoEdit.png" alt="Logo edit"></a>
            </div>
        </div>

        <div class="w-full h-auto ">
            <div class="w-full flex flex-col items-center colorGrid">
                <p class="text-center text-[30px]">
                    Title
                </p>
            </div>

            <div class="relative">
                <a href="postDetail.php">
                    <img src="images/image2.jpg" class="flex w-full h-auto imageGrid object-cover">
                </a>
                <a href="postEdition.php" class="absolute logoEdit"><img src="logos/logoEdit.png" alt="Logo edit"></a>
            </div>
        </div>

        <div class="w-full h-auto ">
            <div class="w-full flex flex-col items-center colorGrid">
                <p class="text-center text-[30px]">
                    Title
                </p>
            </div>

            <div class="relative">
                <a href="postDetail.php" class="postlink">
                    <img src="images/image2.jpg" class="flex w-full h-auto imageGrid object-cover">
                </a>
                <a href="postEdition.php" class="absolute logoEdit"><img src="logos/logoEdit.png" alt="Logo edit"></a>
            </div>
        </div>

        <div class="w-full h-auto ">
            <div class="w-full flex flex-col items-center colorGrid">
                <p class="text-center  text-[30px]">
                    Title
                </p>
            </div>

            <div class="relative">
                <a href="postDetail.php" class="postlink">
                    <img src="images/image1.jpg" class="flex w-full h-auto imageGrid object-cover">
                </a>
                <a href="postEdition.php" class="absolute logoEdit"><img src="logos/logoEdit.png" alt="Logo edit"></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>