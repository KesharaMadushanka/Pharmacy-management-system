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
    <title>Edit EMP</title>

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
            <li class="breadcrumb-item active" aria-current="page">Edit Emp</li>
        </ol>
    </nav>

    <div class="container" style="opacity: 0.9;">
        <div class="card mt-5" style="opacity: 0.9;">
            <div class="card-header">
                Edit EMP
            </div>
            <div class="card-body">
                <?php
                $id = $_POST['userID'];
                $db_conn = Connection();

                $query = "SELECT * FROM emp_tbl WHERE emp_id = '$id';";
                $queryRun = mysqli_query($db_conn,$query);

                while($row = mysqli_fetch_array($queryRun)){
                    ?>

                <form id="edit_form">
                    <div class="form-group mt-2">
                        <label for="">EMP ID</label>
                        <input type="text" id="empId" value="<?php echo $row['emp_id']; ?>" name="empId"
                            class="form-control" placeholder="Enter EMP ID" readonly>
                    </div>

                    <div class="form-group mt-2">
                        <label for="">EMP Name</label>
                        <input type="text" id="empName" value="<?php echo $row['emp_name']; ?>" name="empName"
                            class="form-control" placeholder="Enter EMP Name">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">EMP Email</label>
                        <input type="email" id="empEmail" value="<?php echo $row['emp_email']; ?>" name="empEmail"
                            class="form-control" placeholder="Enter EMP Email">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">EMP NIC</label>
                        <input type="text" id="empNic" value="<?php echo $row['emp_nic']; ?>" name="empNic"
                            class="form-control" placeholder="Enter EMP NIC">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">EMP Tel</label>
                        <input type="text" id="empTel" value="<?php echo $row['emp_tel']; ?>" name="empTel"
                            class="form-control" placeholder="Enter EMP Phone Number">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">EMP DOB</label>
                        <input type="date" id="empDob" value="<?php echo $row['emp_dob']; ?>" name="empDob"
                            class="form-control" placeholder="Enter EMP DOB">
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
    var empName = $('#empName').val();
    var empEmail = $('#empEmail').val();
    var empNic = $('#empNic').val();
    var empTel = $('#empTel').val();
    var empDob = $('#empDob').val();

    //empty checking
    if (empName == "" || empEmail == "" || empNic == "" || empTel == "" || empDob == "") {
        alert("Please fill all the input fields!");
    } else {
        event.preventDefault();
        var form = $('#edit_form')[0];
        var formData = new FormData(form);
        $.ajax({
            url: "../../route/emp/editEmp.php",
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