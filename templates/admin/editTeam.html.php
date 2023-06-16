 
<?php if(isset($member['firstname'])){ ?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" alt="" name="image"   >
    <input type="text" name="profile_picture" value="<?= htmlspecialchars($member['profile_picture'])?>">
    <input type="text" name="firstname" value="<?= htmlspecialchars($member['firstname'])?>">
    <input type="text" name="lastname" value="<?= htmlspecialchars($member['lastname'])?>">
    <input type="text" name="position" value="<?= htmlspecialchars($member['position'])?>">
    <input type="hidden" name="id" value="<?= htmlspecialchars($member['id'])?>" >

    <button class="btn-primary">Save</button>  
</form>
<?php }?>