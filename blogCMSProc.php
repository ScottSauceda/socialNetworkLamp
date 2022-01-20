<?php
    require_once("conn/connSocial.php");
    $mbrID = $_POST['blogAuthor']; // this value is mbrID
    $blogTitle = $_POST['blogTitle'];
    $blogTitle = mysqli_real_escape_string($conn, $blogTitle);


    $blogEntry = $_POST['blogEntry'];
    $blogEntry = mysqli_real_escape_string($conn, $blogEntry);

    // save the blog entry to the blogs table:
    $query = "INSERT INTO blogs(blogTitle, blogEntry, mbrID) VALUES('$blogTitle', '$blogEntry', '$mbrID')";

    mysqli_query($conn, $query);

    header("Location: showAllPosts.php"); // bye-bye

?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Blog CMS Processor</title>
    <link href="css/app.css" rel="stylesheet">
</head>
    
<body>
    <h1 align="center" style="color:white">
        <?php
            if($itWorked == 1) {
                echo 'Congrats! Blog Saved Successfully!<br/><br/>
                      <a href="blog.php">Take Me to My Blog!</a>';
            } else {
                echo 'Sorry! Couldn\'t Save Blog!<br/><br/>';
            }
        ?>
    </h1>
</body>

</html>