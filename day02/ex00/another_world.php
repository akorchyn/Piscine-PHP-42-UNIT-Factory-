#!/usr/bin/php
<?php
if ($argc < 2)
    exit();
    preg_match_all('~[^\s][!-\~]*~', $argv[1], $matches);
    for ($i = 0; $matches[0][$i + 1]; $i++)
        print $matches[0][$i] . " ";
    print $matches[0][$i] . "\n";
?>