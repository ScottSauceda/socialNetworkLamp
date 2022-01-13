<?php
    require_once("conn/connSocial.php");


// $firstName = $_GET['firstName'];

// posts
$query = "SELECT * FROM blogs ORDER BY blogDateTime";
$result = mysqli_query($conn, $query);

// members
$query2 = "SELECT * FROM members ORDER BY joinTime";
$result2 = mysqli_query($conn, $query2);

// comments
$query3 = "SELECT * FROM comments ORDER BY commentTime";
$result3 = mysqli_query($conn, $query3);

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>home page</title>
</head>
<body>
    <p>
        <?php echo date("F jS, Y"); ?>
        <br/>
        You have successfully reached Index.php of the Social Network LAMP app.
    </p>

    <div>
        <?php
            while($row=mysqli_fetch_array($result)) {
                    echo '<p>'. $row['IDblog'] . ' : ' . $row['blogTitle'] . ' : ' . $row['blogEntry'] . ' : ' . $row['mbrID'] . '</p>';
                }
        ?>
    </div>

    <br>
    <br>
    
    <div>
        <?php
            while($row2=mysqli_fetch_array($result2)) {
                echo '<p>' . $row2['IDmbr'] . ' : ' . $row2['lastName'] . ' : ' . $row2['firstName'] . '  : ' . $row2['user'] . '</p>';
            }
        ?>
    </div>

    <!-- <br>
    <br>
    
    <div>
        <php
            while($row3=mysqli_fetch_array($result3)) {
                echo '<p>' . $row3['IDcomment'] . ' : ' . $row3['comment'] . ' : thumbsUp ' . $row3['thumbsUp'] . '  : thumbsDown ' . $row3['thumbsDown'] . '</p>';
            }
        ?>
    </div> -->

</body>
</html>

<!--

    clearDB for tutorialdeploy
    mysql://bd34aec9c1adb3:c9d8a168@us-cdbr-east-05.cleardb.net/heroku_314bba18224465f?reconnect=true

    Username : bd34aec9c1adb3
    Password : c9d8a168
    Host : us-cdbr-east-05.cleardb.net

 -->
