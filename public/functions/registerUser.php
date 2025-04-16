<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    require_once "databaseconection.php";

    try {

        $cheking = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $cheking->execute(["email" => $email]);
        $user = $cheking->fetch();
        if (empty($user)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $stmt->execute(["name" => $name, "email" => $email, "password" => $hashed_password]);
            header("Location: login.php");
            exit();
        } else {
            add_flash_message("Email already exists");
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
