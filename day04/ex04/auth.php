<?php
function    auth($login, $passwd) {
    $array_of_user_data = unserialize(file_get_contents("../private/passwd"));
    foreach ($array_of_user_data as $account) {
        if ($account['login'] == $login) {
            if ($account['passwd'] == hash("whirlpool", $passwd)) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }
    return FALSE;
}
?>