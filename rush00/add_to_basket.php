<?php
    $name = $_GET['name'];
    session_start();
    $connection = mysqli_connect("localhost", "root", "qwerty", "rush");
    $request = mysqli_query($connection, "SELECT * FROM goods WHERE name = '$name'");
    $a = mysqli_fetch_assoc($request);
    if (isset($_SESSION['basket'][$name]))
        $_SESSION['basket'][$name]['amount']++;
    else {
        $_SESSION['basket'][$name] = $a;
        $_SESSION['basket'][$name]['amount'] = 1;
    }
?>
<?php
    header("location:javascript://history.go(-1)");
?>
