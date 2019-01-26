<?php
session_start();
$name = $_GET['name'];
$connection = mysqli_connect("localhost", "root", "qwerty", "rush");
if (!$connection)
{
    header("Location: ../error.php");
    return;
}
if ($_SESSION['id'] == 2 ) {
    mysqli_close($connection);
    header("Location: ../error.php");
    return ;
}
if ($name == "") {
    mysqli_close($connection);
    header("Location: ../error.php");
    return ;
}
if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM goods WHERE name = '$name'")) == 0) {
    mysqli_close($connection);
    header("Location: ../error.php");
    return ;
}
mysqli_query($connection, "DELETE FROM goods WHERE name='$name'");
mysqli_close($connection);
header("Location: ../del_g.php");
?>