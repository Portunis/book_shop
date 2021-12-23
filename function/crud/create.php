<?php

function validateCreate(array $data): array
{

    $errors = [];

    if (empty($data["name"])){
        $errors["name"] = true;
    }
    if (empty($data["description"])){
        $errors["description"] = true;
    }
    if (empty($data["author"])){
        $errors["author"] = true;
    }

    return $errors;
}
//Создание
function createNotation(object $dbh, string $name, string $description, string $author, string $image): void
{
    $sql = "INSERT INTO `book` (`name`, `description`, `author`, `image`) VALUES (:name, :description, :author, :image)"; //SQL запрос

    $params = [
        "name" => $name, //
        "description" => $description, //Имя
        "author" => $author,//
         "image" => $image//

    ];


    $dbh->prepare($sql)->execute($params); //Добавление в БД

}

function updateNotation(object $dbh, string $name, string $description, string $author){

    $sql = "SELECT * FROM `book` WHERE `id` = :id";

    $params = [
        "name" => $name, //
        "description" => $description, //Имя
        "author" => $author//

    ];

    $fetchNotation = $dbh->prepare($sql);
    $fetchNotation->execute($params);
    return $fetchNotation->fetch(PDO::FETCH_ASSOC);
}


