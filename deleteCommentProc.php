<?php

    require_once("conn/connSocial.php");

    $commentID = $_GET['commentID'];


    $query = "DELETE FROM comments WHERE IDcomment = '$commentID'";
    
    mysqli_query($conn, $query);

    $itWorked = mysqli_affected_rows($conn);




?>