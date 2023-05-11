<?php

//include user function
include_once("../../functions/userFunctions.php");

$results = addMedicine($_POST['barcode'],$_POST['med_name'],$_POST['gen_name'],$_POST['strength'],$_POST['boxTablets'],$_POST['buy'],$_POST['sell'],$_POST['med_type'],$_POST['manufacturer'],$_POST['more_details']);


?>
