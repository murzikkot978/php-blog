<?php
require "conditions.php";
login();
require "functions/flashMessage.php";
$user_id = checkLogin();
require "functions/getUserPosts.php";
require "functions/deletePost.php";
$id = checkLogin();
require "functions/databaseconection.php";
require "functions/getUser.php";
$numberPosts = count($posts);
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
    <?php require "functions/displayMessage.php" ?>
    <p class="text-6xl w-full flex justify-center">User profile</p><br>
    <form method="post" class="flex w-full justify-center" enctype="multipart/form-data">
        <a href="editUserProfile.php"
           class="flex border-2 bg-[darkslategray] text-[white] text-2xl w-48 justify-center">Edit my
            profile</a>
    </form>
    <div class="custom-form">
        <div class="flex w-full justify-around">
            <div class="flex w-auto justify-center"><img src="userPhoto/<?= $userInformation['photo'] ?>"
                                                         class="h-64 w-64  rounded-full"></div>
            <div class="flex flex-col justify-center w-auto">
                <p class="text-4xl">Name : <?= $userInformation['name'] ?></p>
                <p class="text-4xl">Email : <?= $userInformation['email'] ?></p>
                <p class="text-4xl">Posts created : <?= $numberPosts ?></p>
            </div>

        </div>

    </div>

    <div class="grid grid-cols-2 gap-2.5">
        <?php foreach ($posts as $post): ?>
            <div class="w-full h-auto ">
                <div class="w-full flex flex-col items-center colorGrid">
                    <p class="text-center  text-3xl">
                        <?= $post['title'] ?>
                    </p>
                </div>

                <div class="relative">
                    <a href="postDetail.php?id=<?= $post['id'] ?>">
                        <img src="images/<?= $post["image"] ?>"
                             class="flex w-full h-auto imageGrid object-cover" alt="Post image">
                    </a>
                    <?php if ($user && ($user === $post['user_id'] || $_SESSION['admin'] === 1)): ?>
                        <a href="postEdition.php?id=<?= $post["id"] ?>"
                           class="absolute flex w-6 h-auto -top-[30px] left-[10px]"><img src="logos/logoEdit.png"
                                                                                              alt="Logo edit">
                        </a>
                        <form method="post">
                            <input type="hidden" value="<?= $post['id'] ?>" name="deletePost">
                            <input type="hidden" value="<?= $post['image'] ?>" name="deleteImage">
                            <button type="submit" name="delete"
                                    class="absolute flex w-6 h-auto -top-[30px] left-[50px]"><img
                                        src="logos/logoCorbeille.png"
                                        alt="Logo delete"></button>
                        </form>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

</body>
</html>