<?php
$name = $_GET['name'];
$value = $_GET['value'];
$category = $_GET['category'];
$image = $_GET['image'];
session_start();
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
if ($name == "" || $value == 0 || $image == "" || $category == "") {
    mysqli_close($connection);
    header("Location: ../error.php");
    return ;
}
if (!is_numeric($value)) {
    mysqli_close($connection);
    header("Location: ../error.php");
    return ;
}
$table_query = mysqli_query($connection, "SELECT * FROM goods WHERE name='$name'");
if (mysqli_num_rows($table_query) != 0)
{
    mysqli_close($connection);
    header("Location: ../error.php");
    return ;
}
$table = mysqli_prepare($connection, "INSERT INTO goods VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($table, 'ssis', $category, $name, $value, $image);
mysqli_stmt_execute($table);
mysqli_stmt_close($table);
mysqli_close($connection);
header("Location: ../add_g.php");
?>

