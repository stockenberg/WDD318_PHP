
<form action="?p=contact&action=sayHello" method="post">
    <div>
        <label for="firstname">firstname</label>
        <input type="text" name="firstname" class="firstname">
        <p class="error"><?= \app\helpers\Status::getStatus('firstname'); ?>
        </p>
    </div>

    <div>
        <label for="lastname">lastname</label>
        <input type="text" name="lastname" class="lastname">
        <p class="error"><?= \app\helpers\Status::getStatus('lastname'); ?>
        </p>
    </div>

    <button type="submit">Absenden</button>
</form>