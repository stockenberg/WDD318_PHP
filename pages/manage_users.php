
<div class="col-md-12">
    <div class="bgc-white bd bdrs-3 p-20 mB-20"><h4 class="c-grey-900 mB-20">User Management</h4>
        <a href="" class="btn btn-success"><i class="fas fa-plus"></i> Add new User</a>
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Role ID</th>
                <th scope="col">Created At</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
            /**
             * @var \app\dtos\Users $user
             */
            foreach ($app->data as $user) : ?>
            <tr>
                <th scope="row"><?= $user->getId() ?></th>
                <td><?= $user->getUsername() ?></td>
                <td><?= $user->getFirstname() ?></td>
                <td><?= $user->getLastname() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getRolesId() ?></td>
                <td><?= $user->getCreatedAt() ?></td>
                <td>
                    <a href="?p=manage_user&action=edit&id=<?= $user->getId() ?>" type="button" class="btn btn-primary"><i class="far fa-edit"></i></a>
                    <a href="?p=manage_user&action=delete&id=<?= $user->getId() ?>" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
