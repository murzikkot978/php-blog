<?php
require_once "conditions.php";
login();
$user = checkLogin();
$admin = $_SESSION['admin'];
logout();
?>

<header class="header mb-6">
    <nav class="navbar ">
        <div>
            <a href="index.php" class="logoHome"><img src="logos/logoHome.png"></a>
        </div>
        <div class="flex gap-[50px]">
            <?php if ($user): ?>
                <div class="flex gap-5">
                    <a href="postCreation.php" class="flex text-2xl">Add New Post</a>
                </div>
                <?php if ($admin === 1): ?>
                    <div>
                        <a href="allUsersDetaile.php" class="text-2xl">All Users</a>
                    </div>
                <?php endif; ?>
                <div>
                    <a href="userProfile.php" class="flex text-2xl">My Profile</a>
                </div>
                <form method="post">
                    <button type="submit" name="logout" value="logout" class="flex text-2xl">log out</button>
                </form>
            <?php else: ?>
                <div>
                    <a href="login.php" class="flex text-2xl">log in</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>