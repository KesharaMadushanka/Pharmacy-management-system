<?php

//db conn include
include_once ("../../functions/db_conn.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>

    <!-- bootstrap linking -->
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
            <li class="breadcrumb-item active" aria-current="page">Search EMP</li>
        </ol>
    </nav>

    <div class="container mt-4" style="opacity: 0.9;">
        <div class="card" style="opacity: 0.9;">
            <div class="card-header">
                <h4>User Details</h4>
            </div>
            <div class="card-body">

                <?php
                $id = $_POST['empId'];
                //db connection
                $db_conn = Connection();
                $query = "SELECT * FROM emp_tbl WHERE emp_id = '$id';";
                $query_run = mysqli_query($db_conn,$query);
                $nor = mysqli_num_rows($query_run);
                
                //number of row count
                if($nor > 0){

                while($row = mysqli_fetch_array($query_run)){
                    ?>

                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Emp ID</th>
                            <th scope="col">Emp Name</th>
                            <th scope="col">Emp Email</th>
                            <th scope="col">Emp NIC</th>
                            <th scope="col">Emp Tel</th>
                            <th scope="col">Emp DOB</th>
                            <th scope="col">Delete Data</th>
                            <th scope="col">Edit Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"> <?php echo $row['emp_id'] ?> </th>
                            <td> <?php echo $row['emp_name'] ?> </td>
                            <td> <?php echo $row['emp_email'] ?> </td>
                            <td> <?php echo $row['emp_nic'] ?> </td>
                            <td> <?php echo $row['emp_tel'] ?> </td>
                            <td> <?php echo $row['emp_dob'] ?> </td>
                            <td><button class="btn btn-danger deleteBttn"
                                    id="<?php echo $row['emp_id'] ?>">Delete</button> </td>
                            <td>
                                <form action="editEmp.php" method="POST">
                                    <input type="hidden" name="userID" value="<?php echo $row['emp_id']?>">
                                    <input type="submit" value="Edit" class="btn btn-warning">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php
                }
            } else {
                ?>
                <h2 style="text-align:center; color:red">No Data Found!</h2>
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
$(document).ready(function() {
    $(".deleteBttn").click(function() {
        event.preventDefault();
        var del = $(this).attr("id")
        $.ajax({
            method: "POST",
            url: "../../route/emp/deleteUsers.php",
            data: {
                id: del
            },
            dataType: "html",
            success: function(data) {
                if (data == 1) {
                    alert("Data Deleted!");
                    location.reload();
                } else {
                    alert("Error!");
                }
            }

        })
    })
})
</script>