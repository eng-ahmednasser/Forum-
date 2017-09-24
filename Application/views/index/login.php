<?php include_once PUBLIC_PATH . DS . 'css' . DS . 'style.php'; ?>
<div class="modal-content">
    <div class="modal-header">
        <h4 ><span class="glyphicon glyphicon-log-in"></span> Login</h4>
    </div>
    <div class="modal-body">
        <form role="form" method="POST">
            <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
                <span class="error">* <?php if (isset($errors['email'])) echo $errors['email']; ?></span>

                <input type="text" name="email" 
                       value="<?php
                       if (isset($_POST['email']))
                           echo $_POST['email'];
                       ?>"  
                       class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-lock"></span> Password</label>
                <span class="error">* <?php if (isset($errors['password'])) echo $errors['password']; ?></span>

                <input type="password" name="password" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <button type="submit" value="Login" name="login" class="btn btn-default btn-success btn-block">
                <span class="glyphicon glyphicon-off"></span> Login
            </button>
        </form>
    </div>
    <div class="modal-footer">
        <a class="btn btn-default btn-info btn-block" href="user/signup">
            <span class="glyphicon glyphicon-plus-sign"> </span>
            Sign Up</a>
    </div>
</div>
