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
            Manage Login
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Login ID</th>
                        <th scope="col">Login Name</th>
                        <th scope="col">Account Status</th>
                        <th scope="col">Login Role</th>
                        <th scope="col">Edit Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db_conn = Connection();

                        $query = "SELECT * FROM login_table;";
                        $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                    <tr>
                        <th scope="row"> <?php echo $row['login_id'] ?> </th>
                        <td> <?php echo $row['user_email'] ?> </td>
                        <td> <?php if($row['login_status'] == 1){
                            echo "Active";
                        } else {
                            echo "Deactivated";
                        } ?> 
                        </td>
                        <td> <?php echo $row['login_role'] ?> </td>
                        <td>
                            <form action="../views/emp/editLogin.php" method="POST">
                                <input type="hidden" name="userID" value="<?php echo $row['login_id']?>">
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