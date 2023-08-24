<div class="content-section">
    <div class="content-main">
        <div class="content-title">
            <h4>Edit Group</h4>
        </div>
        <div class="content-wrapper">
            <?php if(isset($errors)) :?>

            <?php foreach($errors as $error): ?>
                <span><?=$error?></span>
            <?php endforeach;?>
            <?php endif?>
            <form action="<?= ROOT_DASHBOARD . '/groups/edit/'. $group['group_id']?>" method="post" enctype="multipart/form-data">

                <div class="form-field">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?=$group['group_name']?>" id="name">
                </div>
            
                <button class="btn btn-primary" type="submit">Save</button>  
            </form>
        </div>
    </div>
</div>