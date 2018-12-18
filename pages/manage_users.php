<form action="?p=manage_users&action=save" method="post">
    <div>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" value="<?= $_POST['firstname'] ?? null ?>">
        <p class="error"><?= \app\helpers\Status::getStatus('firstname') ?></p>
    </div>

    <div>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" value="<?= $_POST['lastname'] ?? null ?>">
        <p class="error"><?= \app\helpers\Status::getStatus('lastname') ?></p>
    </div>

    <div>
        <label for="email">email</label>
        <input type="text" name="email" value="<?= $_POST['email'] ?? null ?>">
        <p class="error"><?= \app\helpers\Status::getStatus('email') ?></p>
    </div>

    <button type="submit">submit</button>
</form>