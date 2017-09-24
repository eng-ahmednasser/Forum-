<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Our Forums</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <?php ob_start();
        include_once PUBLIC_PATH . DS .'css'.DS.'style.php'; ?>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                    <h1>Our  Forum </h1>
                    <ul class="nav nav-pills nav-stacked">
                        <li><h2>Welcome <span><?= $_SESSION['name']; ?></span></h2></li>
                        <li><img src="<?=IMAGES_PATH. $_SESSION['image']?>" class="img-circle" height="200" width="200" alt="Avatar"></li>
                        <li class="active"><a href="/lamp/">Home</a></li>
                        <li><a href="/lamp/forums">All Forms</a></li>
                        
                        <?php if ($_SESSION['if_admin']) : ?>
                            <li><a href="/lamp/user/profile/">Control Panel</a></li>
                        <?php else : ?>
                            <li><a href="/lamp/user/profile/">Profile</a></li>
                         <?php endif;?>   
                        <li><?php echo $_SESSION['logout'] ?></li>
                        <li><a href="#section3">About Us</a></li>


                    </ul><br>
                </div>