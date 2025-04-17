<?php
session_start();
require "functions/flashMessage.php";
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
        <p class="text-6xl w-64 flex justify-center">Sing up</p><br>

        <?php require "functions/registerUser.php"; ?>
        <?php require "functions/displayMessage.php"; ?>

        <form method="post" class="custom-form">
            <label for="name" class="text-2xl">Write your name</label>
            <input name="name" type="text" class="border-2"><br>

            <label for="email" class="text-2xl">Write email</label>
            <input name="email" type="email" class="border-2"><br>

            <label for="password" class="text-[20px]">Write password</label>
            <input name="password" type="password" class="border-2"><br>

            <button type="submit" class="border-2 w-28">Submit</button>
            <div class="flex gap-3.5">
                <div class="flex gap-1.5">
                    <p>You have account ? </p>
                    <a href="login.php" class="text-red-500">Log in</a>
                </div>
                <div class="flex gap-[5px]">
                    <p>Back to - </p>
                    <a href="index.php" class="text-red-500">Home page</a>
                </div>
            </div>
        </form>

    </div>
</div>

</body>
</html>