<?php
$action = $_GET['action'];
$name = $_GET['name'];
switch ($action)
{
    case 'set':
        setcookie($name, $_GET['value'], time() + (86400 * 30));
        break ;
    case 'get':
        if ($_COOKIE[$name] != "")
            echo $_COOKIE[$name] . "\n";
        break ;
    case 'del':
        setcookie($name, "", time() - 3600);
        break ;
}
?>