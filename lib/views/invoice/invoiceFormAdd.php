<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- link bootstrap-->
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
            <li class="breadcrumb-item "><a href="invoiceForm.php">List Items</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customer Details</li>
        </ol>
    </nav>
    <div class="container mt-4">
        <div class="card" style="opacity: 0.9;">
            <div class="card-header">Customer Details </div>
            <div class="card-body">
                <form action="invoice.php" method="post" class="row g-3">
                    <div class="col-12"><label for="" class="form-label">Customer Name</label><input type="text"
                            class="form-control" id="Name" name="Name" placeholder="Enter Customer Name"></div>

                    <div class="col-12"><label for="" class="form-label">Customer Phone Number</label><input type="text"
                            class="form-control" id="tp" name="tp" placeholder="07X-XXXXXXX"></div>

                    <div class="col-md-4"><label for="" class="form-label">Address</label><input type="text"
                            class="form-control" id="address1" name="address1" placeholder="Address 1"></div>

                    <div class="col-md-4"><label for="" class="form-label">|</label><input type="text"
                            class="form-control" id="address2" name="address2" placeholder="Address 2"></div>

                    <div class="col-md-4"><label for="" class="form-label">|</label><input type="text"
                            class="form-control" id="city" name="city" placeholder="City">
                    </div>


                    <div class="col-12"><input type="submit" value="Get Invoice" class="btn btn-success"
                            id="btnSub"><input type="reset" class="btn btn-warning"></div>

                </form>
            </div>
        </div>
    </div>
</body>

<!-- jquery and js linking -->
<script src="../../../js/jquery.js"></script>
<script src="../../../js/bootstrap.min.js"></script>


</script>

</html>