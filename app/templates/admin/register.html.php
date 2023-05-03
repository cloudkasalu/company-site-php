<?php if(isset($errors)) :?>

<?php foreach($errors as $error): ?>
    <span><?=$error?></span>
<?php endforeach;?>
<?php endif?>
<form action="" method="post">
<div class="form_header"><h3>Register User</h3></div>
    <input type="name" name="name" id="name" placeholder="Name">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Enter Password">
    <button class="btn btn-primary">Register</button>
</form>