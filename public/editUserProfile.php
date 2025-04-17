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

<div class="flex flex-col gap-5 justify-center items-center w-full h-full ">
    <div class="flex flex-col w-full h-full justify-center items-center">
        <p class="text-6xl w-2xl flex justify-center">Edit user information</p><br>

        <?php require "functions/displayMessage.php" ?>

        <form method="post" class="custom-form" enctype="multipart/form-data">
            <label for="name" class="text-xl">Write your new name</label>
            <input name="name" type="text" class="border-2" value="<?= $userInformation['name'] ?>"><br>
            <label for="email" class="text-2">Write your new email</label>
            <input name="email" type="email" class="border-2" value="<?= $userInformation['email'] ?>"><br>
            <label for="image" class="text-2">Chose new photo</label>
            <input name="photo" type="file" class="border-[2px]"><br>
            <button type="submit" class="border-2 w-28">Submit</button>
            <input type="hidden" name="userID" value="<?= $userInformation['id'] ?>">
            <input type="hidden" name="oldPhoto" value="<?= $userInformation['photo'] ?>">
        </form>

    </div>
</div>

</body>
</html>