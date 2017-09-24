

<div class="col-sm-9">
    <h3><small>RECENT POSTS</small></h3>
    <hr>
<?php foreach ($recenPosts as $recenPost): ?>
        <!--  Post Title and ID this post (Link) -->
        <h2>
            <a href="<?='posts'.DS.'show'.DS.$recenPost['forum_id'].DS.$recenPost['id'] ?>"><?= $recenPost['title'] ?></a>
        </h2>
        <div class="col-sm-2 text-center">
            <!--  image for User how wrote post -->
            <img src=<?=IMAGES_PATH.$recenPost['image'] ?> height="65" width="65" alt="Avatar" />
        </div>
        <div class="col-sm-10">
            <!--  Name and date time for User how wrote this post-->
            <h5>
                <span class="glyphicon glyphicon-time"></span>
                Post by <span><?= $recenPost['name'] ?></span>
                ,<?= $recenPost['datetime'] ?>
            </h5>
            <h5>
                <span class="label label-danger">
    <?= $recenPost['forum_title'] ?>
                </span> 
            </h5><br>     
        </div>

        <p><?= $recenPost['content'] ?></p>
        <br><br>
        <hr>
<?php endforeach; ?>                    
</div>
<!-- Footer -->

</div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
