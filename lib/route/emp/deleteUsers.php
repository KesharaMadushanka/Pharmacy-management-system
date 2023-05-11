<?php

include_once("../../functions/userFunctions.php");
$results = deleteUsers($_POST['id']);
echo $results;

?>