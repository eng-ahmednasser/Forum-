

<div class="table-responsive">          

    <div class="text-center">
        <img src="<?= IMAGES_PATH . $userData['image'] ?>" class="img-circle " height="300" width="300" alt="Avatar">
    </div>
    <h2 class="h">Your Profile</h2>
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>Name:</th>
                <td><?=$userData['name']?></td>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Email</th>
                <td><?=$userData['email']?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?=$userData['gender']?></td>
            </tr>
            <tr>
                <th>permeation</th>
                <td>
                    <?php if (!$userData['if_admin']): ?>
                        <a href="<?= DS . 'lamp' . DS . 'user' . DS . 'edit' ?>" class="btn btn-info btn-block">Edit Your Profile</a>
                    <?php else : ?>
                        <div class="btn-group">
                            <!-- Trigger the modal with a button -->
                            <a href="<?= DS . 'lamp' . DS . 'user' . DS . 'edit' ?>" class="btn btn-danger">Edit Your Profile</a>
                            <a href="<?= DS . 'lamp' . DS . 'user' . DS . 'manage' ?>" class="btn btn-info">Manage Users</a>
                            <a href="<?= DS . 'lamp' . DS . 'forums' . DS . 'manage' ?>" class="btn btn-success">Manage Forum</a>
                        </div>
                    <?php endif ?>

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
