<?php

require_once __DIR__ . "/database/PDO.php"; //Инициализация PDO
require_once __DIR__ . "/function/auth.php";
require_once __DIR__ . "/function/token.php";


if (isset($_COOKIE["token"])){ //Проверяем что токен есть в cookie
    $user = getToken($dbh, $_COOKIE["token"]);
    if ($user){
        header("Location: /userProfile.php");
    }
}

if (isset($_POST["login_submit"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = authUser($dbh, $email);

    $errorAuth = false;

    if(!$user || !password_verify($password, $user['password'])){
        $errorAuth = true;
    }else{
        $token = generateToken(); //геренерация token
        updateUserToken($dbh, $user["id"], $token); //Обновление token
        setcookie("token", $token); //Сохранение token  в cookie
        header("Location: /userProfile.php");
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
            <h1 class="form-title">
                Авторизация
            </h1>
          <?php
          if (isset($errorAuth) && $errorAuth = true){
              ?>
            <div class="alert alert-danger" role="alert">
                Неверный логин или пароль
            </div>
            <?php
          }
          ?>
            <form action="/login.php" method="post">

                <div class="form-fields">
                    <div class="form-field">
                        <input
                            name="email"
                            type="text"
                            placeholder="Почта">
                    </div>
                    <div class="form-field">
                        <input

                            name="password"
                            type="password"
                            placeholder="Пароль">
                    </div>

                </div>
                <div class="form-buttons">
                    <button type="submit" name="login_submit" class="button">Войти</button>
                </div>
            </form>
        </div>
    </main>

</div>


</body>
</html>
