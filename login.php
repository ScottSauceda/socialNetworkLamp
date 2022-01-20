<?php

    if(!isset($_SESSION)) { // if no session running, start one
        session_start(); // this allows us to declare $_SESSION vars
    }

    require_once("conn/connSocial.php");

    $msg = "Log In"; // for feedback
    $msg2 = '<a href="memberJoin.php" class="nav-item nav-link">Sign Up</a>';

    // if the URL var submit exists, form was submitted
    if(isset($_GET['loginSubmit'])) {

        // run this code to process the login form below. do not let the code run until the user submits the form or else the page will break. hand off the form to regualr vars;
        $user = $_GET['user'];
        $pswd = $_GET['pswd'];

        // check the DB to see if this memebr exists
        // only check by username, since pswd is hashed (60+ chars)
        // $query = "SELECT * FROM members. images WHERE members.IDmbr = images.foreignID and catID=3 AND isMainPic=1 AND user = '$user'";

        $query = "SELECT * FROM members WHERE  user = '$user'";



        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_array($result); // only one result, max

        if(mysqli_num_rows($result)==1){ // if user exists

            // now that we know this user exists, check the pswd
            // if pswd entered by user matches hash translated
            $dbPswd = $row['pswd'];
            if(password_verify($pswd, $dbPswd)) { // if success

                // provide a Log Out link
                // clicking Log Out runs the
                // session_destroy() method
                $msg = '<a href="' . $_SERVER['PHP-SELF'] . '?logout=yep" class="nav-item nav-link" >Log Out</a>';


                // declare some session variables to authenticate the user and provide personalized greetings on each page
                $_SESSION['user'] = $row['user'];
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                $_SESSION['IDmbr'] = $row['IDmbr'];
                $_SESSION['isAdmin'] = $row['isAdmin']; // admin status : 1 = yes, 0 = no
                

                $_SESSION['imgName'] = $row['imgName'];
                $msg .= "";

                header("Location: https://socialnetwork-lamp.herokuapp.com/showAllPosts.php"); // bye-bye
  
            } else {
                $msg = "Password or Username Incorrect";
            }

        } else { // no results found (that user does not exist)
            $msg = "Password or Username Incorrect";
        }

    } // end if(isset($_GET['submit']))


?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log In</title>
     <!-- boot strap core css -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    <?php include 'includes/navLogInLogOut.php'; ?>
    <div class = "container "> 
        <div class = "row ">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5 ">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Please Sign In</h5>
                        <form method = "get" action = "<?php echo $_SERVER['PHP-SELF']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="user" name="user"  placeholder = "Enter Username">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pswd" name ="pswd" placeholder = "Enter Password">
                        </div>
                        <div class="form-group form-check"></div>
                        <div class="col text-center">
                                                        <input type = "submit" name = "loginSubmit" class="btn btn-primary btn-login text-uppercase fw-bold" value = "Sign In" >
                                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>