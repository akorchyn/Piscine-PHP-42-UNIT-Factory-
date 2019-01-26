<?php
session_start();
$login = $_POST['login'];
$connection = mysqli_connect("localhost", "root", "qwerty", "rush");
if ($_SESSION['id'] == 2 ) {
    header("Location: ../error.php");
    return;
}
if ($login == "") {
    header("Location: ../error.php");
    return ;
}
if (!$connection) {
    header("Location: ../error.php");
    return ;
}
if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM users WHERE login = '$login'")) == 0) {
    header("Location: ../error.php");
    return ;
}
mysqli_query($connection, "DELETE FROM users WHERE id=2 AND login = '$login'");
mysqli_close($connection);
header("Location: ../del_u.php")
?>