#!/usr/bin/php
<?php
function frenchStrtotime($date_string)
{
    return strtotime(
      strtr(
        strtolower($date_string), [
          'janvier'=>'jan',
          'février'=>'feb',
          'mars'=>'march',
          'avril'=>'apr',
          'mai'=>'may',
          'juin'=>'jun',
          'juillet'=>'jul',
          'août'=>'aug',
          'septembre'=>'sep',
          'octobre'=>'oct',
          'novembre'=>'nov',
          'décembre'=>'dec',
          'lundi' => 'monday',
          'mardi' => 'tuesday',
          'mercredi' => 'wednesday',
          'jeudi' => 'thursday',
          'vendredi' => 'friday',
          'samedi' => 'saturday',
          'dimanche' => 'sunday',
        ]
      )
    );
}

function check($str)
{
    if ((strstr($str, 'Janvier') || strstr($str, 'janvier') || strstr($str, 'février') || strstr($str, 'Février') || strstr($str, 'mars') || strstr($str, 'Mars')
    || strstr($str, 'avril') || strstr($str, 'Avril') || strstr($str, 'mai') || strstr($str, 'Mai') || strstr($str, 'juin') || strstr($str, 'Juin')
    || strstr($str, 'juillet') || strstr($str, 'Juillet') || strstr($str, 'septembre') || strstr($str, 'Septembre') || strstr($str, 'août') || strstr($str, 'Août')
    || strstr($str, 'octobre') || strstr($str, 'Octobre') || strstr($str, 'novembre') || strstr($str, 'Novembre') || strstr($str, 'décembre') || strstr($str, 'Décembre')) &&
    (strstr($str, 'lundi') || strstr($str, 'Lundi') || strstr($str, 'mardi') || strstr($str, 'Mardi') || strstr($str, 'mercredi') || strstr($str, 'Mercredi') ||
    strstr($str, 'jeudi') || strstr($str, 'Jeudi') || strstr($str, 'vendredi') || strstr($str, 'Vendredi') || strstr($str, 'Samedi') || strstr($str, 'samedi') ||
    strstr($str, 'dimanche') || strstr($str, 'Dimanche')))
        return (TRUE);
    return (FALSE);
}

if ($argc < 2)
    exit();
if (!preg_match_all('~^[A-Za-zàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ]* [1-9]{1,2} [A-Za-zàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ]* [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$~', $argv[1], $matches)
 || !check($argv[1]))
    {
        print "Wrong Format\n";
        exit();
    }
    date_default_timezone_set("europe/paris");
    $d = frenchStrtotime($argv[1]);
    if ($d == 0)
        print "Wrong Format\n";
    else
        print $d . "\n";
?>