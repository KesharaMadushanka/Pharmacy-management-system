<?php

//include user function
include_once("../../functions/userFunctions.php");

$results = updateStock($_POST['barcode'],$_POST['boxes'],$_POST['exp'],$_POST['price']);

if($results == 1){
    ?>
    <script type="text/javascript">
    alert("Successfully Updated");
    window.location.href = "../../views/stock/updateStock.php";
    </script>

<?php
} else {
    ?>
    <script type="text/javascript">
    alert("Update Failed");
    window.location.href = "../../views/stock/updateStock.php";
    </script>

    <?php
}

?>