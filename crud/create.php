<?php

require __DIR__ .  '/../database/PDO.php';
require __DIR__ .  '/../function/crud/create.php';

//Создание
if (isset($_POST['add'])) {

    $name = $_POST["name"];
    $description = $_POST["description"];
    $author = $_POST["author"];
    $image = $_POST["image"];


    $errors = validateCreate($_POST);


    if (empty($errors)) {
        createNotation($dbh,$name, $description, $author, $image);

    }


}

//Чтение

$sql = $dbh->prepare("SELECT * FROM book");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//
//view


$sql = $dbh->prepare("SELECT * FROM book WHERE id = ?");
$sql->execute(array($_GET['id']));
$resultOne = $sql->fetch(PDO::FETCH_LAZY);




//
//update
//delete
//if(isset($_POST['delete'])){
//    $sql = $dbh->prepare("DELETE FROM book WHERE id = ?");
//    $sql->execute([$get_id]);
//}