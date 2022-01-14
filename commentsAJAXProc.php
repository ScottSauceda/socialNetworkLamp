<?php
    require_once("conn/connSocial.php");

    $user = $_GET['user'];
    $commenterID = $_GET['commenterID'];
    $blogID = $_GET['blogID'];
    $comment = $_GET['comment'];

    $query = "INSERT INTO comments(comment, IDmbr, IDblog, thumbsUp, thumbsDown) VALUES ('$comment', '$commenterID', '$blogID', 0, 0)";
    mysqli_query($conn, $query);

    $query2 = "SELECT comment FROM comments WHERE comment = '$comment' AND IDblog = '$blogID' ORDER BY IDcomment DESC LIMIT 1";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);
    $commentDB = $row2['comment'];


    $itWorked = mysqli_affected_rows($conn);

    if($itWorked){
        echo $commentDB;
    } else {
        echo "something went wrong";
    }

?>