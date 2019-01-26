<?php

class Tyrion extends Lannister
{
    function __construct()
    {
        Lannister::__construct();
        echo "My name is Tyrion" . PHP_EOL;
    }

    function getSize()
    {
        return "Short";
    }
}
?>