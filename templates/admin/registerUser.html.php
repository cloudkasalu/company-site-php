<?php if(isset($errors)) :?>

<?php foreach($errors as $error): ?>
    <span><?=$error?></span>
<?php endforeach;?>
<?php endif?>

<form action="" method="post">
<div class="form_header"><h3>Register User</h3></div>
        <?php if(isset($member['firstname'])){?>
            <input type="hidden" name="profile_picture" value="<?= htmlspecialchars($member['profile_picture'])?>">
            <input type="text" name="firstname" placehold="Firstname" value="<?= htmlspecialchars($member['firstname'])?>" readonly>
            <input type="text" name="lastname" placeholder="Lastname" value="<?= htmlspecialchars($member['lastname'])?>" readonly>
            <input type="text" name="email"placeholder="Email" value="<?= htmlspecialchars($member['email'])?>" readonly>
            <input type="hidden" name="id" value="<?= htmlspecialchars($member['id'])?>">
        <?php };?>
        <label for="password">Create Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password">

        <label for="access">Access</label>
        <select name="access" id="access">
            <option value="view">View</option>
            <option value="editor">Editor</option>
            <option value="admin">Admin</option>
        </select>

        
    <button class="btn btn-primary">Register</button>
</form>