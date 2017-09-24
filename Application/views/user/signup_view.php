
<?php include_once PUBLIC_PATH . DS . 'css' . DS . 'style.php'; ?>

<div class="modal-content">
    <div class="modal-header" style="padding:35px 50px;">
        <h4><span class="glyphicon glyphicon-off"></span> Sign Up </h4>
    </div>
    <div class="modal-body" style="padding:40px 50px;">
        <p><span class="error">* required field.</span></p>
        <form role="form"  method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-user"></span> E-Mail</label>
                <span class="error">*<?php if (isset($errors['email'])) echo $errors['email']; ?></span>
                <input type="text" name="email"value="<?php
                if (isset($_POST['email']))
                    echo $_POST['email'];
                ?>" id="email"
                       placeholder="type your Email" class="form-control" >
            </div>
            <div class="form-group">
                <label for="name"><span class="glyphicon glyphicon-user"></span> Name</label>
                <span class="error">*<?php if (isset($errors['name'])) echo $errors['name']; ?></span>
                <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"
                       class="form-control" id="name" 
                       placeholder="type your Name" >
            </div>
            <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-lock"></span>Change your Password</label>
                <span class="error">*<?php if (isset($errors['password'])) echo $errors['password']; ?></span>
                <input type="password" name="password" class="form-control" 
                       value="<?php if (isset($password)) echo $password; ?>"
                       id="psw" placeholder="Type Password" >
            </div>

            <div class="radio">
                <b>Gender :</b>
                <label>
                    <input type="radio" name="gender[]" <?php
                       if (isset($gender) && $gender == "Male")
                           echo "checked";
                ?>
                           value="Male" >Male
                </label>
                <label>
                    <input type="radio" name="gender[]" <?php
                    if (isset($gender) && $gender == "Female")
                        echo "checked";
                ?>
                           value="Female">Female
                </label>
                <span class="error">*<?php if (isset($errors['gender'])) echo $errors['gender']; ?></span>
            </div>
            <div class="form-group">
                <label><span class="glyphicon glyphicon-picture"></span> Photo</label>
                <span class="error">*<?php if (isset($errors['image'])) echo $errors['image']; ?></span>

                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label><span class="glyphicon glyphicon-code"></span> Enter Captcha</label>
                <?php
                $randem = substr(md5(uniqid(rand(), true)), 0, 5);
                ?>
                <input type="text" name="captcha"  value="<?php echo $randem; ?>" size="5" readonly  >
                <input type="text" name="codeMacth" size="5" placeholder="captcha" >
                <span class="error">*<?php if (isset($errors['capcha'])) echo $errors['capcha']; ?>

            </div>

            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-edit"></span> Save</button>
        </form>
    </div>
    <div class="modal-footer">
        <a class="btn btn-default btn-info " href="/lamp/">
            <span class="glyphicon glyphicon-log-in"> </span>
            log-in</a>
    </div>
</div>

