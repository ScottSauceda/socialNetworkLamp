<?php
    
    // start a session. This is required to look for user's session vars
    if(!isset($_SESSION)) {
        session_start();
    }


    // AUTHENTICATE THE USER: LET THEM STAY OR REDIRECT TO LOGIN PG
    // if user session var exists, let 'em stay, else boot 'em out
    if(isset($_SESSION['user'])) {
        

        $msg = '<a href="' . $_SERVER['PHP-SELF'] . '?logout=yep" class="nav-item nav-link">Log Out</a>';
        $msg2 = '<a href="https://socialnetwork-lamp.herokuapp.com/blogCMS.php" class="nav-item nav-link">Create Post</a>';
    } else { // no session var for user, redirect to login page

        $msg = 'Login';
        $msg2 = '<a href="https://socialnetwork-lamp.herokuapp.com/memberJoin.php" class="nav-item nav-link">Sign Up</a>';

    }

    // run if block IF Log Out was clicked
    if(isset($_GET['logout'])) {
        // end the session
        session_destroy();
   
        header("Location: https://socialnetwork-lamp.herokuapp.com/login.php"); // bye-bye
    }

?>

