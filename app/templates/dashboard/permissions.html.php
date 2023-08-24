
<div class="content-section">
    <div class="content-main">
        <div class="content-title">
            <h4>Edit <?=$group['group_name']?>’s Permissions</h4>
        </div>
        <div class="content-wrapper">

        <form action="/dashboard/groups/permissions" method="post">
        <input type="hidden" value="<?=$group['group_id']?>" name="id">
        <?php foreach ($permissions as $name => $value): ?>
        <div>
            <input name="permissions[]" type="checkbox" value="<?=$value?>" <?php if (in_array($value,$group['permissions'])): echo 'checked'; endif; ?> />
            <label><?=$name?>
        </div>
        <?php endforeach; ?>

        <input type="submit" value="Submit" />
        </form>
        </div>
    </div>
</div>