<?php

session_start();

//verify users
if(!isset($_SESSION['loginId'])){
    //redirect user backto login interface 
    header('location:../../../index.php');
}

//include db con
include_once('../../functions/db_conn.php')

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Page</title>

    <!-- link bootstrap-->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../css/invoice.css">

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
            <li class="breadcrumb-item active" aria-current="page">List Items</li>
        </ol>
    </nav>

    <div class="container mt-4" style="opacity: 0.9;">
        <div class="card" style="opacity: 0.9;">
            <div class="card-header">
                Add Items
            </div>
            <div class="card-body">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Barcode / Medicine ID</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Add</th>
                        </tr>
                    </thead>

                    <tbody>
                        <form action="../../route/invoice/itemList.php" method="POST">
                            <td><input type="text" id="barcode" name="barcode" placeholder="Barcode or Medicine ID">
                            </td>
                            <td><input type="text" id="name" name="qty" placeholder="Tablets"> </td>
                            <td>
                                <input type="submit" value="Add" class="btn btn-primary">
                            </td>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container mt-5" style="opacity: 0.9;">
        <div class="card" style="opacity: 0.9;">
            <div class="card-header">
                Total Items
            </div>
            <div class="card-body">


                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Barcode / Medicine ID</th>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">Tablets</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- item_temp table -->

                        <?php

                            //db connection
                            $db_conn = Connection();
                            $query = "SELECT item_temp.barcode,medicine_tbl.med_name,item_temp.qty FROM item_temp,medicine_tbl WHERE item_temp.barcode = medicine_tbl.barcode;";
                            $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                        ?>
                        <tr>
                            <th scope="row"> <?php echo $row['0'] ?> </th>
                            <td> <?php echo $row['1'] ?> </td>
                            <td> <?php echo $row['2']?> </td>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div>


    <div class="container mt-5">
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-danger btn-lg"
                onClick="document.location.href='../../route/invoice/clearList.php'">Clear List
            </button>
            <button type="button" class="btn btn-warning btn-lg"
                onClick="document.location.href='invoiceWithoutUpdate.php'">Get Invoice Without Updating Stock
            </button>
            <button type="button" class="btn btn-success btn-lg"
                onClick="document.location.href='invoiceFormAdd.php'">Get Invoice
            </button>
        </div>
    </div>

    <!-- jquery and js linking -->
    <script src="../../../js/jquery.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
</body>