<?php
    session_start();
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
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
    if ($login == "" || $passwd == "") {
        mysqli_close($connection);
        header("Location: ../error.php");
        return ;
    }
    $result = mysqli_query($connection, "SELECT * FROM users WHERE login = '$login'");
    if (mysqli_num_rows($result)) {
        mysqli_close($connection);
        header("Location: ../error.php");
        return ;
    }
    $table = mysqli_prepare($connection, "INSERT INTO users VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($table, 'iss', $id, $log, $passw_hashed);
    $id = 2;
    $passw_hashed = hash("md5", hash("md5", $passwd . "xx23x") . "xx23x");
    $log = $login;
    mysqli_stmt_execute($table);
    mysqli_stmt_close($table);
    mysqli_close($connection);
    header("Location: ../add_u.php");
?>