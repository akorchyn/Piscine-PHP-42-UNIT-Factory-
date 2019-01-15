#!/usr/bin/php
<?php
function    syntaxError()
{
    print "Syntax Error\n";
    exit();
}

function    checkString($str)
{
    $j = 0;
    $signs = 0;
    for ($i = 0; ord($str[$i]) != 0; ++$i)
    {
        if (ctype_digit($str[$i]) && ($i == 0 || $str[$i - 1] == ' ' || $str[$i - 1] == '-' || $str[$i - 1] == '+' || $str[$i - 1] == '*' || $str[$i - 1] == '/' || $str[$i - 1] == '%'))
            $j++;
        if ($str[$i] != '+' && $str[$i] != '-' && $str[$i] != '*' && $str[$i] != '/' && $str[$i] != '%' && $str[$i] != ' ' && !ctype_digit($str[$i]))
            syntaxError();
        if (($str[$i] == '+' || $str[$i] == '-') && !ctype_digit($str[$i + 1]))
            $signs++;
    }
    if ($j != 2 || $signs > 1)
        syntaxError();
}

if ($argc != 2)
{
    print "Incorrect Parameters\n";
    exit();
}
checkString($argv[1]);
$argv[1] = str_replace(' ', '', $argv[1]);
$str = $argv[1];
$i = ($str[0] == '+' || $str[0] == '-') ? 1 : 0;
if (!ctype_digit($str[$i]))
    syntaxError();
$first = intval($str);
for (; ctype_digit($str[$i]); $i++);
$sign = $str[$i++];
if ($sign != '+' && $sign != '-' && $sign != '%' && $sign != '*' && $sign != '/')
    syntaxError();   
if (!ctype_digit($str[$i]) && !$str[$i] == '+' && !$str[$i] == '-')
    syntaxError();
$second = substr($str, $i);
if ($second == 0 && ($sign == '/' || $sign == '%'))
    syntaxError();
switch ($sign)
{
    case '+':
        print $first + $second . "\n";
        break;
    case '-':
        print $first - $second . "\n";
        break;
    case '*':
        print $first * $second . "\n";
        break;
    case '/':
        print $first / $second . "\n";
        break;
    case '%':
        print $first % $second . "\n";
        break;
}   
?>