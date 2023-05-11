<?php

//include the user function
include_once("../../functions/userFunctions.php");
$result = empRegister($_POST['empId'],$_POST['empName'],$_POST['empEmail'],$_POST['empNic'],$_POST['empTel'],$_POST['empDob']);

?>