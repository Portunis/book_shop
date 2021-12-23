<?php

require_once __DIR__ . "/database/PDO.php"; //Инициализация PDO
require_once __DIR__ . "/function/token.php";

if(isset($_POST["logout_submit"])){
    setcookie("token", NULL);
    unset($_COOKIE);
    header("Location: /login.php");
}

if (isset($_COOKIE["token"])){ //Проверяем что токен есть в cookie
    $user = getToken($dbh, $_COOKIE["token"]);
    if (!$user){
        header("Location: /login.php");
    }
}else{

}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/register/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php include "admins/navbar.php"; ?>
<div class="container">
    <?php if ($user["role"] == 2) {
        include 'crud/index.php';
    } ?>


</div>


</body>
</html>