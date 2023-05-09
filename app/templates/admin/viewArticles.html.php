
<?php foreach($articles as $article):?>
<a href="<?=ROOT . 'blog/edit/'. $article['id'];?>" class="post">
    <div class="post-image">
        <div class="image-container">
            <img 
            <?php echo 'src="data:image/webp;base64,'.base64_encode($article['post_image']).'"';?>
             alt="<?= htmlspecialchars($article['post_image_caption'], ENT_QUOTES, 'UTF-8')?>"
             >
        </div>
    </div>
    <div class="post-details">
        <div class="title">
            <h5 class="secondary-color"><?= htmlspecialchars( $article['post_title'], ENT_QUOTES, 'UTF-8')?></h5>
        </div>
        <div class="footer d-flex">
            <div class="author">
                <div class="author-image">
                    <div class="image-container">
                       <img 
                        <?php echo 'src="data:image/webp;base64,'.base64_encode($article['user_image']).'"';?>
                        alt="user image"
                        >
                    </div>
                </div>
                <div class="author-name">
                <?= htmlspecialchars( $article['username'], ENT_QUOTES, 'UTF-8')?>
                </div>
            </div>
            <div class="date"><?php $date = new DateTime($article['post_date']); echo $date->format('jS F Y H:i'); ?></div>
        </div>
    </div>
</a>
<?php endforeach;?>

<a href="<?= ROOT . '/dashboard/blog/post'?>" class="btn btn-primary">Create Article</a>