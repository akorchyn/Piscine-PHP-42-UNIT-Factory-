<?php
$connection = mysqli_connect("localhost", "root", "qwerty", "rush");
if (!$connection) {
    header("Location: error2.php");
    return ;
}
session_start();
?>