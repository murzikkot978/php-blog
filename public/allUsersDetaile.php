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
<div class="pages flex-col gap-5">
    <p class="text-6xl w-full flex justify-center">Users profiles</p><br>
    <?php require "functions/displayMessage.php" ?>
    <?php foreach ($allUsers as $users): ?>
        <div class="custom-form">
            <div class="flex w-full">
                <div class="flex w-1/2 justify-center"><img src="userPhoto/<?= $users['photo'] ?>"
                                                            class="h-50 w-50  rounded-full"></div>
                <div class="flex flex-col justify-center items-left w-1/2">
                    <p class="text-4xl">Name : <?= $users['name'] ?></p>
                    <p class="text-4xl">Email : <?= $users['email'] ?></p>
                    <?php if ($users['admin'] === 1): ?>
                        <p class="text-4xl">Role : admin </p>
                    <?php else: ?>
                        <p class="text-4xl">Role : user </p>
                    <?php endif; ?>
                    <?php if ($user !== $users['id']): ?>
                        <form method="post">
                            <button class="text-xl border-2 w-40">Change role</button>
                            <input type="hidden" name="userID" value="<?= $users['id'] ?>">
                            <input type="hidden" name="userRole" value="<?= $users['admin'] ?>">
                        </form>
                    <?php endif ?>

                </div>

            </div>

        </div>
    <?php endforeach; ?>
</div>

</body>
</html>