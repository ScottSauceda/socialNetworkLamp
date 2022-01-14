<?php
    
    // start a session. This is required to look for user's session vars
    if(!isset($_SESSION)) {
        session_start();
    }

    // $currentPage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)

    // AUTHENTICATE THE USER: LET THEM STAY OR REDIRECT TO LOGIN PG
    // if user session var exists, let 'em stay, else boot 'em out
    if(isset($_SESSION['user'])) {
        

        $msg = '<a href="' . $_SERVER['PHP-SELF'] . '?logout=yep" class="nav-item nav-link">Log Out</a>';
        $msg2 = '<a href="blogCMS.php" class="nav-item nav-link">Create Post</a>';
    } else { // no session var for user, redirect to login page

        $msg = 'Login';
        $msg2 = '<a href="memberJoin.php" class="nav-item nav-link">Sign Up</a>';

    }

    // run if block IF Log Out was clicked
    if(isset($_GET['logout'])) {
        // end the session
        session_destroy();
        // redirect in 3, 2, 1...blast off
        // header("Refresh:3", true, 303);
        
        // $msg = "Login";
        // $msg2 = '<a href="memberJoin.php" class="nav-item nav-link">Sign Up</a>';
        header("Location: login.php"); // bye-bye
    }

?>

