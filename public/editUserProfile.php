<?php
require_once "conditions.php";
login();
require "functions/flashMessage.php";
$id = checkLogin();
$user = checkLogin();
require "functions/databaseconection.php";
require "functions/getUser.php";
require "functions/editUser.php";
connection($user);
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
        <p class="text-[60px] w-[600px] flex justify-center">Edit user information</p><br>

        <?php require "functions/displayMessage.php" ?>

        <form method="post" class="custom-form" enctype="multipart/form-data">
            <label for="name" class="text-[20px]">Write your new name</label>
            <input name="name" type="text" class="border-[2px]" value="<?= $userInformation['name'] ?>"><br>
            <label for="email" class="text-[20px]">Write your new email</label>
            <input name="email" type="email" class="border-[2px]" value="<?= $userInformation['email'] ?>"><br>
            <label for="image" class="text-[20px]">Chose new photo</label>
            <input name="photo" type="file" class="border-[2px]"><br>
            <button type="submit" class="border-[2px] w-[100px]">Submit</button>
            <input type="hidden" name="userID" value="<?= $userInformation['id'] ?>">
            <input type="hidden" name="oldPhoto" value="<?= $userInformation['photo'] ?>">
        </form>

    </div>
</div>

</body>
</html>