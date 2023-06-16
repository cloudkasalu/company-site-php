
<a href="<?= ROOT . 'team/register'?>" class="btn btn-primary">Register Member</a>
<div class="team-members">
<?php foreach($aboutTeam as $content):?>
    <?php if(isset($content['firstname'])) {?>
 <div class="team-member">
    <div class="member-image">
        <div class="image-container">
            <img 
            <?php echo 'src="data:image/webp;base64,'.base64_encode($content['profile_picture']).'"';?>
             alt="<?= htmlspecialchars($content['position'], ENT_QUOTES, 'UTF-8')?>"
              width="268" height="300">
        </div>
    </div>
    <div class="member-details center">
        <h5 class="secondary-color name"><?= htmlspecialchars($content['firstname'], ENT_QUOTES, 'UTF-8')?> <?= htmlspecialchars($content['lastname'], ENT_QUOTES, 'UTF-8')?></h5>
        <span class="position"><?= htmlspecialchars($content['position'], ENT_QUOTES, 'UTF-8')?></span>
    <?php if($permission === "admin") {?>
    <?php if($content['registered'] != true) {?>
        <a href="<?= ROOT . 'team/register/' . $content['id'] ?>" class="btn btn-secondary">Register User</a>
    <?php }else{?>
        <a href="<?= ROOT . 'team/update/' . $content['id'] ?>" class="btn btn-secondary">Update</a>
    <?php }?>
    <?php }?>
</div>
   <?php }?>
<?php endforeach;?>
</div>