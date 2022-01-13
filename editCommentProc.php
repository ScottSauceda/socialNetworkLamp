<?php
    require_once("conn/connSocial.php");

    $comment = $_GET['comment'];
    $commentID = $_GET['commentID'];

    $query = "UPDATE comments SET comment = '$comment' WHERE IDcomment = '$commentID'";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT comment FROM comments WHERE IDcomment = '$commentID'";

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
