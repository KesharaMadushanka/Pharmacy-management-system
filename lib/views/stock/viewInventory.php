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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Stock</title>

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
            <li class="breadcrumb-item active" aria-current="page">View Inventory</li>
        </ol>
    </nav>

    <div class="container mt-4" style="opacity: 0.9;">
        <div class="card" style="opacity: 0.9;">
            <div class="card-header">
                Inventory
            </div>
            <div class="card-body">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Barcode / Medicine ID</th>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">Boxes</th>
                            <th scope="col">Tablets</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db_conn = Connection();

                        $query = "SELECT medicine_inventory.barcode,medicine_tbl.med_name,medicine_inventory.total_boxes,medicine_inventory.total_tablets
                        FROM medicine_inventory INNER JOIN  medicine_tbl ON medicine_inventory.barcode = medicine_tbl.barcode;";
                        
                        $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                        <tr>
                            <th scope="row"> <?php echo $row['barcode'] ?> </th>
                            <td> <?php echo $row['med_name'] ?> </td>
                            <td> <?php echo $row['total_boxes'] ?> </td>
                            <td> <?php echo $row['total_tablets'] ?> </td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="userID" value="<?php echo $row['barcode']?>">
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

</body>

<!-- jquery and js linking -->
<script src="../../../js/jquery.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

</html>