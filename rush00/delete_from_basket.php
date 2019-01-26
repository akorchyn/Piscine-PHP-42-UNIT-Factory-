<?php
session_start();
$name = $_GET['name'];
unset($_SESSION['basket'][$name]);
header("Location: basket.php");
?>