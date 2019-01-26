<?php
    session_start();
    $login = $_POST['login'];
    $passw = $_POST['passwd1'];
    $passw_second = $_POST['passwd2'];
    $connection = mysqli_connect("localhost", "root", "qwerty", "rush");
    if ($login == "" || $passw == "" || !$connection || $passw != $passw_second) {
        header("Location: error.php");
        return ;
    }
    $result = mysqli_query($connection, "SELECT * FROM users WHERE login = '$login'");
    if (mysqli_num_rows($result))
    {
        mysqli_close($connection);
        header("Location: error.php");
        return ;
    }
    $table = mysqli_prepare($connection, "INSERT INTO users VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($table, 'iss', $id, $log, $pass);
    $id = 2;
    $log = $login; // admin root
    $pass = hash("md5", hash("md5", $passw . "xx23x") . "xx23x");
    $_SESSION['logged_user'] = $login;
    $_SESSION['id'] = 2;
    mysqli_stmt_execute($table);
    mysqli_stmt_close($table);
    mysqli_close($connection);
    header("Location: index.php");
?>