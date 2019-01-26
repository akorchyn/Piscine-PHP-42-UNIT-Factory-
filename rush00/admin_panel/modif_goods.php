<?php
session_start();
$connection = mysqli_connect("localhost", "root", "qwerty", "rush");
$name = $_GET['name'];
$new_name = trim($_GET['new_name']);
$category = trim($_GET['category']);
$value = trim($_GET['value']);
$image = trim($_GET['image']);
if (!$connection) {
    header("Location: ../error.php");
    return ;
}
if ($name == "") {
    header("Location: ../error.php");
    return ;
}
if (!is_numeric($value) && $value != "") {
    header("Location: ../error.php");
    return ;
}
if ($_SESSION['id'] == 2) {
    header("Location: ../error.php");
    return;
}
$table = mysqli_query($connection, "SELECT * FROM goods WHERE name = '$name'");
if ((mysqli_num_rows($table) == 0)) {
    header("Location: ../error.php");
    mysqli_close($connection);
    return ;
}
$arr = mysqli_fetch_assoc($table);
($category == "") ? $category = $arr['category'] : 0;
($new_name == "") ? $new_name = $name : 0;
($value == "") ? $value = $arr['value'] : 0;
($image == "") ? $image = $arr['image'] : 0;
mysqli_query($connection, "UPDATE goods SET category='$category', value='$value',  image='$image', name='$new_name' WHERE name='$name'");
mysqli_close($connection);
header("Location: ../mod_g.php");
?>