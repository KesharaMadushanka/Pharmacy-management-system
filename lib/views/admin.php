<?php
session_start();

// //verify users
// if (!isset($_SESSION['loginId'])) {
//     //redirect user backto login interface 
//     header('location:../../index.php');
// }



//iclude userfunction
include_once('../functions/userFunctions.php');

//iclude navbar
include_once('../../layout/navbar.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Page</title>


    <!-- link bootstrap-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <style>
    body {
        background-image: url('../../images/pharmacy_admin_bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    </style>


</head>

<body>

    <!-- start cards-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8" id="loadView">
                <div class="row">
                    <div class="col-sm-6 mt-4">
                        <div class="card text-center bg-success"
                            style="opacity: 0.9;background: linear-gradient(45deg,#2ed8b6,#59e0c5);">
                            <div class="card-header">
                                Total Sales
                            </div>
                            <div class="card-body">

                                <h5 class="card-title"><b>Rs. <?php income(); ?></b></h5>
                                <p class="card-text"></p>
                                <a href="#" id="totalSales" class="btn btn-primary">More info</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-4">
                        <div class="card text-center bg-success"
                            style="opacity: 0.9;background: linear-gradient(45deg,#2ed8b6,#59e0c5);">
                            <div class="card-header">
                                Profit
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><b>Rs. <?php profit(); ?></b></h5>
                                <p class="card-text"></p>
                                <a href="#" id="profit" class="btn btn-primary">More info</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-4">
                        <div class="card text-center"
                            style="opacity: 0.9;background: linear-gradient(45deg,#FF5370,#ff869a);">
                            <div class="card-header">
                                Expired or Expiring Soon Medicines
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><b> <?php echo expCard(); ?> Stock(s) </b></h5>
                                <p class="card-text"></p>
                                <a href="#" id="exp" class="btn btn-primary">View List</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-4">
                        <div class="card text-center"
                            style="opacity: 0.9;background: linear-gradient(45deg,#FF5370,#ff869a);">
                            <div class="card-header">
                                Low Stock Medicines
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo lowStockCard(); ?> Medicine(s)</b></h5>
                                <p class="card-text"></p>
                                <a href="#" id="lowStock" class="btn btn-primary">View List</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-4">
                        <div class="card text-center"
                            style="opacity: 0.9;background: linear-gradient(45deg,#FFB64D,#ffcb80);">
                            <div class="card-header">
                                Registered Employees
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo empCard(); ?> Emolyees</b></h5>
                                <p class="card-text"></p>
                                <a href="#" id='empCard' class="btn btn-primary">View EMP List</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-4">
                        <div class="card text-center"
                            style="opacity: 0.9;background: linear-gradient(45deg,#FFB64D,#ffcb80);">
                            <div class="card-header">
                                Total Users
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo customerCard(); ?> Users</b></h5>
                                <p class="card-text-left"></p>
                                <a href="#" id="users" class="btn btn-primary">View List</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ends cards-->


            </div>

            <div class="col-md-1">

            </div>

            <div class="col-md-3">

                <div class="col-auto">
                    <button type="button" class="btn btn-primary btn-lg"
                        onClick="document.location.href='../views/stock/updateStock.php'">Update Stock</button>
                    <button type="button" class="btn btn-success btn-lg"
                        onClick="document.location.href='../views/invoice/invoiceForm.php'">Get Invoice</button>
                </div>


                <form action="emp/viewEmp.php" method="POST" class="row g-3 mt-4">

                    <div class="col-auto">
                        <label for="EMP Search" class="visually-hidden">EMP Serach</label>
                        <input class="form-control me-2" type="search" placeholder="Search by EMP ID" name="empId"
                            aria-label="Search">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success mb-1">Go</button>
                    </div>
                </form>

                <form action="medicine/searchMedicine.php" method="POST" class="row g-3">

                    <div class="col-auto">
                        <label for="Medicine Search" class="visually-hidden">Medicine Serach</label>
                        <input class="form-control me-2" type="search" placeholder="Search by Barcode" name="barcode"
                            aria-label="Search">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success mb-3">Go</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- jquery and js linking -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/adminPanel.js"></script>



</body>

</html>