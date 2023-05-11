<?php

//we need to include our user function page
include_once('../../functions/userFunctions.php');


$result = userRegistration($_POST['user_name'],$_POST['user_email'],$_POST['user_password'],$_POST['user_phone'],$_POST['user_nic']);

echo($result);
?>