<?php
session_start();
$category = $_GET['category'];
$connection = mysqli_connect("localhost", "root", "qwerty", "rush");
if (!$connection)
{
    header("Location: ../error.php");
    return;
}
if ($_SESSION['id'] == 2 )
{
    header("Location: ../error.php");
    return;
}
if ($category == "")
{
    header("Location: ../error.php");
    return;
}
if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM goods WHERE category = '$category'")) == 0)
{
    header("Location: ../error.php");
    return;
}
mysqli_query($connection, "DELETE FROM goods WHERE category='$category'");
mysqli_close($connection);
header("Location: ../del_c.php");
?>