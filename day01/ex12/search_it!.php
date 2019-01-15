#!/usr/bin/php
<?php
if ($argc < 3)
    exit();
$find = "";
$len = strlen($argv[1]);
for ($i = 2; $argv[$i]; ++$i)
    if (!strncmp($argv[$i], $argv[1], $len))
        $find = substr($argv[$i], $len + 1);
if ($find != "")
    print $find . "\n";        
?>
