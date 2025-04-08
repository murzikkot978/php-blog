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

<div class="flex flex-col gap-[20px] justify-center items-center w-full h-full ">
    <div class="flex flex-col w-[100%] h-[100%] justify-center items-center">
        <p class="text-[60px] w-[300px] flex justify-center">Edit post</p><br>
        <form class="custom-form">
            <label for="title" class="text-[20px]">Title</label>
            <input name="title" type="text" class="border-[2px] w-[500px] h-[30px]"><br>
            <label for="contetnt" class="text-[20px]">Content</label>
            <textarea name="contetn" type="text" class="border-[2px] w-[500px] h-[100px]"></textarea><br>
            <label for="image" class="text-[20px]">Image</label>
            <input name="image" type="file" class="border-[2px]"><br>
            <button type="submit" class="border-[2px] w-[100px]">Submit</button>
        </form>

    </div>
</div>

</body>
</html>