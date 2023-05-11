<?php

include_once('../../functions/db_conn.php');


?>

<div class="card" style="opacity: 0.9;">
    <div class="card" style="opacity: 0.9;">
        <div class="card-header">
            Sort Stock by Boxes
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Medicine Name</th>
                        <th scope="col">Amount of Boxes</th>
                        <th scope="col">Amount of Tablets</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db_conn = Connection();

                        //boxes more than 5
                        $quary = "SELECT DISTINCT medicine_tbl.med_name,medicine_inventory.total_boxes,medicine_inventory.total_tablets FROM medicine_inventory,medicine_tbl 
                        WHERE medicine_inventory.barcode = medicine_tbl.barcode AND medicine_inventory.total_boxes > 5 ORDER BY medicine_inventory.total_boxes ASC;";
                        $results = mysqli_query($db_conn,$quary);

                        
                        //boxes less than 5 in red color
                        $queryRed = "SELECT DISTINCT medicine_tbl.med_name,medicine_inventory.total_boxes,medicine_inventory.total_tablets FROM medicine_inventory,medicine_tbl 
                        WHERE medicine_inventory.barcode = medicine_tbl.barcode AND medicine_inventory.total_boxes <= 5 ORDER BY medicine_inventory.total_boxes ASC;";
                        $query_run = mysqli_query($db_conn,$queryRed);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                    <tr class="table-danger">
                        <th scope="row"> <?php echo $row['0']; ?> </th>
                        <th scope="row"><?php echo $row['1']; ?> </th>
                        <th scope="row"> <?php echo $row['2']; ?> </th>
                    </tr>
                    <?php
                        }
                    ?>
                    <?php
                        while ($fetch = mysqli_fetch_array($results)){
                            ?>
                    <tr class="table-light">
                        <th scope="row"> <?php echo $fetch['0']; ?> </th>
                        <th scope="row"><?php echo $fetch['1']; ?> </th>
                        <th scope="row"> <?php echo $fetch['2']; ?> </th>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
        </div>
    </div>
</div>
</div>