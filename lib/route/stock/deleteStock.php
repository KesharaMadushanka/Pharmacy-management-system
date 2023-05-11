<?php

include_once("../../functions/userFunctions.php");
$results = deleteStock($_POST['id']);
echo $results; 

?>