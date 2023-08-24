<form action="" method="post" enctype="multipart/form-data" class="content-section-modals">
    <div class="main-content-modals">
        <div class="content-main">
            <div class="content-title">
                <h4>Add Blog Content</h4>
            </div>
            <div class="content-wrapper">              
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?=$blog['title']?>" placeholder="Article Title">
                <textarea name="content" id="editor"><?=$blog['content']?></textarea>
            </div>
        </div>
    </div>
    <div class="aside-content-modals">
        <div class="content-aside">
            <div class="content-wrapper">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </div>
        <div class="content-aside">
            <div class="content-title">
                <h4>Add Category</h4>
            </div>
            <div class="content-wrapper">
                <select name="category" id="">
                    <?php foreach($categories as $category):?>
                    <option value="<?=$category['category_id']?>" <?=$category['category_id'] === $blog['category']? 'selected' : '';?> > <?=$category['category_name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="content-aside">
            <div class="content-title">
                <h4>Featured Image</h4>
            </div>
            <div class="content-wrapper">
                <div class="preview-image">
                    <div class="image-container">
                    <img
                        <?php echo 'src="data:image/jpg;base64,'.base64_encode($blog['featured_image']).'"';?>
                             >
                    </div>
                </div>
                <input type="file" name="image">
            </div>
        </div>
    </div>
</form>