<?php

include_once("../../functions/userFunctions.php");
$results = deleteMed($_POST['id']);
echo $results; 

?>