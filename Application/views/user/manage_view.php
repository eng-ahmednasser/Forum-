<div class="container-fluid table-responsive">          
    <h2>Manage Users</h2><br>
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Admin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td>
                        <img src="<?= IMAGES_PATH . $user['image'] ?>" class="img-circle " height="75" width="75" alt="Avatar">
                    </td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['gender'] ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name='id' value="<?= $user['id'] ?>" >
                            <?php if ($user['if_admin']): ?>
                                <button type="submit"class="btn btn-success" name="admin" value='0'>YES</button>
                            <?php else : ?>
                                <button type="submit"class="btn btn-danger" name="admin" value='1'>NO</button>
                            <?php endif ?>
                        </form>
                    </td>
                    <td>
                        <?php if ($user['id'] !=  $_SESSION['id']): ?>
                        <form method="post">
                            <button type="submit"class="btn btn-danger" name="delete" value="<?= $user['id'] ?>" >delete</button>
                        </form>
                        <?php endif;?>
                    </td>

                </tr>
            <?php endforeach; ?>

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
