<?php
function    auth($login, $pass)
{
    $connection = mysqli_connect("localhost", "root", "qwerty", "rush");
    if ($login == "" || $pass == "" || !$connection) {
        return 0;
    }
    $passw_hashed = hash("md5", hash("md5", $pass . "xx23x") . "xx23x");
    $result = mysqli_query($connection, "SELECT id FROM users WHERE login = '$login' AND pass = '$passw_hashed'");
    mysqli_close($connection);
    if (!mysqli_num_rows($result)) {
        return 0;
    }
    $arr = mysqli_fetch_array($result);
    return $arr[0];
}
function    get_product() {
    $connection = mysqli_connect("localhost", "root", "qwerty", "rush");
    if (!$connection) {
        echo "Cant connect to data base";
        return ;
    }
    $result = mysqli_query($connection, "SELECT * FROM goods");
    for ($i = 0; $array[$i] = mysqli_fetch_assoc($result); $i++);
    unset($array[$i]);
    mysqli_close($connection);
    return ($array);
}
function    get_category($category) {
    $connection = mysqli_connect("localhost", "root", "qwerty", "rush");
    if (!$connection) {
        echo "Cant connect to data base";
        return ;
    }
    $result = mysqli_query($connection, "SELECT * FROM goods WHERE category='$category'");
    for ($i = 0; $array[$i] = mysqli_fetch_assoc($result); $i++);
    unset($array[$i]);
    mysqli_close($connection);
    return ($array);
}
function    get_category2() {
    $connection = mysqli_connect("localhost", "root", "qwerty", "rush");
    if (!$connection) {
        echo "Cant connect to data base";
        return ;
    }
    $result = mysqli_query($connection, "SELECT DISTINCT category FROM goods");
    for ($i = 0; $array[$i] = mysqli_fetch_assoc($result); $i++);
    unset($array[$i]);
    mysqli_close($connection);
    return ($array);
}
function    add_to_cart($name) {
    session_start();
    if (isset($_SESSION['basket'][$name]))
        $_SESSION['basket'][$name]++;
    else
        $_SESSION['basket'][$name] = 1;
}
?>