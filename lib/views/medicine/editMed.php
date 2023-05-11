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
    <title>Edit EMP</title>

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
            <li class="breadcrumb-item active" aria-current="page">Edit Medicines</li>
        </ol>
    </nav>

    <div class="container" style="opacity: 0.9;">
        <div class="card mt-5" style="opacity: 0.9;">
            <div class="card-header">
                Edit Medicines
            </div>
            <div class="card-body">
                <?php
                $id = $_POST['barcode'];
                $db_conn = Connection();

                $query = "SELECT * FROM medicine_tbl WHERE barcode = '$id';";
                $queryRun = mysqli_query($db_conn,$query);

                while($row = mysqli_fetch_array($queryRun)){
                    ?>

                <form id="edit_form" class="row g-3">
                    <div class="col-12">
                        <label for="" class="form-label">Barcode / Medicine ID</label>
                        <input type="text" class="form-control" id="barcode" value="<?php echo $row['barcode']; ?>"
                            name="barcode" placeholder="Enter Barcode" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Medicine Name</label>
                        <input type="text" class="form-control" id="med_name" value="<?php echo $row['med_name']; ?>"
                            name="med_name" placeholder="Enter Medicine Name">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Generic Name</label>
                        <input type="text" class="form-control" id="gen_name" value="<?php echo $row['gen_name']; ?>"
                            name="gen_name" placeholder="Enter Generic Name">
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Strength</label>
                        <input type="text" class="form-control" id="strength" value="<?php echo $row['strength']; ?>"
                            name="strength" placeholder="in Miligrams">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">How Many Tablets in a Box</label>
                        <input type="text" class="form-control" id="boxTablets"
                            value="<?php echo $row['tablets_1box']; ?>" name="boxTablet"
                            placeholder="Tablets in a Single Box">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Buying Price</label>
                        <input type="text" class="form-control" id="buy" value="<?php echo $row['buying_price']; ?>"
                            name="buy" placeholder="Buying Price of a tablet">
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Selling Price</label>
                        <input type="text" class="form-control" id="sell" name="sell"
                            value="<?php echo $row['selling_price']; ?>" placeholder="Selling of a tablet">
                    </div>

                    <div class="col-12">
                        <label for="" class="form-label">Medicine Type</label>
                        <input type="text" class="form-control" id="med_type" value="<?php echo $row['med_type']; ?>"
                            name="med_type" placeholder="Ex: Painkillers">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Manufacturer</label>
                        <input type="text" class="form-control" id="manufacturer"
                            value="<?php echo $row['manufaturer']; ?>" name="manufacturer"
                            placeholder="Enter Manufacturer Name">
                    </div>


                    <div class="col-12">
                        <label for="" class="form-label">More Details</label>
                        <textarea class="form-control" id="more_details" name="more_details"
                            value="<?php echo $row['more_details']; ?>" rows="3"></textarea>
                    </div>

                    <div class="col-12">
                        <input type="submit" value="Update Details" class="btn btn-success" onclick="return false"
                            id="editBtn">
                        <a href="../admin.php" class="btn btn-danger">Back</a>
                    </div>
                </form>

                </form>

                <?php    
                }
                ?>
            </div>
        </div>
    </div>





</body>

</html>

<!-- jquery and js linking -->
<script src="../../../js/jquery.js"></script>
<script src="../../../js/bootstrap.min.js"></script>


<script>
$(document).on('click', '#editBtn', function(event) {
    var barcode = $('#barcode').val();
    var med_name = $('#med_name').val();
    var gen_name = $('#gen_name').val();
    var strength = $('#strength').val();
    var boxTablets = $('#boxTablets').val();
    var buy = $('#buy').val();
    var sell = $('#sell').val();
    var med_type = $('#med_type').val();
    var manufacturer = $('#manufacturer').val();
    var more_details = $('#more_details').val();

    //empty checking
    if (gen_name == "" || med_name == "" || strength == "" || boxTablets == "" || buy == "" || sell == "" || med_type == "" || manufacturer == "" ) {
        alert("Please fill all the input fields!");
    } else {
        event.preventDefault();
        var form = $('#edit_form')[0];
        var formData = new FormData(form);
        $.ajax({
            url: "../../route/medicine/editMed.php",
            data: formData,
            type: "POST",
            processData: false,
            contentType: false,

            success: function(data) {
                if (data == 0) {
                    alert("Error! Data not updated");
                } else {
                    alert("Data successfully updated!");
                    location.reload();
                }
            }
        })
    }
})
</script>