<?php

include_once("../../functions/userFunctions.php");
$result = editLogin($_POST['userId'], $_POST['userEmail'], $_POST['loginStatus'], $_POST['loginRole']);
echo ($result);

?>