<!DOCTYPE html>
<!--
This Templates for show All Posts In any Forum 
-->


<div class="col-sm-9">
    <div class="container-fluid">
        <div class="row"> 
            <h2 ><b class="col-sm-9 "><?= ucfirst($forumTitle['forum_title']) ?></b></h2>
            <span class="col-sm-3">
                <a href="<?= DS . 'lamp' . DS . 'posts' . DS . 'add' . DS . $this->_params[0] ?>" class="btn btn-lg btn-primary">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Add New Post 
                </a>
            </span>
        </div>
    </div>
    <hr>
    <div class="">

    </div>

    <?php
    if (isset($allPosts)):
        foreach ($allPosts as $key => $post) :
            ?>
            <a class="btn btn-block btn-info col-sm-12" href="<?= DS . 'lamp' . DS . 'posts' . DS . 'show' . DS . $post['forum_id'] . DS . $post['id'] ?>">
                <h4 class="col-sm-3"><span class="glyphicon glyphicon-leaf"></span> <?= $post['title']; ?></h4>

                <h5 class="col-sm-3">
                    <span class="glyphicon glyphicon-comment"></span>
                    <?php
                    if (is_array($countCM)) {
                        foreach ($countCM as $key => $CC) {
                            if ($post['id'] == $CC['post_id']) {
                                echo $CC['count'];
                            }
                        }
                    } else {
                        echo $countCM;  
                    }
                    ?>
                </h5>
                <h5 class="col-sm-3">
                    <span class="glyphicon glyphicon-user"> </span> <?= $post['name']; ?> 
                </h5>
                <h5 class="col-sm-3"><span class="glyphicon glyphicon-time"> </span> <?= $post['datetime']; ?> </h5>
                <?php if ($post['user_id'] === $_SESSION['id'] || $_SESSION['if_admin']): ?>    
                    <a href="<?= DS . 'lamp' . DS . 'posts' . DS . 'delete' . DS . $post['id'] . DS . $post['forum_id'] ?>"  class="col-sm-3 btn label label-danger">Delete</a><br>
                    <?php if ($post['user_id'] === $_SESSION['id']): ?>
                        <a href="<?= DS . 'lamp' . DS . 'posts' . DS . 'edit' . DS . $post['id'] ?>"  class="col-sm-3 btn label label-success">  Edit  </a>
                        <?php
                    endif;
                endif;
                ?>        

            </a>

            <br><br>
            <hr>
            <?php
        endforeach;
    endif;
    ?>

</div>
<!-- Footer -->

</div>
</div>

<footer class="container-fluid">
    <p>Copyright © Footer 2017. All right reserved.</p>
</footer>

</body>
</html>
