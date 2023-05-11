<?php
session_start();
session_destroy();
unset($_SESSION['loginId']); 
unset($_SESSION['loginName']);

header('location:../../../index.php');

?>