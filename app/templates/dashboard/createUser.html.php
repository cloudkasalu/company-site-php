<?php if(isset($errors)) :?>

<?php foreach($errors as $error): ?>
    <span><?=$error?></span>
<?php endforeach;?>
<?php endif?>

<div class="content-section">
    <div class="content-main">
        <div class="content-title">
            <h4>Create User</h4>
        </div>
        <div class="content-wrapper">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="flex">
                    <div class="flex-col flex justify-center">
                        <div class="profile-image-edit">
                            <div class="image-container">
                                <img src="/images/avatar.png" alt="">
                            </div>
                            <input type="file" alt="" name="image">
                            <input type="hidden" name="previousImage" value="">
                        </div>
                    </div>
                    <div class="flex-col">
                        <div class="form-group">
                            <div class="form-field">
                                <label for="firstname">Firstname</label>
                                <input type="text" name="firstname" id="firstname" value="<?= $values['firstname']?? ''?>" >
                            </div>
                            <div class="form-field">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="lastname" id="lastname" value="<?= $values['lastname']?? ''?>" >
                            </div>
                        </div>
                        <div class="form-field">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="<?= $values['username']?? ''?>">
                        </div>
                        <div class="form-field">
                            <label for="username">Email</label>
                            <input type="email" name="email" id="email" value="<?= $values['email']?? ''?>" >
                        </div>
                        <div class="form-field">
                            <label for="phone">Phone</label>
                            <input type="phone" name="phone" id="phone" value="<?= $values['phone']?? ''?>">
                        </div>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-field">
                        <label for="role">Role</label>
                        <select name="role" id="role" value="<?= $values['role']?? ''?>">
                            <?php foreach($groups as $group):?>
                            <option value="<?=$group['group_id']?>"><?=$group['group_name']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="gender">Gender</label>
                            <select name="gender" id="gender" value="<?= $values['gender']?? ''?>">
                                <option value="male">Male</option>
                                <option value="male">Female</option>
                            </select>
                    </div>
                    <div class="form-field">
                        <label for="birthday">Date of Birth</label>
                        <input type="date" name="birthday" id="birthday" value="<?= $values['birthday']?? ''?>" >
                    </div>
                    <div class="form-field">
                        <label for="facebook">Facebook Url</label>
                        <input type="text" name="facebook" id="facebook" >
                    </div>
                    <div class="form-field">
                        <label for="twitter">Twitter Url</label>
                        <input type="text" name="twitter" id="twitter">
                    </div>
                    <div class="form-field">
                        <label for="linkedin">Linkedin Url</label>
                        <input type="text" name="linkedin" id="linkedin">
                    </div>
                </div>
                <div class="form-field">
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio" cols="30" rows="10"><?= $values['bio']?? ''?></textarea>
                </div>
                <div class="form-group">
                    <div class="form-field">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="form-field">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="password" id="confirmPassword">
                    </div>
                </div>
            
                <button class="btn btn-primary">Save</button>  
            </form>
        </div>
    </div>
</div>


