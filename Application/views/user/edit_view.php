<?php
extract($userData);
?>
<!-- Modal content-->
<div class=" col-sm-9 container-fluid">
    <div class="text-center">
        <h2>Edit Your Profile</h2>
    </div>
    <form role="form"  method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email"><span class="glyphicon glyphicon-user"></span> E-Mail</label>
            <span class="error">*<?php if (isset($errors['email'])) echo $errors['email']; ?></span>
            <input type="text" name="email"value="<?php
            if (isset($email))
                echo $email;
            ?>" id="email"
                   placeholder="type your Email" class="form-control" >
        </div>
        <div class="form-group">
            <label for="name"><span class="glyphicon glyphicon-user"></span> Name</label>
            <span class="error">*<?php if (isset($errors['name'])) echo $errors['name']; ?></span>
            <input type="text" name="name" value="<?php if (isset($name)) echo $name; ?>"
                   class="form-control" id="name" 
                   placeholder="type your Name" >
        </div>
        <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Change your Password</label>
            <span class="error">*<?php if (isset($errors['password'])) echo $errors['password']; ?></span>
            <input type="text" name="password" class="form-control" 
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
            <label><span class="glyphicon glyphicon-picture"></span> Change</label>
            <img src="<?= IMAGES_PATH . $image; ?>"  style='width:100px; height: 100px;'> ?
            <br> <br>
            <input type="file" name="image">
            <span class="error">*<?php if (isset($errors['image'])) echo $errors['image']; ?></span>
        </div>
        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-edit"></span> Save</button>
    </form>
</div>

<!-- Footer -->

</div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>

