<?php
$log = 'zaz';
$psw = 'jaimelespetitsponeys';
header('HTTP/1.0 401 Unauthorized');
header("WWW-Authenticate: Basic realm=''Member Area''");
if ($_SERVER['PHP_AUTH_USER'] == $log && $_SERVER['PHP_AUTH_PW'] == $psw) {
    $file = file_get_contents("../img/42.png");
    $encoded_data = base64_encode($file);
    header('WWW-Authenticate: ');
    echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64," . $encoded_data  ."'>\n</body></html>\n";
}
else {
    echo "<html><body>That area is accessible for members only</body></html>     \n";
}
?>