#!/usr/bin/php
<?php
function    get_word($str, $i)
{
    $temp = $i;
    $len = 0;
    while ($str[$i] != ' ' && $str[$i])
    {
        $len++;
        $i++;
    }
    $word = substr($str, $temp, $len);   
    return $word;
}
function    ft_split($a)
{
    $j = 0;
    $k = 0;
    $arr = array();
    for ($i = 0; $a[$i]; ++$i)
    {
        if ($k == 0 && $a[$i] != ' ')
        {
            $arr[$j++] = get_word($a, $i);
            $k = 1;
        }
        else if ($a[$i] == ' ')
            $k = 0;
    }
    return ($arr);
}
if ($argv[1])
{
    $arr = ft_split($argv[1]);
    for ($i = 1; $arr[$i]; ++$i)
        print $arr[$i] . " ";
    print $arr[0] . "\n";
}
?>