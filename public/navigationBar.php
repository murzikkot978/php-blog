<?php
require_once "conditions.php";
login();
$user = checkLogin();
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
                <div>
                    <button type="submit" class="flex text-[20px]">log out</button>
                </div>
            <?php else: ?>
                <div>
                    <a href="login.php" class="flex text-[20px]">log in</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>