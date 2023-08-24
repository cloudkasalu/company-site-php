<div class="content-section">
<div class="content-main">
    <div class="content-title">
        <h4>Blogs</h4>
        <div class="content-actions">
            <a href="<?= ROOT_DASHBOARD . '/blogs/create'?>" class="btn btn-primary">Create Article</a>
        </div>
    </div>
    <div class="content-wrapper">
        <?php if(!isset($blogs['blog_title']) ){ ?>
        <table class="content-table blogs-table">
            <tr class="table-head table-grid">
                <th>Title</th>
                <th>Author</th>
                <th>Published</th>
                <th>Action</th>
            </tr>
            <?php foreach($blogs as $blog):?>
            <tr class="table-grid">
                <td><?=$blog['title']?></td>
                <td><?=$blog['author']['firstname']?> <?=$blog['author']['lastname']?></td>
                <td><?=$blog['publish_date']?></td>
                <td class="table-action">
                    <a href="<?= ROOT_DASHBOARD . '/blogs/edit/'. $blog['blog_id'] ?>" class="btn btn-small btn-primary">Edit</a>
                    <a href="<?= ROOT_DASHBOARD . '/blogs/delete/'. $blog['blog_id'] ?>" class="btn btn-small btn-secondary">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php } else { ?>
        <h4>No Blogs Created</h4>
        <?php }?>
    </div>
</div>
</div>