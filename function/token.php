<?php

function generateToken(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[rand(0, $max)];
    }
    return implode('', $pieces);
}

function updateUserToken(object  $dbh, int $userId, string $token): void{

    $sql = "UPDATE `users` SET `token` = :token WHERE `id` = :userId";
    $params = ["token" => $token, "userId" => $userId];
    $dbh->prepare($sql)->execute($params);
}

function getToken(object $dbh, string $token){

    $sql = "SELECT * FROM `users` WHERE `token` = :token";

    $params = ["token" => $token];

    $fetchUser = $dbh->prepare($sql);
    $fetchUser->execute($params);
    return $fetchUser->fetch(PDO::FETCH_ASSOC);
}