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

<div class="flex flex-col gap-[20px] justify-center items-center w-full h-full ">
    <div class="flex flex-col w-[100%] h-[100%] justify-center items-center">
        <p class="text-[60px] w-[300px] flex justify-center">Log in</p><br>

        <?php require "functions/loginUser.php" ?>
        <?php require "functions/displayMessage.php" ?>

        <form method="post" class="custom-form">
            <label for="email" class="text-[20px]">Write email</label>
            <input name="email" type="email" class="border-[2px]"><br>

            <label for="password" class="text-[20px]">Write pasword</label>
            <input name="password" type="password" class="border-[2px]"><br>

            <button type="submit" class="border-[2px] w-[100px]">Submit</button>
            <div class="flex gap-[15px]">
                <div class="flex gap-[7px]">
                    <p>No account ? </p>
                    <a href="register.php" class="text-[red]">Create one</a>
                </div>
                <div class="flex gap-[5px]">
                    <p>Back to - </p>
                    <a href="index.php" class="text-[red]">Home page</a>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>