<?php
session_start();

//call the userFunction page
include_once ('lib/functions/userFunctions.php');

if(isset($_POST['login-btn'])){
//call the authentication function
$result = Authentication($_POST['login_username'],$_POST['login_password']);

echo ($result);
}

//iclude navbar
include_once ('layout/indexNavbar.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Index Page</title>

    <!-- bootstrap linking -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- jquery and js linking -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
    body {
        background-image: url('images/pharmacy_bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed; 
    }
    </style>

</head>

<body>



<section class="vh-10">

  <div class="container py-5 h-150">
    <div class="row d-flex justify-content-center align-items-center">

      <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">


                <div class="card" style="opacity: 0.9;">
                    <h5 class="card-header card text-center">Login</h5>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="loginUsername">Enter Your E-Mail</label>
                                <input type="text" name="login_username" id="login_username"
                                    placeholder="example@mail.com" class="form-control">
                            </div>

                            <div class="form-group mt-4">
                                <label for="loginPassword">Enter Your Password</label>
                                <input type="password" name="login_password" id="login_password"
                                    placeholder="Password" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <input type="submit" value="Login" name="login-btn" id="login-btn"
                                    class="btn btn-primary">
                                    
                                <input type="reset" value="Clear All" name="clear-btn" id="login-btn"
                                    class="btn btn-outline-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
    </div>
</body>

</html>