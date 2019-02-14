<div class="row">
    <form action="?p=filemanager&action=upload" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" name="upload">
        </div>
        <button class="btn btn-success" type="submit">Speichern</button>
    </form>
</div>

<div class="row">
    <ul class="list-group">
        <?php
        foreach (\app\controllers\FileController::allFiles() as $index => $file):
        ?>
            <li class="list-group-item"><a target="_blank" href="assets/uploads/<?= $file ?>"><?= $file ?></a> <a href="">X</a></li>

        <?php endforeach; ?>
    </ul>
</div>