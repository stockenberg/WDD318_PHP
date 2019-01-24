<h2>Nutzer Editieren ID: <?= $app->data->getId(); ?></h2>

<form action="?p=edit_users&action=update&id=<?= $app->data->getId(); ?>" method="post" id="userAdd">

    <?php foreach (\app\models\User::$editInputFields as $key => $field) :
        $func = 'get'.ucfirst($key);
        ?>

    <div class="form-group">
        <label for="<?= $key ?>"><?= $field['label'] ?></label>
        <input class="form-control" type="<?= $field['type'] ?>" name="<?= $key ?>" id="<?= $key ?>"
               value="<?= $_POST[$key] ?? $app->data->$func(); ?>">
        <p class="alert-danger"><?= \app\helpers\Status::getStatus($key) ?></p>
    </div>

    <?php endforeach; ?>

    <div class="form-group">
        <label for="role_id">Rechtestufe wählen</label>
        <select name="role_id" class="form-control" id="role_id">
            <option selected>Bitte wählen</option>
            <?php

            /** @var \app\dtos\Roles $role */
            foreach (\app\models\Role::getAll() as $key => $role) : ?>
                <option <?= ($app->data->getRoleId() === $role->getId()) ? 'selected' : null ?> value="<?= $role->getId(); ?>"><?= ucfirst($role->getValue()); ?></option>
            <?php endforeach; ?>

        </select>
        <p class="alert-danger"><?= \app\helpers\Status::getStatus('role_id') ?></p>

    </div>


    <button type="submit" class="btn btn-success">Speichern</button>
</form>
