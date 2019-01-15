#!/usr/bin/php
<?php
if ($argc != 4)
{
    print "Incorrect Parameters\n";
    exit();
}
$argv[2] = trim($argv[2]);
$argv[1] = trim($argv[1]);
$argv[3] = trim($argv[3]);
switch ($argv[2][0])
{
    case '+':
        print $argv[1] + $argv[3] . "\n";
        break;
    case '-':
        print $argv[1] - $argv[3] . "\n";
        break;
    case '*':
        print $argv[1] * $argv[3] . "\n";
        break;
    case '/':
        print $argv[1] / $argv[3] . "\n";
        break;
    case '%':
        print $argv[1] % $argv[3] . "\n";
        break;
}
?>