<?php

include_once('../../functions/db_conn.php');


?>

<div class="card" style="opacity: 0.9;">
    <div class="card" style="opacity: 0.9;">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">User Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db_conn = Connection();

                        $query = "SELECT user_id,user_name,user_email,user_tp FROM registration_table WHERE user_role = 'user';";
                        $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                    <tr>
                        <th scope="row"> <?php echo $row['0'] ?> </th>
                        <td> <?php echo $row['1'] ?> </td>
                        <td> <?php echo $row['2'] ?> </td>
                        <td> <?php echo $row['3'] ?> </td>
                        
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
        </div>
    </div>
</div>
</div>
