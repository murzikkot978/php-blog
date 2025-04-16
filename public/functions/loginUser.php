<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    require_once "databaseconection.php";

    try {
        $cheking = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $cheking->execute(["email" => $email]);
        $user = $cheking->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["userID"] = $user["id"];
            header("Location: index.php");
            exit();
        } else {
            add_flash_message("Try again");
        }

    } catch (Exception $e) {
        add_flash_message("An error occurred, please try again later");
    }
}
?>

<div>
    <?php if (count($errors) > 0): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li class="text-[red] text-[20px]"><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
</div>
