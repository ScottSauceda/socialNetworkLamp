<?php

    require_once("conn/connSocial.php");

    $query = "SELECT * FROM members ORDER BY lastName";

    $result = mysqli_query($conn, $query);
    

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>home page</title>
</head>
<body>
    <h2>All members</h2>
    <div>
        <?php
            while($row=mysqli_fetch_array($result)) {
                echo '<option value="' . $row['IDmbr'] . '">' . $row['lastName'] . ', ' . $row['firstName'] . ' (' . $row['user'] . ')</option>';
            }
        ?>
    </div>
</body>
</html>