<?php
if ($_POST['submit'] == 'OK'){
    $newpw = $_POST['newpw'];
    $oldpw = $_POST['oldpw'];
    $login = $_POST['login'];
    $path_to_passwd = "../private/passwd";
    if ($newpw == "" || $oldpw == "" || $login == "")
    {
        echo "ERROR\n";
        return ;
    }
    $array = unserialize(file_get_contents($path_to_passwd));
    for ($i = 0; $array[$i]; $i++) {
        if ($array[$i]['login'] == $login)
            break ;
    }
    if (!$array[$i] || $array[$i]['passwd'] != hash("whirlpool", $oldpw))
    {
        echo "ERROR\n";
        return ;
    }
    $array[$i]['passwd'] = hash("whirlpool", $newpw);
    if (!file_put_contents($path_to_passwd, serialize($array)))
        echo "ERROR\n";
    else {
        echo("OK\n");
        session_start();
        $_SESSION['loggued_on_user'] = $login;
        header("Location: index.html");
    }
}
else{
    echo "ERROR\n";
}
?>