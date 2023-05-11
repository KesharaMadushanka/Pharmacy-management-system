<?php

session_start();

//verify users
if(!isset($_SESSION['loginId'])){
    //redirect user backto login interface 
    header('location:../../../index.php');
}

include_once('../../functions/db_conn.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Login Details</title>

    <!-- link bootstrap-->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">

    <style>
    body {
        background-image: url('../../../images/pharmacy_admin_bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .breadcrumb {
        background: #eeeded;
        padding: 0 500px 0 10px !important;
        font-size: 17px;
        line-height: 3em;
    }
    </style>

</head>

<body>

    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-dark ">
            <li class="breadcrumb-item "><a href="../admin.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Login</li>
        </ol>
    </nav>

    <div class="container" style="opacity: 0.9;">
        <div class="card mt-5" style="opacity: 0.9;">
            <div class="card-header">
                Edit Login
            </div>
            <div class="card-body">
                <?php
                $id = $_POST['userID'];
                $db_conn = Connection();

                $query = "SELECT * FROM login_table WHERE login_id = '$id';";
                $queryRun = mysqli_query($db_conn,$query);

                while($row = mysqli_fetch_array($queryRun)){
                    ?>

                <form id="edit_form">
                    <div class="form-group mt-2">
                        <label for="">User ID</label>
                        <input type="text" id="userId" value="<?php echo $row['login_id']; ?>" name="userId"
                            class="form-control" placeholder="Enter User ID" readonly>
                    </div>

                    <div class="form-group mt-2">
                        <label for="">User Email</label>
                        <input type="email" id="userEmail" value="<?php echo $row['user_email']; ?>" name="userEmail"
                            class="form-control" placeholder="Enter User Email">
                    </div>
                    <div class="form-group mt-2">
                    <label for="">Account Status</label>
                    
                        <select class="form-select" aria-label="Account Status" id="loginStatus" name="loginStatus">
                        <?php if($row['login_status'] == 1){
                            ?>
                            <option value="1" selected>Active</option>
                            <option value="0">Deactive</option>
                        </select>
                            <?php
                        } else{
                            ?>
                            <option value="1">Active</option>
                            <option value="0" selected>Deactive</option>
                            </select>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-group mt-2">
                    <label for="">Login Role</label>
                    
                        <select class="form-select" aria-label="Login Role" id="loginRole" name="loginRole">
                        <?php if($row['login_role'] == 'admin'){
                            ?>
                            <option value="1"selected >Admin</option>
                            <option value="2">Employee</option>
                            <option value="3r">User</option>
                        </select>
                            <?php
                        } elseif($row['login_role'] == 'employee'){
                            ?>
                            <option value="1">Admin</option>
                            <option value="2"selected>Employee</option>
                            <option value="3">User</option>
                            </select>
                            <?php
                        } else {
                            ?>
                            <option value="1">Admin</option>
                            <option value="2">Employee</option>
                            <option value="3"selected>User</option>
                            </select>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" value="Update Details" class="btn btn-success" onclick="return false"
                            id="editBtn">
                        <a href="../admin.php" class="btn btn-danger">Back</a>
                    </div>
                </form>

                <?php    
                }
                ?>
            </div>
        </div>
    </div>





</body>

</html>

<!-- jquery and js linking -->
<script src="../../../js/jquery.js"></script>
<script src="../../../js/bootstrap.min.js"></script>


<script>
$(document).on('click', '#editBtn', function(event) {
    var userEmail = $('#loginEmail').val();
    var loginStatus = $('#loginStatus').val();
    var LoginRole = $('#loginRole').val();

    //empty checking
    if (userEmail == "") {
        alert("Please fill E Mail");
    } else {
        event.preventDefault();
        var form = $('#edit_form')[0];
        var formData = new FormData(form);
        $.ajax({
            url: "../../route/emp/loginManagement.php",
            data: formData,
            type: "POST",
            processData: false,
            contentType: false,

            success: function(data) {
                if (data == 0) {
                    alert("Error! Data not updated");
                } else {
                    alert("Data successfully updated!");
                    location.reload();
                }
            }
        })
    }
})
</script>