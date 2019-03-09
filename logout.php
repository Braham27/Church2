<?php
ob_start();
session_start();

$_SESSION['picture'] = null;
$_SESSION['first'] = null;
$_SESSION['last'] = null;
$_SESSION['position'] = null;

header("location:index.php");

?>