<?php
session_start();

//verify users
if (!isset($_SESSION['loginId'])) {
    //redirect user backto login interface 
    header('location:../../index.php');
}



//iclude userfunction
include_once('../functions/userFunctions.php');

//include user navbar
include_once('../../layout/userNavbar.php')

?>

<!DOCTYPE html>
<html lang="en">
<title>User Page</title>



<head>
    <title>Pharmacy</title>
    <!-- bootstrap linking -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <!-- jquery and js linking -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>