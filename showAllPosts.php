<?php

    require_once("conn/connSocial.php");

    include 'includes/authenticate-user.php';


    // $bloggerID = 5;
    // load all blogs along w correct members and their pics
    $query = "SELECT * FROM blogs, members WHERE blogs.mbrID = members.IDmbr ORDER BY blogDateTime DESC";
    // $query = "SELECT * FROM blogs WHERE mbrID='$bloggerID' ORDER BY IDblog DESC";

    $result = mysqli_query($conn, $query);

    // peel off the first row -- the most recent blog
    $row = mysqli_fetch_array($result);

    $blogID = $row['IDblog']; // current blog ID, from the above query
    // load comments for the current blog entry only
    // <?php echo $blogID; 
    // $query2 = "SELECT * FROM comments, members WHERE comments.IDmbr = members.IDmbr AND comments.IDblog = $blogID ORDER BY commentTime DESC";
    // $result2 = mysqli_query($conn, $query2) or die ("Couldn't execute query2!");

    // $username = $_SESSION['user'];
    // $commenterID = $_SESSION['IDmbr']

    
?>

<!DOCTYPE html>
<html lang="en-us">
<head>

    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
         <!-- boot strap core css -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<style>
  a:link {
    text-decoration: none;
  }
  a:hover {
    color: red;
  }
</style>
</head>
<body>
    <?php include 'includes/navLogInLogOut.php'; ?>
    <main class="my-5">
        <div class="container">
            <!-- Section: Content -->
            <section class="text-center">
            <h4 class="mb-5"><strong>Latest posts</strong></h4>
            <div class="row">
            <?php while($row = mysqli_fetch_array($result)) { ?>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                          <a href="posts.php?IDblog=<?php echo $row['IDblog']; ?>">
                            <h5 class="card-title"><?php echo $row['blogTitle']; ?></h5>
                            <p class="card-text">
                            By  <?php echo $row['user']; ?>
                            </p>
                            <p class="card-text">
                            Posted  <?php echo date('D. M. d', strtotime($row['blogDateTime'])); ?>
                            </p>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </section>
      <!-- Section: Content -->
        </div>
    </main>

</body>
</html>