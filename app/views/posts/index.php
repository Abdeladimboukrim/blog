<?php include_once APPROOT . '/views/inc/header.inc.php' ?>

<div class="row mt-3">
    <div class="col-md-9">
        <h2>Blog</h2>
    </div>
    <div class="col-md-3">
        <a href="<?php echo URLROOT; ?>posts/add/" class="btn btn-info float-right">Add Post</a>
    </div>

    <div class="p-2 mx-auto w-75">

        <?php
        foreach ($data['posts'] as $post) : ?>


        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-md-10">
                    <h1 class="my-4">
                        Blog abdeladim
                        <small>Secondary Text</small>
                    </h1>
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="Card image cap" />
                        <div class="card-body">
                        <span class="card-title"><?php echo $post->title ?></span>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="<?php echo URLROOT; ?>posts/show/<?php echo $post->postId?>">Read More →</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on January 1, 2021 by
                            <a href="#!">Start Bootstrap</a>
                        </div>
                    </div>
                    
                </div>            
        <?php endforeach; ?>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>