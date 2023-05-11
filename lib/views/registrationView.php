<?php

//call the userFunction page
include_once ('../functions/userFunctions.php');

//iclude navbar
include_once ('../../layout/registrationNavbar.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Index Page</title>

    <!-- bootstrap linking -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <!-- jquery and js linking -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <style>
    body {
        background-image: url('../../images/pharmacy_bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed; 
    }
    </style>

</head>

<body>


    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col-md-1">

            </div>

            <div class="col-md-10">
                <div class="container" style="margin-top:20px;">
                    <div class="card border-dark mb-3" style="opacity: 0.9;">
                        <h5 class="card-header text-center">Register</h5>
                        <div class="card-body">
                            <form action="../route/users/registration.php" method="post">
                                <div class="form-group">
                                    <label for="username">Enter Your Name</label>
                                    <input type="text" name="user_name" id="user_name" placeholder="Full Name"
                                        class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="email">Enter Your E-mail</label>
                                    <input type="email" name="user_email" id="user_email"
                                        placeholder="example@mail.com" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="password">Enter Your Password</label>
                                    <input type="password" name="user_password" id="user_password"
                                        placeholder="Password" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="phoneNumber">Enter Your Phone Number</label>
                                    <input type="text" name="user_phone" id="user_phone"
                                        placeholder="07X-XXXXXXX" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="userNIC">Enter Your NIC Number</label>
                                    <input type="text" name="user_nic" id="user_nic" placeholder="NIC Number"
                                        class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" value="Submit" name="btn_subimt" id="bt_submit"
                                        class="btn btn-outline-success">
                                    <input type="reset" value="Clear All" name="btn_reset" id="btn_reset"
                                        class="btn btn-outline-warning">
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>


        </div>


    </div>


</body>