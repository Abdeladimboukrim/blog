<?php include_once APPROOT . '/views/inc/header.inc.php';?>
 
<div class="container card card-body mt-5">
    <h2 class="mb-3">Create new Post</h2>
    <form action="<?php echo URLROOT; ?>posts/add" method="post">
        <div class="form-group">
            <input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="title ..." class="form-control form-control-lg <?php echo (!empty($data['title_err']) ? 'is-invalid' : '') ?>">
            <span class="invalid-feedback"> <?php echo $data['title_err'] ?></span>
        </div><br>
        <!-- description -->
        <div class="form-group">
            <input type="text" name="description" value="<?php echo $data['description']; ?>" placeholder="description ..." class="form-control form-control-lg <?php echo (!empty($data['description_err']) ? 'is-invalid' : '') ?>">
            <span class="invalid-feedback"> <?php echo $data['description_err'] ?></span>
        </div><br>
        <div class="form-group">
            <textarea name="body" id="summernote"   placeholder="post body ..." class="form-control form-control-lg <?php echo (!empty($data['body_err']) ? 'is-invalid' : '') ?>"><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"> <?php echo $data['body_err'] ?></span>
        </div>  <br>      
        <input type="text" value"<?php echo $_SESSION['id'] ?>" hidden>
        <div>
            <input type="submit" class="btn btn-success">
        </div>
    </form>
</div>
<script>
      $('#summernote').summernote({
        placeholder: 'Body ...',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

<?php include_once APPROOT . '/views/inc/footer.inc.php'; ?>