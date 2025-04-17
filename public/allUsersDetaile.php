<?php
require "conditions.php";
login();
require "functions/flashMessage.php";
require "functions/databaseconection.php";
require "functions/getAllUsers.php";
$user = checkLogin();
$user_id = $post['user_id'];
$admin = $_SESSION['admin'];
connection($user);
verificationID($user_id, $admin);
require "functions/changeRole.php";
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
    <p class="text-[60px] w-full flex justify-center">Users profiles</p><br>
    <?php require "functions/displayMessage.php" ?>
    <?php foreach ($allUsers as $user): ?>
        <div class="custom-form">
            <div class="flex w-full">
                <div class="flex w-[50%] justify-center"><img src="userPhoto/<?= $user['photo'] ?>"
                                                              class="h-[200px] w-[200px]  rounded-full"></div>
                <div class="flex flex-col justify-left w-[50%]">
                    <p class="text-[35px]">Name : <?= $user['name'] ?></p>
                    <p class="text-[35px]">Email : <?= $user['email'] ?></p>
                    <?php if ($user['admin'] === 1): ?>
                        <p class="text-[35px]">Role : admin </p>
                    <?php else: ?>
                        <p class="text-[35px]">Role : user </p>
                    <?php endif; ?>
                    <form method="post">
                        <button class="text-[20px] border-[2px] w-[150px]">Change role</button>
                        <input type="hidden" name="userID" value="<?= $user['id'] ?>">
                        <input type="hidden" name="userRole" value="<?= $user['admin'] ?>">
                    </form>

                </div>

            </div>

        </div>
    <?php endforeach; ?>
</div>

</body>
</html>