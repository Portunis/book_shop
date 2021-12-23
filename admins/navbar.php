<?php

require_once __DIR__ . "/../database/PDO.php"; //Инициализация PDO
require_once __DIR__ . "/../function/token.php";

if(isset($_POST["logout_submit"])){
    setcookie("token", NULL);
    unset($_COOKIE);
    header("Location: /login.php");
}

if (isset($_COOKIE["token"])){ //Проверяем что токен есть в cookie
    $user = getToken($dbh, $_COOKIE["token"]);
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">BOOK-SHOP</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <?php if ($user) { ?>
                    <li class="nav-item">
                        <p >Привет, <?= $user["name"] ?></p>
                    </li>
                <?php } ?>


            </ul>

            <form method="post" action="userProfile.php" class="d-flex">

                <?php if ($user) { ?>
                    <a class="btn btn-outline-success me-2" href="/userProfile.php" >Личный кабинет</a>
                <button class="btn btn-outline-success" name="logout_submit" type="submit">Выйти</button>
                <?php }else { ?>
                <button class="btn btn-outline-success" name="logout_submit" type="submit">Войти</button>
                <?php } ?>
            </form>
        </div>
    </div>
</nav>
