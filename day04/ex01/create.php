<?php
if ($_POST['submit'] == 'OK'){
    $passwd = $_POST['passwd'];
    $login = $_POST['login'];
    $path_to_passwd = "../private/passwd";
    if ($passwd == "" || $login == "")
    {
        echo "ERROR\n";
        return ;
    }
    if (file_exists($path_to_passwd)) {
        $array = unserialize(file_get_contents($path_to_passwd));
        foreach ($array as $log_pass)
            if (!strcmp($log_pass['login'], $login))
            {
                echo ("ERROR\n");
                return ;
            }
    }
    $array[] = array('login' => $login, "passwd" => hash("whirlpool", $passwd));
    if (!file_exists("../private"))
        mkdir("../private");
    if (!file_put_contents($path_to_passwd, serialize($array)))
        echo "ERROR\n";
    else
        echo ("OK\n");
}
else{
    echo "ERROR\n";
}
?>