<!--
This Templates for show All Forums 
-->


<div class="col-sm-9">
    <h2>Our Forums</h2>
    <hr>
    <?php foreach ($allForum as  $forum):  ?>
    <h3><a href="<?=DS.'lamp'.DS.'forums'.DS.'show'.DS.$forum['id']?>"><?=$forum['forum_title']?></a></h3>
    <p><?php echo $forum['forum_description']?></p>
    <h5>
        <span class="label label-danger">
            <a href="<?=DS.'lamp'.DS.'posts'.DS.'add'.DS.$forum['id']?>" class="btn btn-primary">
                <span class="glyphicon glyphicon-pencil"></span> ADD new Post
            </a>
        </span>
    </h5>
    <hr>
    <?php endforeach;?>
</div>

<!-- Footer -->

</div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
