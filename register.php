<?php

require_once __DIR__ . "/database/PDO.php"; //Инициализация PDO
require_once __DIR__ . "/function/register.php"; //Инициализация register
require_once __DIR__ . "/function/token.php";

if (isset($_COOKIE["token"])){ //Проверяем что токен есть в cookie
    $user = getToken($dbh, $_COOKIE["token"]);
    if ($user){
        header("Location: /userProfile.php");
    }
}

if (isset($_POST['register_submit'])) {

    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["password_confirm"];

    $errors = validateRegister($_POST);


    if (empty($errors)) {
       createUser($dbh,$email, $name, $password);
       header("Location: /login.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/register/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <main>
        <div class="register-form-container">
            <form action="/register.php" method="post">
                <h1 class="form-title">
                    Регистрация
                </h1>
                <div class="form-fields">
                    <div class="form-field">
                        <input
                                value="<?= $name  ?? "" ?>"
                                class="<?= isset($errors["name"]) ? "invalid" : "" ?>"
                                name="name"
                                type="text"
                                placeholder="Имя"
                        >
                    </div>
                    <div class="form-field">
                        <input
                                class="<?= isset($errors["email"]) ? "invalid" : "" ?>"
                                name="email"
                                type="text"
                                value="<?= $email ?? "" ?>"
                                placeholder="Почта">
                    </div>
                    <div class="form-field">
                        <input
                                class="<?= isset($errors["password"]) ? "invalid" : "" ?>"
                                name="password"
                                type="password"
                                placeholder="Пароль">
                    </div>
                    <div class="form-field">
                        <input name="password_confirm" type="password" placeholder="Повтор пароля">
                    </div>
                </div>
                <div class="form-buttons">
                    <button type="submit" name="register_submit" class="button">Регистрация</button>
                </div>
            </form>
        </div>
    </main>

</div>


</body>
</html>