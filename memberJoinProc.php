<!DOCTYPE html>
<html lang="en-us">

<head>

    <meta charset="utf-8">
    <title>Member Join Processor</title>
    
    <?php
    
    // connect to MySQL as a whole (pg. 29)
    require_once("conn/connSocial.php");

    // handle the incoming form vars from memberJoin.php
    // see book pg 28-29
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];    
    $user = $_POST['user']; 
    $pswd = $_POST['pswd'];
    
    // last name suitable for outputting to this page
    $lastNameForOutput = $lastName;
    
    // escape any apostrophes in the last name: O'Neal becomes O\'Neal
    $lastName = mysqli_real_escape_string($conn, $lastName);

    // hash pswd (turn into 60+ chars of gibberish)
    // ex: 5adgssdWaf98wetasdgaytaDFharea4w74fae
    $hashedPswd = password_hash($pswd, PASSWORD_DEFAULT);
    
    // ***###*** This query is an example of the 
    // "C" in CRUD (Create, Read, Update, Delete) ***###
    // query the database to create a new member
    $query = "INSERT INTO members(firstName, lastName, email, user, pswd, memberProfilePic, isAdmin ) VALUES('$firstName', '$lastName', '$email', '$user', '$hashedPswd', 'default.jpg', 0)";

    // execute the query (make a new record in members)
    mysqli_query($conn, $query);

    // did it work? if so returned a 1, else returned a -1
    $registered = mysqli_affected_rows($conn);

    $msg = ""; // a feedback msg for reg success / failure

    if($registered == 1) { // if member registration worked
        
        // welcome new member and redirect to login.php
        $msg = "Welcome, " . $firstName . "! Thanks for joining! You will now be redirected to the log in page.";
        
        // return the primary key ID of this new member
        $IDmbr = mysqli_insert_id($conn);
        
        // make a default image record in images for this new member
        $query_images = "INSERT into images(imgName, foreignID, catID, isMainPic) VALUES('cat.jpg', $IDmbr, 3, 1)";
        
        mysqli_query($conn, $query_images);
        
        // wait 5 seconds before redirecting
        header("Refresh:5; url=login.php", true, 303);
        
    } else {
        
        $msg = "Sorry! Coundn't Sign You Up!";
        
        // wait 3 sec before redirecting
        header("Refresh:3; url=index.php", true, 303);
        
    } // end if($registered == 1) else
?>
    
</head>
    
<body>
    
      <!-- see book pg 29 -->
      <h1 align="center">
          
            <?php 
          
                echo $msg;
            ?>
          
      </h1>
    
</body>

</html>