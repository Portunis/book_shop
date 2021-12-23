<?php
require __DIR__ .  '/../crud/create.php'


?>

<button type="button"  class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
   Добавить товар
</button>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Название</th>
        <th scope="col">Описание</th>
        <th scope="col">Автор</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $res){ ?>
    <tr>
        <th scope="row"><?= $res->id; ?></th>
        <td><?= $res->name; ?></td>
        <td><?= $res->description; ?></td>
        <td><?= $res->author; ?></td>
        <td>
            <form method="post">
                <button name="delete" type="submit" class="btn btn-danger btn-sm">Удалить</button></td>
            </form>

    </tr>

    <?php } ?>
    </tbody>
</table>


<div class="modal-dialog modal-dialog-centered">

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Добавление товара</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group p-2">
                            <input type="text" class="form-control" name="name" value="" placeholder="Название"/>
                        </div>
                        <div class="form-group p-2">
                            <input type="text" class="form-control" name="description" value="" placeholder="Описание"/>
                        </div>
                        <div class="form-group p-2">
                            <input type="text" class="form-control" name="author" value="" placeholder="Автор"/>
                        </div>
                        <div class="form-group p-2">
                            <input type="text" class="form-control" name="image" value="" placeholder="url картинки"/>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" name="add" class="btn btn-primary" >Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>