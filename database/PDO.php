<?php



try {
    $dbh = new PDO('mysql:host=localhost;dbname=book_shop', 'root', 'root');
}catch (\Exception $exception){
    echo "Ошибка подключения БД - ", $exception->getMessage();
    die();
}