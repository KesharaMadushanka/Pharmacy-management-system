<?php

include_once('../../functions/db_conn.php');


?>

<div class="card" style="opacity: 0.9;">
    <div class="card" style="opacity: 0.9;">
        <div class="card-header">
            Total Sales
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Invoice No.</th>
                        <th scope="col">Income</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db_conn = Connection();

                        $query = "SELECT * FROM invoice_tbl;";
                        $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                    <tr>
                        <th scope="row"> <?php echo $row['0'] ?> </th>
                        <td>Rs. <?php echo $row['1'] ?> </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
        </div>
    </div>
</div>
</div>
