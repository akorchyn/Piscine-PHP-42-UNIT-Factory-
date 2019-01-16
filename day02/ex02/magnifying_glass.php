#!/usr/bin/php
<?php
if ($argc != 2 || !preg_match('~.*.html$~', $argv[1]) || !is_file($argv[1]))
    exit();
$string = file_get_contents($argv[1]);
$string = preg_replace_callback("~<a.*?title=\"(.*?)\">~", function ($match){
    return str_replace($match[1], strtoupper($match[1]), $match[0]);
}, $string);
$string = preg_replace_callback("~<a.*?>(.*?)<~", function ($match){
    return str_replace($match[1], strtoupper($match[1]), $match[0]);
}, $string);
print $string;
?>