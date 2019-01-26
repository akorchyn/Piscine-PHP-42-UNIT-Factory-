<?php
session_start();
include "functions.php";
$login = $_POST['login'];
$passw = $_POST['passwd'];
if (($id = auth($login, $passw)) != 0) {
    $_SESSION['logged_user'] = $login;
    $_SESSION['id'] = $id;
}
else {
    header("Location: error.php");
    return ;
}
header("Location: index.php");
?>