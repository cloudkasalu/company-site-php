<div class="content-section">
<div class="content-main">
    <div class="content-title">
        <h4>Blogs</h4>
        <div class="content-actions">
            <a href="<?= ROOT_DASHBOARD . '/pages/create'?>" class="btn btn-primary">Create Page</a>
        </div>
    </div>
    <div class="content-wrapper">
        <?php if(($pages) ){ ?>
        <table class="content-table blogs-table">
            <tr class="table-head table-grid">
                <th>Name</th>
                <th>Visibility</th>
                <th>Published On</th>
                <th>Updated On</th>
                <th>Url</th>
                <th>Action</th>
            </tr>
            <?php foreach($pages as $page):?>
            <tr class="table-grid">
                <td><?=$page['title']?></td>
                <td>visible</td>
                <td><?=$page['publish_date']?></td>
                <td><?=$page['update_date']?></td>
                <td><?=$page['url']?></td>
                <td class="table-action">
                    <a href="<?= ROOT_DASHBOARD . '/pages/edit/'. $page['page_id'] ?>" class="btn btn-small btn-primary">Edit</a>
                    <a href="<?= ROOT_DASHBOARD . '/pages/delete/'. $page['page_id'] ?>" class="btn btn-small btn-secondary">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php } else { ?>
        <h4>No Pages Created</h4>
        <?php }?>
    </div>
</div>
</div>