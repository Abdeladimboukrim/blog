<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo APPNAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>posts">Posts</a>
            </li>           
         
      </ul>
      <div class="d-flex">
      <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['id'])) : ?>
                <span class="mr-3 text-light align-self-center ">Welcome back, <?php echo $_SESSION['firstName'] ?></span>
                <li class="btn btn-outline-danger"><a href="<?php echo URLROOT; ?>blog/logout">Logout</a></li>

            <?php else : ?>
                <li class="btn btn-outline-success"><a href="<?php echo URLROOT; ?>blog/login">Login</a></li>
                <li class="btn btn-outline-primary"><a href="<?php echo URLROOT; ?>blog/register">Register</a></li>
            <?php endif; ?>
        </ul> 
      </div>
    </div>
  </div>
</nav>


