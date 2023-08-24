<div class="content-section">
    <div class="content-main">
        <div class="content-title">
            <h4>Groups</h4>
            <div class="content-actions">
                <a href="<?= ROOT_DASHBOARD ?>/groups/create" class="btn btn-primary">Create Group</a>
            </div>
        </div>
        <div class="content-wrapper">
            <?php if(!isset($groups['group_name']) ){ ?>
            <table class="content-table blogs-table">
                <tr class="table-head table-grid">
                    <th>Group Name</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
                <?php foreach($groups as $group):?>
                <tr class="table-grid">
                    <td><?=$group['group_name']?></td>
                    <td>26/07/2023</td>
                    <td class="table-action">
                    <a href="<?= ROOT_DASHBOARD . '/groups/permissions/'. $group['group_id'] ?>" class="btn btn-small btn-primary">Permissions</a>
                    <?php if($group['group_name'] !== "Admin"){?>
                    <a href="<?= ROOT_DASHBOARD . '/groups/edit/'. $group['group_id'] ?>" class="btn btn-small btn-primary">Edit</a>
                    <a href="<?= ROOT_DASHBOARD . '/groups/delete/'. $group['group_id'] ?>" class="btn btn-small btn-secondary">Delete</a>
                    <?php }?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php } else { ?>
            <h4>No Groups Created</h4>
            <?php }?>
        </div>
    </div>
</div>