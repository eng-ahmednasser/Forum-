

<div class="col-sm-9">
    <h2>
        <a href="<?= DS . 'lamp' . DS . 'forums' . DS . 'show' . DS . $showPost['forum_id'] ?>">
            <?= $forumTitle['forum_title'] ?>
        </a>
    </h2>
    <hr>
    <h3><?= $showPost['title'] ?></h3>
    <div class="col-sm-2 text-center">
        <img src="<?= IMAGES_PATH . $showPost['image'] ?>" class="img-circle" height="65" width="65" alt="Avatar">
    </div>
    <div class="col-sm-10">
        <h5>
            <span class="glyphicon glyphicon-time"></span> 
            Post by <span class="label label-warning">
                <?= $showPost['name'] ?> </span> , 
            <?= $showPost['datetime'] ?>.
        </h5>

    </div>

    <p><?= $showPost['content'] ?></p>

    <br><br>
    <hr>

    <h4>Leave a Comment:</h4>
    <form role="form" action="" method="post">
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" required></textarea>
            <input type="hidden" name="post_id" value="<?= $showPost['id'] ?>">
            <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
        </div>
        <button type="submit" class="btn btn-success">Comment</button>
    </form>
    <br><br>

    <p><span class="badge"><?= count($comments); ?></span> Comments:</p><br>
    <?php if ($comments): foreach ($comments as $comment): ?>
            <div class="row">
                <div class="col-sm-2 text-center">
                    <img src="<?= IMAGES_PATH . $comment['image'] ?>" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4><?= $comment['name'] ?> <small><?= $comment['datetime'] ?></small></h4>
                    <p><?= $comment['content'] ?></p>
                    <?php if ($comment['user_id'] === $_SESSION['id'] || $_SESSION['if_admin']): ?>
                        <form method="post" style="display: inline-block">
                            <button type="submit"class="btn label label-danger" name="delete" value="<?= $comment['id'] ?>" >delete</button>
                        </form>
                        <?php if ($comment['user_id'] === $_SESSION['id']): ?> 
                            <a href="<?= DS . 'lamp' . DS . 'comments' . DS . 'edit' . DS . $comment['id'] ?>"  class="btn label label-success">Edit</a>
                        <?php
                        endif;
                    endif;
                    ?>
                    <br>
                </div>
            </div>
            <hr>
    <?php endforeach;
endif; ?>
</div>

<!-- Footer -->

</div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
