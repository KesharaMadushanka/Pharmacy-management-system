<?php

//include user functions
include_once('../../functions/userFunctions.php');

$result = itemList($_POST['barcode'],$_POST['qty']);

if($result == 2){
    ?>
    <script type="text/javascript">
    alert("There is no such amount is stock!");
    window.location.href = "../../views/invoice/invoiceForm.php";
    </script>

    <?php
}

elseif($result == 1){
    
    header('location:../../views/invoice/invoiceForm.php');

} else {
    ?>
    <script type="text/javascript">
    alert("Item Not Added!");
    window.location.href = "../../views/invoice/invoiceForm.php";
    </script>

    <?php
}

?>