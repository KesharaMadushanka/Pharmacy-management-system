<?php

//include user functions
include_once('../../functions/userFunctions.php');

$result = emptyItemTemp();

if($result == 1){
    
    header('location:../../views/invoice/invoiceForm.php');

} else {
    ?>
    <script type="text/javascript">
    alert("List Not Cleared!");
    window.location.href = "../../views/invoice/invoiceForm.php";
    </script>

    <?php
}
?>