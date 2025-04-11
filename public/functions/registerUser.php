<?php
$errors = [];
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $dsn = 'sqlite:../database.db';
    $user = 'root';
    $pass = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);

        $cheking = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $cheking->execute(["email" => $email]);
        if ($email !== $cheking) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $stmt->execute(["name" => $name, "email" => $email, "password" => $hashed_password]);
            header("Location: login.php");
            exit();
        }

    } catch (Exception $e) {
        array_push($errors, "Email already exists!");
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
