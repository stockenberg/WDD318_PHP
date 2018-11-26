<?php if(!empty($users)) : ?>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?= $user ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>