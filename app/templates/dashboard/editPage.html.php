<?php  if(isset($page['title'])){ ?>
<form action="" method="post" enctype="multipart/form-data" class="content-section-modals">
    <div class="main-content-modals">
        <div class="content-main">
            <div class="content-title">
                <h4>Add Page</h4>
            </div>
            <div class="content-wrapper">              
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Page Title" value="<?=htmlspecialchars($page['title'])?>">
                <textarea name="content" id="editor"><?=htmlspecialchars($page['content'])?></textarea>
            </div>
        </div>
        <div class="content-main">
            <div class="content-title">
                <h4>Slug</h4>
            </div>
            <div class="content-wrapper">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" placeholder="Slug" value="<?=htmlspecialchars($page['slug'])?>">
            </div>
        </div>
        <div class="content-main">
            <div class="content-title">
                <h4>SEO</h4>
            </div>
            <div class="content-wrapper">
                <label for="meta-keywords">Meta Keywords</label>
                <input type="text" name="meta-keyword" id="meta-keywords" placeholder="Meta Keywords" value="<?=htmlspecialchars($page['meta_keywords'])?>">
                <label for="meta-description">Meta Description</label>
                <textarea name="meta-description" id="meta-discription" placeholder="Meta Description" cols="20" rows="5"><?=htmlspecialchars($page['meta_description'])?></textarea>
            </div>
        </div>
    </div>
    <div class="aside-content-modals">
        <div class="content-aside">
            <div class="content-title">
                <h4>Publish</h4>
            </div>
            <div class="content-wrapper">
                <label for="visibility">Visibility</label>
                <select name="vilibility" id="visibility" placeholder="Visibility">
                    <option value="1" <?=$page['visibility'] == 1? 'selected' : ''; ?>>Visible</option>
                    <option value="0" <?=$page['visibility'] == 0? 'selected' : ''; ?>>Hidden</option>
                </select>
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </div>
        <div class="content-aside">
            <div class="content-title">
                <h4>Featured Image</h4>
            </div>
            <div class="content-wrapper">
                <div class="preview-image">
                    <div class="image-container">
                        <img src="/images/placeholder-image.png" alt="">
                    </div>
                </div>
                <input type="file" name="image">
            </div>
        </div>
    </div>
</form>
<?php }?>
