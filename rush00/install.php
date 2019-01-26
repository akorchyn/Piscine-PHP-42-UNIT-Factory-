#!/usr/bin/php
<?php
if ($argc < 2)
{
    echo "Error.\nValid combination is ./install.php path\n";
    exit();
}
$path = $argv[1];
exec ("~/mamp/mysql/bin/mysql -uroot -pqwerty< $path");
?>