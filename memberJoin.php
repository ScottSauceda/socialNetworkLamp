<?php
    include 'includes/authenticate-user.php'; 
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>
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
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h5>
<!-- Login Form -->
<form  method="post" action="memberJoinProc.php" onsubmit="return validatePasswords()" >
                            <div class="form-group">
                                <input class="form-control" type="text" name="firstName" placeholder="First Name" required />
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="form-control" type="text" name="lastName" placeholder="Last Name" required />
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email" required />
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="form-control" type="text" name="user" placeholder="Username" required />
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="form-control" type="password" name="pswd" id="pswd" placeholder="Password" required />
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="form-control" ype="password" name="pswd2" id="pswd2" placeholder="Re-Enter Password" required />
                            </div>
                            <br>
                            <div class="col text-center">
                                <input type = "submit" name = "submit" class="btn btn-primary btn-login text-uppercase fw-bold" value = "Sign Up" >
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/apts.js"></script>
</body>
</html>