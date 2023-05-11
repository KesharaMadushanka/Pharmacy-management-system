<?php 

session_start();

//verify users
if(!isset($_SESSION['loginId'])){
    //redirect user backto login interface 
    header('location:../../../index.php');
}

//include db connection
include_once ('../../functions/db_conn.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Medicines</title>

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
            <li class="breadcrumb-item active" aria-current="page">View Medicines</li>
        </ol>
    </nav>

    <div class="container-fluid mt-4" style="opacity: 0.9;">
        <div class="card" style="opacity: 0.9;">
            <div class="card-header">
                Manage Medicines
            </div>
            <div class="card-body">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Barcode</th>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">Generic Name</th>
                            <th scope="col">Strength (mg)</th>
                            <th scope="col">Tablets in a Single Box</th>
                            <th scope="col">Medicine Type</th>
                            <th scope="col">Manufaturer</th>
                            <th scope="col">More details</th>
                            <th scope="col">Edit Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db_conn = Connection();

                        $query = "SELECT * FROM medicine_tbl;";
                        $query_run = mysqli_query($db_conn,$query);

                        while ($row = mysqli_fetch_array($query_run)){
                            ?>
                        <tr>
                            <th scope="row"> <?php echo $row['barcode'] ?> </th>
                            <td> <?php echo $row['med_name'] ?> </td>
                            <td> <?php echo $row['gen_name'] ?> </td>
                            <td> <?php echo $row['strength'] ?> </td>
                            <td> <?php echo $row['tablets_1box'] ?> </td>
                            <td> <?php echo $row['med_type'] ?> </td>
                            <td> <?php echo $row['manufaturer'] ?> </td>
                            <td> <?php echo $row['more_details'] ?> </td>
                            <td>
                                <form action="editMed.php" method="POST">
                                    <input type="hidden" name="barcode" value="<?php echo $row['barcode']?>">
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

    <!-- jquery and js linking -->
<script src="../../../js/jquery.js"></script>
<script src="../../../js/bootstrap.min.js"></script>


</body>


</html>