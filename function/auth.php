<?php

function authUser(object $dbh, string $email)
{
    $sql = "SELECT * FROM `users` WHERE `email` = :email"; //Получаем пользователя по email

    $params = ["email" => $email];

    $fetchUser = $dbh->prepare($sql);
    $fetchUser->execute($params);

    return $fetchUser->fetch(PDO::FETCH_ASSOC);
}