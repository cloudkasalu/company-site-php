<?php if(isset($errors)) :?>

<?php foreach($errors as $error): ?>
    <span><?=$error?></span>
<?php endforeach;?>
<?php endif?>

<form action="" method="post">
<div class="form_header"><h3>Register User</h3></div>
             <label>Image</label>
            <input type="file" alt="" name="image"   >
            <input type="text" name="firstname" placehold="Firstname" >
            <input type="text" name="lastname" placeholder="Lastname">
            <input type="text" name="email"placeholder="Email" >
            <input type="text" name="position"placeholder="Position">

            <label>Checking this will display the member on the website              <input type="checkbox" name="display"><label>
    <button class="btn btn-primary">Register</button>
</form>