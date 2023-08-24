<header class="content-header"><h3>Blog Categories</h3> </header>
<div class="content-section">
    <div class="content-aside">
        <div class="content-title">
            <h4>Add Category</h4>
        </div>
        <div class="content-wrapper">
            <form action="<?= ROOT_DASHBOARD . '/categories/edit/'. $category['category_id']?>" method="post">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?=$category['category_name']?>" placeholder="Category Name">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= ROOT_DASHBOARD . '/categories'?>" class="btn btn-secondary">Cancel</a>
            </form> 
        </div>
    </div>
    <div class="content-main">
        <div class="content-title">
            <h4>Categories</h4>
        </div>
        <div class="content-wrapper">
        <?php if(!isset($categories['category_name'])) {?>
            <table class="content-table">
                <tr class="table-head table-grid">
                    <th>Name</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
                <?php foreach($categories as $category):?>
                <tr class="table-grid">
                    <td><?=$category['category_name']?></td>
                    <td><?=$category['created_date']?></td>
                    <td class="table-action">
                    <a href="<?= ROOT_DASHBOARD . '/categories/edit/'. $category['category_id'] ?>" class="btn btn-small btn-primary">Edit</a>
                    <a href="<?= ROOT_DASHBOARD . '/categories/delete/'. $category['category_id'] ?>" class="btn btn-small btn-secondary">Delete</a>
                    </td>
                </tr>
               <?php endforeach; ?>
            </table>
        </div>
        <?php } else { ?>
            <h4>No Categories Created</h4>
        <?php }?>
    </div>
</div>