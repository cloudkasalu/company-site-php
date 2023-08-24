<div class="content-section">
    <div class="content-main">
        <div class="content-title">
            <h4>Users</h4>
            <div class="content-actions">
                <a href="<?php echo ROOT_DASHBOARD?>/users/register" class="btn btn-primary">Add User</a>
            </div>
        </div>
        <div class="content-wrapper">
            <table class="content-table blogs-table">
                <tr class="table-head table-grid">
                    <th>Full Names</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                <?php foreach($users as $user):?>
                <tr class="table-grid">
                    <td><?= ucfirst($user['firstname']) . ' '. ucfirst($user['lastname'])?></td>
                    <td><?=$user['email']?></td>
                    <td><?=$user['gender']?></td>
                    <td class="table-action">
                        <a href="<?= ROOT_DASHBOARD . '/users/edit/'. $user['user_id'] ?>" class="btn btn-small btn-primary">Edit</a>
                        <a href="<?= ROOT_DASHBOARD . '/users/delete/'. $user['user_id'] ?>" class="btn btn-small btn-secondary">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
    </div>