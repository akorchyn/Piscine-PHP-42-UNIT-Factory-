<?php

class Tyrion extends Lannister
{
    public $answer = "Not even if I'm drunk !";
    public function sleepWith($name) {
        if (!$name instanceof Lannister) {
            echo "Let's do this." . PHP_EOL;
        }
        else {
            echo "Not even if I'm drunk !" . PHP_EOL;
        }
    }
}

?>