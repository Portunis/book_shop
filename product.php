<?php require __DIR__ .  '/crud/create.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php include "admins/navbar.php"; ?>

<div class="container px-4 py-5" >
    <h2 class="pb-2 border-bottom">Книга <?= $resultOne->name;  ?></h2>


    <figure class="figure">
        <figcaption class="figure-caption mb-2 " style="font-size: 16px">Автор: <?= $resultOne->author ?></figcaption>
        <img src='/assets/images/<?=  $resultOne->image ?>' class="figure-img img-fluid rounded" alt="...">

    </figure>
    <div><h2>Описание сюжета</h2>
        <p><?= $resultOne->description ?></p></div>

</div>

</body>
</html>