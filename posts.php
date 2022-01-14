<?php

    require_once("conn/connSocial.php");

    include 'includes/authenticate-user.php';


    // $bloggerID = 5;
    // load all blogs along w correct members and their pics
    $IDblog = $_GET['IDblog'];
    $query = "SELECT * FROM blogs, members WHERE blogs.mbrID = members.IDmbr AND IDblog = '$IDblog'";
    // $query = "SELECT * FROM blogs WHERE mbrID='$bloggerID' ORDER BY IDblog DESC";

    $result = mysqli_query($conn, $query);

    // peel off the first row -- the most recent blog
    $row = mysqli_fetch_array($result);

    $blogID = $row['IDblog']; // current blog ID, from the above query
    // load comments for the current blog entry only
    // <?php echo $blogID; 
    $query2 = "SELECT * FROM comments, members WHERE comments.IDmbr = members.IDmbr AND comments.IDblog = $blogID ORDER BY commentTime DESC";
    $result2 = mysqli_query($conn, $query2) or die ("Couldn't execute query2!");

    $username = $_SESSION['user'];
    $commenterID = $_SESSION['IDmbr']
    // $memberProfilePic = $_SESSION['memberProfilePic'];

    
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post</title>
         <!-- boot strap core css -->
<!-- CSS only -->
<link href = "css/blog.css" rel = "stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
 <?php include 'includes/navLogInLogOut.php'; ?>
 <div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex justify-content-between p-2 px-3">
                    <div class="d-flex flex-row align-items-center"> <img src="images/members/<?php echo $row['memberProfilePic'] ?>" width="50" class="rounded-circle">&nbsp;&nbsp;
                        <div class="d-flex flex-column ml-2"> <span class="name"><?php echo $row['user'] ?></span> <small class="text-primary"><?php echo $row['blogTitle']; ?></small> </div>
                    </div>
                    <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"> <?php echo date('D. M. d, Y', strtotime($row['blogDateTime'])); ?></small>  </div>
                </div> 
                <div class="p-2">
                    <p class="text-justify"><?php echo $row['blogEntry']; ?></p>
                    
                    <!-- add comment section -->

                    <div class="comment-input">
                        <form id = "form1" name = "form1"" method = "post" action = "https://socialnetwork-lamp.herokuapp.com/commentsAjaxProc.php">
                            <input type = "hidden" name = "user" id = "user" value = "<?php echo $username; ?>">
                            <input type = "hidden" name = "commenterID" id = "commenterID" value = "<?php echo $commenterID; ?>">
                            <input type = "hidden" name = "blogID" id = "blogID" value = "<?php echo $blogID; ?>" />
                            <input type="text" class="form-control" name="comment" id = "comment" style="margin-bottom:1em;">
                            <div class="col text-left"><input type = "submit" name = "submit" id = "submit"  class=" btn-primary " value = "Post Comment" onClick="ajaxAddComment()" /></div>
                        </form>
                    </div>
            <br>

                    <!-- comment section -->
                    <div id = "commentDiv">
                    <?php while($row2 = mysqli_fetch_array($result2)){
                        $commentID = $row2['IDcomment'];
                        $comment = $row2['comment'];
                        $profilePic = $row2['memberProfilePic'];
                        $usernameComment = $row2['user'];

                        $formID = "form" . $commentID;
                        $btnID = "button" . $commentID;

                        $upID = "up" . $commentID; // example: up48
                        $downID = "down" . $commentID; // example: down23
                        $thumbsUp = $row2['thumbsUp'];
                        $thumbsDown = $row2['thumbsDown'];
                        $commentText = "text" . $commentID;

                        if($_SESSION['user'] === $usernameComment){
                            $msg = '<small id="'. $btnID .'" class = "commentButtons" onclick="toggleEdit(' . $commentID . ')" >Edit</small> 
                            <small class = "commentButtons" onclick="deleteComment(' . $commentID . ')" >Delete</small>';


                            $editTable = '<form id = "' . $formID . '" name = "form2" style="display:none" method = "post" >
                            <input type = "hidden" name = "commentID" id = "commentID" value = "' . $commentID . '" />
                                    <input name="comment" id = "comment" cols = "20" rows = "4" value = "'. $comment .'">
                                    <input type = "submit" name = "submit" id = "submitEdit" class = "btn-primary" value = "Submit Edit" onClick="editComment()" />
                            </form>';
                        } else {
                            $msg = " ";
                            $editTable = " ";
                        }

                        $userOutput = '<div class="d-flex flex-row mb-2" > <img src = "images/members/' . $profilePic . '" width="40" class="rounded-image">&nbsp;&nbsp;<div class="d-flex flex-column ml-2"><span class="name">' . $usernameComment . '</span> <small id="' . $commentText . '" class="comment-text">'  . $comment . '</small>
                        <div class="d-flex flex-row align-items-center status"> 
                        <small class = "commentButtons"
                        onclick="thumbVote(1, ' . $commentID . ')"
                        >Like</small>
                        <small><strong id="' . $upID . '">' . $thumbsUp . '</strong></small>'
                        . $msg . $editTable . '
                        </div>
                        </div>
                        </div>';

                        echo $userOutput;

                    } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="js/apts.js"></script>
</body>
</html>