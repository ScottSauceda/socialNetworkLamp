<?php

    require_once("conn/connSocial.php");
    $thumbNum = $_GET['thumbNum'];
    $commentID = $_GET['commentID'];
    $thumbCount = 0; // stores the thumbsUp/Down value from the DB

    if($thumbNum == 1) { // thumbNum is 1 if the vote is thumbs up
        $query = "SELECT thumbsUp FROM comments WHERE IDcomment = '$commentID'";
    } else { // thumbNum = 2, the vote is thumbs down
        $query = "SELECT thumbsDOWN FROM comments WHERE IDcomment = '$commentID'";
    }
    
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if($thumbNum == 1) { // thumbNum is 1 if the vote is thumbs up
        $thumbCount = $row['thumbsUp']; // the vote ttoal in the DB
        $thumbCount++; // thumbs up vote total increased by 1
    } else { // thumbNum = 2, the vote is thumbs down
        $thumbCount = $row['thumbsDown']; // the vote total in the DB
        $thumbCount++; // thumbs down vote total increased by 1        
    }

    if($thumbNum == 1){
        $query2 = "UPDATE comments SET thumbsUp = '$thumbCount' WHERE IDcomment = '$commentID'";
    } else {
        $query2 = "UPDATE comments SET thumbsDown = '$thumbCount' WHERE IDcomment = '$commentID'";
    }
    mysqli_query($conn, $query2);

    echo $thumbCount;

?>

