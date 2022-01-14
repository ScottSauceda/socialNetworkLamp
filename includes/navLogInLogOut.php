<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="https://socialnetwork-lamp.herokuapp.com/showAllPosts.php" class="navbar-brand">Chatter</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <!-- <a href="blog.php" class="nav-item nav-link">Blog</a> -->
                <!-- <a href="posts.php" class="nav-item nav-link">Posts</a> -->
                <a href="https://socialnetwork-lamp.herokuapp.com/showAllPosts.php" class="nav-item nav-link">Posts</a>
                <?php echo $msg2 ?>
                <!-- <a href="blogArchive.php" class="nav-item nav-link">Archives</a> -->
            </div>
            <div class="navbar-nav ms-auto">
                <a href="https://socialnetwork-lamp.herokuapp.com/login.php" class="nav-item nav-link"><?php echo $msg ?></a>
            </div>
        </div>
    </div>
</nav>