<?php

abstract class House
{
    public function introduce() {
        echo "House " . $this->getHouseName() . " of " . $this->getHouseSeat() . ' : "' . $this->getHouseMotto() . '"'. PHP_EOL;
    }
    abstract public function getHouseName();
    abstract public function getHouseSeat();
    abstract public function getHouseMotto();
}
?>