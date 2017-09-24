<?php if(isset($v))extract($v);?>
<div class="col-sm-9">
    <div class="container-fluid ">
        <h2>Create new Post</h2>
        <form action="" method="POST">
            <div class="form-group ">
                <label class="control-label col-sm-2" for="Forum">Forum Name:</label>
                
                <span><?= ucfirst($FT['forum_title'])?> </span>
                
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <span class="error">*<?php if (isset($errors['title'])) echo $errors['title']; ?></span>
                <input type="title" name="title" class="form-control" id="title" 
                       value="<?php if (isset($title)) echo $title;  ?>" placeholder="Enter Post Title">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <span class="error">*<?php if (isset($errors['content'])) echo $errors['content']; ?></span>
                <textarea class="form-control" name="content" id="content" rows="8" placeholder="Enter Content"><?php if (isset($content)) echo $content;  ?></textarea>
                <input type="hidden" name="forum_id" value="<?=$this->_params[0]?>" >
                <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>" >
            </div>
            <button type="submit" class="btn btn-default">Share</button>
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
