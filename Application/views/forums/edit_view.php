<?php if (isset($v)) extract($v); ?>
<div class="col-sm-9">
    <div class="container-fluid ">
        <h2>Edit Forum</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Title:</label>
                <span class="error">*<?php if (isset($errors['forum_title'])) echo $errors['forum_title']; ?></span>
                <input type="title" name="forum_title" class="form-control" id="title" 
                       value="<?php if (isset($forum_title)) echo $forum_title; ?>" placeholder="Enter Post Title">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <span class="error">*<?php if (isset($errors['forum_description'])) echo $errors['forum_description']; ?></span>
                <textarea class="form-control" name="forum_description" id="content" rows="8" placeholder="Enter Content"><?php if (isset($forum_description)) echo $forum_description; ?></textarea>
            </div>
            <button type="submit" class="btn btn-default">Edit</button>
        </form>

    </div>
</div>

<!-- Footer -->

</div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
