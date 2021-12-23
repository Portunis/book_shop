<?php require __DIR__ .  '/crud/create.php' ?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php include "admins/navbar.php"; ?>

<div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom">Книги</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php foreach ($result as $res){ ?>
        <div class="col">

            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('/assets/images/84a79f0a293d4a86b7099fc9e4a81f2a.jpg');
">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?= $res->name; ?></h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <a href="product.php?id=<?= $res->id ?>">Подробнее</a>

                    </ul>
                </div>
            </div>

        </div>

        <?php } ?>
    </div>

</div>

</body>
</html>