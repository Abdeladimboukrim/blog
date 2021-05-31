<?php include_once APPROOT . '/views/inc/header.inc.php'; ?>
<!-- <pre><?php var_dump($data);  ?></pre> -->
<div class="container card card-body mt-5">
    <h2 class="mb-3">Edit Post</h2>
    <form action="<?php echo URLROOT; ?>posts/edit/<?php echo $data['postId'] ?>" method="post">
        <div class="form-group">
            <input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="title ..." class="form-control form-control-lg <?php echo (!empty($data['title_err']) ? 'is-invalid' : '') ?>">
            <span class="invalid-feedback"> <?php echo $data['title_err'] ?></span>
        </div></br>
        <div class="form-group">
            <input type="text" name="description" value="<?php echo $data['description']; ?>" placeholder="description ..." class="form-control form-control-lg <?php echo (!empty($data['description_err']) ? 'is-invalid' : '') ?>">
            <span class="invalid-feedback"> <?php echo $data['description_err'] ?></span>
        </div><br>
        <div class="form-group">
            <textarea name="body" id="summernote" placeholder="post body ..." class="form-control form-control-lg <?php echo (!empty($data['body_err']) ? 'is-invalid' : '') ?>"><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"> <?php echo $data['body_err'] ?></span>
        </div><br>
        <input type="text" value="<?php echo $data['postId'] ?>"  name="postId" hidden >
        <div>
       
            <input type="submit" class="btn btn-success">
        </div>
    </form>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php'; ?>