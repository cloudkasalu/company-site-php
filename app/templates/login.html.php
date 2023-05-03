
<main id="login">
        <?php if(isset($errors)) :?>

        <?php foreach($errors as $error): ?>
            <span><?=$error?></span>
        <?php endforeach;?>
        <?php endif?>
        <form action="" method="post">
        <div class="form_header"><img src="../images/favicon.svg" alt=""> <h3>Login</h3></div>
            <input type="text" name="username" id="username" placeholder="Name or Email">
            <input type="password" name="password" id="password" placeholder="Enter Password">
            <button class="btn btn-primary">Login</button>
        </form>
        <a href="">Forgot Password?</a>
    </main>