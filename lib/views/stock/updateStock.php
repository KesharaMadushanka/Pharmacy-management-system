<?php 

//include db conn
include_once('../../functions/db_conn.php');



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>

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
            <li class="breadcrumb-item active" aria-current="page">Update Stock</li>
        </ol>
    </nav>

    <div class="container mt-4" style="opacity: 0.9;">
        <div class="card" style="opacity: 0.9;">
            <div class="card-header">
                Update Stock
            </div>
            <div class="card-body">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Barcode</th>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">New Box Amounts</th>
                            <th scope="col">Price</th>
                            <th scope="col">Expire Date</th>
                            <th scope="col">Update</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db_conn = Connection();

                        $query = "SELECT barcode,med_name FROM medicine_tbl";
                        $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                        <tr>
                            <th scope="row"> <?php echo $row['barcode'] ?> </th>
                            <td> <?php echo $row['med_name'] ?> </td>
                            
                            <form action="../../route/stock/updateStock.php" method="POST">
                                <td><input type="text" name="boxes" placeholder="Enter amount of boxes"></td>
                                <td><input type="text" name="price" placeholder="Enter Total Bill"></td>
                                <td><input type="date" name="exp"> </td>
                                <td><input type="hidden" name="barcode" value="<?php echo $row['barcode']?>">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </td>
                            </form>

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