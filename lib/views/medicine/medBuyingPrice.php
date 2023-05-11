<?php 

//include db connection
include_once ('../../functions/db_conn.php');


?>


    <!--<div class="container-fluid mt-4" style="opacity: 0.9;">-->

        <div class="card" style="opacity: 0.9;">
            <div class="card-header">
                Medicine Price List
            </div>
            <div class="card-body">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">Tablet Buying Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db_conn = Connection();

                        $query = "SELECT med_name,buying_price FROM medicine_tbl;";
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

    <!-- jquery and js linking -->
    <script src="../../../js/jquery.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>



</body>


</html>