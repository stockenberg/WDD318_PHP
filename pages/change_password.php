
<form method="post" action="?p=change_password&action=replace_password&user_id=<?= $app->data[0]->getUserId(); ?>&hash=<?= $app->data[0]->getResetHash() ?>" class="col">
    <div class="form-group">
        <label for="pass">Neues Passwort</label>
        <input type="password" name="pw" class="form-control">
    </div>

    <div class="form-group">
        <label for="retype">Password Wiederholen</label>
        <input type="password" name="pw_retype" class="form-control">
    </div>
    <p class="error"><?= \app\helpers\Status::getStatus('pw') ?></p>
    <button type="submit">Speichern / Updaten</button>
</form>

<div class="col">
    <h2>Validierungsregeln</h2>
    <ul>
        <li>Buchstaben von A-Za-z </li>
        <li>mind. eine Zahl</li>
        <li>mind. 8 Zeichen</li>
        <li>mind. ein Sonderzeichen</li>
    </ul>
</div>

<h2>LINK: http://wdd318.test/?p=change_password&action=change_password&hash=EUER_HASH</h2>