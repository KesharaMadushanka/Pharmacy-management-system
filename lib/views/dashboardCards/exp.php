<?php

include_once('../../functions/db_conn.php');


?>

<div class="card" style="opacity: 0.9;">
    <div class="card" style="opacity: 0.9;">
        <div class="card-header">
            Sort Stock by Expire Date
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Stock ID</th>
                        <th scope="col">Medicine Name</th>
                        <th scope="col">Amount of Boxes</th>
                        <th scope="col">Expire Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db_conn = Connection();

                        //sort expiring not soon
                        $quary = "SELECT medicine_stock.stock_id,medicine_tbl.med_name,medicine_stock.boxes,medicine_stock.exp FROM medicine_stock,medicine_tbl
                        WHERE medicine_stock.barcode = medicine_tbl.barcode AND DATEDIFF(exp,curdate()) > 14 ORDER BY medicine_stock.exp ASC;";
                        $results = mysqli_query($db_conn,$quary);

                        
                        //get expire within 14 days in red color
                        $queryRed = "SELECT medicine_stock.stock_id,medicine_tbl.med_name,medicine_stock.boxes,medicine_stock.exp FROM medicine_stock,medicine_tbl
                        WHERE medicine_stock.barcode = medicine_tbl.barcode AND DATEDIFF(exp,curdate()) <= 14 ORDER BY medicine_stock.exp ASC; ";
                        $query_run = mysqli_query($db_conn,$queryRed);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                    <tr class="table-danger">
                        <td> <?php echo $row['0']; ?> </td>
                        <td><?php echo $row['1']; ?> </td>
                        <td> <?php echo $row['2']; ?> </td>
                        <th scope="row"><?php echo $row['3']; ?> </th>
                    </tr>
                    <?php
                        }
                    ?>
                    <?php
                        while ($fetch = mysqli_fetch_array($results)){
                            ?>
                    <tr class="table-light">
                        <td> <?php echo $fetch['0']; ?> </td>
                        <td><?php echo $fetch['1']; ?> </td>
                        <td> <?php echo $fetch['2']; ?> </td>
                        <th scope="row"><?php echo $fetch['3']; ?> </th>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
        </div>
    </div>
</div>
</div>