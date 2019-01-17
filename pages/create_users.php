<h2>Neuen Benutzer hinzufügen</h2>
<form action="?p=create_users&action=store" method="post" id="userAdd">

    <?php foreach (\app\models\User::$inputFields as $key => $field) : ?>
    <div class="form-group">
        <label for="<?= $key ?>"><?= $field['label'] ?></label>
        <input class="form-control" type="<?= $field['type'] ?>" name="<?= $key ?>" id="<?= $key ?>" value="<?= $_POST[$key] ?? null ?>">
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
                <option value="<?= $role->getId(); ?>"><?= ucfirst($role->getValue()); ?></option>
            <?php endforeach; ?>

        </select>
        <p class="alert-danger"><?= \app\helpers\Status::getStatus('role_id') ?></p>

    </div>


    <button type="submit" class="btn btn-success">Speichern</button>
</form>
