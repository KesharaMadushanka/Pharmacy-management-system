<?php

include_once("../../functions/userFunctions.php");
$results = editMed($_POST['barcode'],$_POST['med_name'],$_POST['gen_name'],$_POST['strength'],$_POST['boxTablet'],$_POST['buy'],$_POST['sell'],$_POST['med_type'],
$_POST['manufacturer'],$_POST['more_details']);

echo $results; 

?>