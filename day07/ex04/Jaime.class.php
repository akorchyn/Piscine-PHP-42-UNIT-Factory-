<?php

class Jaime extends  Lannister
{
    public function sleepWith($name) {
        if (!$name instanceof Lannister) {
            echo "Let's do this." . PHP_EOL;
        }
        else {
            echo $name->answer . PHP_EOL;
        }
    }
}

?>