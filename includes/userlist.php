<?php if(!empty($users)) : ?>
    <ul class="users">
        <?php foreach ($users as $user) : ?>
            <li><?= $user ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>