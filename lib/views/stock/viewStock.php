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
            <li class="breadcrumb-item active" aria-current="page">View Stock Records</li>
        </ol>
    </nav>

    <div class="container mt-4" style="opacity: 0.9;">
        <div class="card" style="opacity: 0.9;">
            <div class="card-header">
               Stock
            </div>
            <div class="card-body">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Stock ID</th>
                            <th scope="col">Barcode</th>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">Boxes</th>
                            <th scope="col">Tablets</th>
                            <th scope="col">EXP Date</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db_conn = Connection();

                        $query = "SELECT medicine_stock.stock_id,medicine_stock.barcode,medicine_tbl.med_name,medicine_stock.boxes,medicine_stock.tablets,medicine_stock.exp FROM medicine_stock INNER JOIN medicine_tbl 
                        ON medicine_stock.barcode = medicine_tbl.barcode;";
                        $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                            $bar=$row['barcode'];
                            ?>
                        <tr>
                            <th scope="row"> <?php echo $row['stock_id'] ?> </th>
                            <td> <?php echo $row['barcode'] ?> </td>
                            <td> <?php echo $row['med_name'] ?> </td>
                            <td> <?php echo $row['boxes'] ?> </td>
                            <td> <?php echo $row['tablets'] ?> </td>
                            <td> <?php echo $row['exp'] ?> </td>
                            <td><button class="btn btn-danger deleteBtn"
                                    id="<?php echo $row['stock_id'] ?>">Delete</button>
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

<script>
$(document).ready(function() {
    $(".deleteBtn").click(function() {
        event.preventDefault();
        var del = $(this).attr("id")
        $.ajax({
            method: "POST",
            url: "../../route/stock/deleteStock.php",
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

</html>