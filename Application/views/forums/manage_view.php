<div class="container-fluid table-responsive">          
    <h2>Manage Users</h2><br>
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>Title</th>
                <th>description</th>
                <th>Count Posts</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($forums as $forum) : ?>
                <tr>
                    <td><h5><?= ucfirst($forum['forum_title']) ?></h5></td>
                    <td><?= $forum['forum_description'] ?></td>
                    <td>
                        <?php
                        foreach ($countPosts as $countPost) {
                            if ($forum['id'] == $countPost['forum_id']) {
                                echo $countPost['count'];
                            }
                        }
                        ?>
                    </td>

                    <td>
                        <form method="post" class="form-inline">
                            <button type="submit"class="btn btn-danger" name="delete" value="<?= $forum['id'] ?>" >delete</button>
                            <a href="<?= DS . 'lamp' . DS . 'forums' . DS . 'edit'.DS.$forum['id'] ?>" class="btn  btn-info">Edit</a>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr >
                <td colspan="4">
                    <a href="<?= DS . 'lamp' . DS . 'forums' . DS . 'add' ?>" class="btn btn-block btn-success">
                        <span class="glyphicon glyphicon-pencil"></span> ADD New Forum
                    </a>
                </td>
            </tr>

        </tbody>
    </table>
</div>



<!-- Footer -->
</div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
