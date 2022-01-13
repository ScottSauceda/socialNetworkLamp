<?php
    // book chapter 10: Blog CMS
    // query the members table for all members
    // this data will be used to make a select menu
    // for choosing the Author

    include 'includes/authenticate-user.php';

    require_once("conn/connSocial.php");

    $username = $_SESSION['user'];
    $query = "SELECT * FROM members WHERE user = '$username'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if(!$_SESSION['user']){
        header("Location: login.php"); // bye-bye
    }


?>

<!DOCTYPE html>
<html lang="en-us">

<head>

    <meta charset="utf-8">
    <title>Blog CMS</title>
    
    <link href="css/app.css" rel="stylesheet">
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
                        <h5 class="card-title text-center mb-5 fw-light fs-5"><?php echo $username ?></h5>
                        <form method="post" action="blogCMSProc.php">
                        <input type = "hidden" name="blogAuthor" id="blogAuthor" value = "<?php echo $row['IDmbr']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="blogTitle"  placeholder = "Enter Title">
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="blogEntry" rows="5"  placeholder="Enter Text" required></textarea>
                        </div>
                        <br>
                        <div class="col text-center">
                                                        <input type = "submit" name = "submit" class="btn btn-primary btn-login text-uppercase fw-bold" value = "Submit Post" >
                                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>