<?php

session_start();

//verify users
if(!isset($_SESSION['loginId'])){
    //redirect user backto login interface 
    header('location:../../../index.php');
}

//include user function
include_once("../../functions/userFunctions.php");

$custDetails = array($_POST['Name'],$_POST['tp'],$_POST['address1'],$_POST['address2'],$_POST['city']);

?>


<head>
    <title>Invoice</title>


    <!-- link invoice css-->
    <link rel="stylesheet" href="../../../css/invoice.css">

    <!-- link bootstrap css-->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
<style>
    @media print {
  #printPageButton {
    display: none;
  }
}
</style>

</head>




<div class="invoice-box mt-5" id='printMe'>
    <table cellpadding="0" cellspacing="0">
        <h1>INVOICE</h1>


        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td font-size="1">
                            <b>Invoice: </b><?php echo invoiceId(); ?> <br />
                            <b>Created: </b> <?php echo date("F d, Y"); ?><br />
                        </td>

                        <td>
                            <?php echo $custDetails[0];?>,<br />
                            <?php echo $custDetails[2];?>,<br />
                            <?php echo $custDetails[3];?>,<br />
                            <?php echo $custDetails[4];?>.<br />
                            <?php echo $custDetails[1];?>
                        </td>


                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="table table-striped">

        <tr class="heading">
            <td>Item</td>

            <td>Price (Rs.)</td>
        </tr>

        <?php
            $db_conn = Connection();

            $query = "SELECT medicine_tbl.med_name,item_temp.barcode,item_temp.qty FROM medicine_tbl,item_temp WHERE medicine_tbl.barcode=item_temp.barcode;";
            $query_run = mysqli_query($db_conn,$query);
            $count = 0;
            $total = 0;

            while ($row = mysqli_fetch_array($query_run)){
        ?>
        <tr>
            <td> <?php echo $row['0']; $count ++; ?> </td>
            <td><?php $price = getTotal($row['1'],$row['2']);
                        $total = $total + $price;

                        stockUpdate($row['1'],$row['2']);
                        echo $price;


            ?> </td>

            <?php
            }

            ?>


        <tr class="total">
            <td><b>Total</b></td>

            <td>Rs. <?php setTotal($total); echo $total; ?></td>
        </tr>
    </table>



</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success btn-lg" id="printPageButton" onClick="document.location.href='../../route/invoice/clearList.php'">Complete
                </button>
                <button type="button" class="btn btn-primary btn-lg" id="printPageButton" onClick="window.print();">Print
                </button>

                

                <!-- jquery and js linking -->
                <script src="../../../js/jquery.js"></script>
                <script src="../../../js/bootstrap.min.js"></script>