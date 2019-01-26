<?php
session_start();
$order = "";
$connection = mysqli_connect("localhost", "root", "qwerty", "rush");
if ($_SESSION['id'] != '2' && $_SESSION['id'] != '1') {
    header("Location: error.php");
    return ;
}
if (!$connection) {
    header("Location: error.php");
    return ;
}
$i = 0;
foreach ($_SESSION['basket'] as $name => $amount) {
    $i = 1;
    $order = $order . $name . "/" . $amount['amount'] . ";";
}
if ($i == 0) {
    header("Location: error.php");
    return ;
}
$login = $_SESSION['logged_user'];
mysqli_query($connection, "INSERT INTO orders (name, ordering) VALUES ('$login', '$order')");
unset($_SESSION['basket']);
mysqli_close($connection);
header("Location: basket.php")
?>