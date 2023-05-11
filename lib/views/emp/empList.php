<?php

session_start();

//verify users
if(!isset($_SESSION['loginId'])){
    //redirect user backto login interface 
    header('location:../../../index.php');
}

include_once('../../functions/db_conn.php');


?>

<div class="card" style="opacity: 0.9;">
    <div class="card" style="opacity: 0.9;">
        <div class="card-header">
            Manage EMP
        </div>
        <div class="card-body">
            <table class="table table-dark">
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
                    <?php
                        $db_conn = Connection();

                        $query = "SELECT * FROM emp_tbl;";
                        $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                    <tr>
                        <th scope="row"> <?php echo $row['emp_id'] ?> </th>
                        <td> <?php echo $row['emp_name'] ?> </td>
                        <td> <?php echo $row['emp_email'] ?> </td>
                        <td> <?php echo $row['emp_nic'] ?> </td>
                        <td> <?php echo $row['emp_tel'] ?> </td>
                        <td> <?php echo $row['emp_dob'] ?> </td>
                        <td><button class="btn btn-danger deleteBtn" id="<?php echo $row['emp_id'] ?>">Delete</button> </td>
                        <td>
                            <form action="emp/editEmp.php" method="POST">
                            <input type="hidden" name="userID" value="<?php echo $row['emp_id']?>">
                            <input type="submit" value="Edit" class="btn btn-warning">
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function(){
        $(".deleteBtn").click(function(){
            event.preventDefault();
            var del = $(this).attr("id")
            $.ajax({
                method:"POST",
                url: "../route/emp/deleteUsers.php",
                data: {id:del},
                dataType:"html",
                success: function(data){
                    if(data == 1){
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