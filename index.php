<?php
    require_once("conn/connSocial.php");


// $firstName = $_GET['firstName'];

// posts
$query = "SELECT * FROM blogs ORDER BY blogDateTime";
$result = mysqli_query($conn, $query);

// members
// $query2 = "SELECT * FROM members ORDER BY joinTime";
// $result2 = mysqli_query($conn, $query2);

// // comments
// $query3 = "SELECT * FROM comments ORDER BY commentTime";
// $result3 = mysqli_query($conn, $query3);

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
        You have successfully reached Index.php in test folder of HTDOCS
    </p>

    <div>
        <?php
            while($row=mysqli_fetch_array($result)) {
                    echo '<p>'. $row['IDblog'] . ' : ' . $row['blogTitle'] . ' : ' . $row['blogEntry'] . ' : ' . $row['mbrID'] . '</p>';
                }
        ?>
    </div>
    
</body>
</html>

<!--

    clearDB for tutorialdeploy
    mysql://bd34aec9c1adb3:c9d8a168@us-cdbr-east-05.cleardb.net/heroku_314bba18224465f?reconnect=true

    Username : bd34aec9c1adb3
    Password : c9d8a168
    Host : us-cdbr-east-05.cleardb.net

 -->
