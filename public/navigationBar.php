<?php
require_once "conditions.php";
login();
$user = checkLogin();
$admin = $_SESSION['admin'];
logout();
?>

<header class="header">
    <nav class="navbar">
        <div>
            <a href="index.php" class="logoHome"><img src="logos/logoHome.png"></a>
        </div>
        <div class="flex gap-[50px]">
            <?php if ($user): ?>
                <div class="flex gap-[20px]">
                    <a href="postCreation.php" class="flex text-[20px]">postCreation</a>
                </div>
                <?php if ($admin === 1): ?>
                    <div>
                        <a href="allUsersDetaile.php" class="text-[20px]">All Users</a>
                    </div>
                <?php endif; ?>
                <div>
                    <a href="userProfile.php" class="flex text-[20px]">My Profile</a>
                </div>
                <form method="post">
                    <button type="submit" name="logout" value="logout" class="flex text-[20px]">log out</button>
                </form>
            <?php else: ?>
                <div>
                    <a href="login.php" class="flex text-[20px]">log in</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>