<?php
    require_once("conn/connSocial.php");

    $user = $_GET['user'];
    $commenterID = $_GET['commenterID'];
    $blogID = $_GET['blogID'];
    $comment = $_GET['comment'];

    $query = "INSERT INTO comments(comment, IDmbr, IDblog, thumbsUp, thumbsDown) VALUES ('$comment', '$commenterID', '$blogID', 0, 0)";
    mysqli_query($conn, $query);

    $query2 = "SELECT IDcomment, commentTime FROM comments WHERE IDmbr = '$userID' AND blogID = '$blogID' ORDER BY IDcomment DESC LIMIT 1";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);
    $commentID = $row2['IDcomment'];
    $commentTime = $row2['commentTime'];
    $commentTimeStr = strtotime($commentTime); // timestamp to string

    
    $newCommentPost = '<td align = "center"><br>' . $usernameComment . '</td>
                        <td><a href="#" onclick="thumbVote(1, ' . $commentID . ')"><img style="width:50px;height:50px" src="images/arrowUp.png"></a>
                        <strong id="' . $upID . '">' . $thumbsUp . '</strong>
                        <br>
                        <a href="#" onclick="thumbVote(2, ' . $commentID . ')"><img style="width:50px;height:50px" src="images/arrowDown.png"></a>
                        <strong id="' . $downID . '">' . $thumbsDown . '</strong></td>
                        <td align = "left" >'  . $comment . '</td><br>';
    
    $ajaxCommentPost = '<div class="d-flex flex-row mb-2" > <img src = "images/members/' . $profilePic . '" width="40" class="rounded-image">&nbsp;&nbsp;<div class="d-flex flex-column ml-2"><span class="name">' . $usernameComment . '</span> <small id="' . $commentText . '" class="comment-text">'  . $comment . '</small>
    <div class="d-flex flex-row align-items-center status"> 
    <small class = "commentButtons"
    onclick="thumbVote(1, ' . $commentID . ')"
    >Like</small>
    <small><strong id="' . $upID . '">' . $thumbsUp . '</strong></small>
    </div>
    </div>
    </div>';

    echo $ajaxCommentPost ;

?>