<?php

class NightsWatch implements IFighter
{
    private $array = array();
    public function fight() {
        foreach ($this->array as $warrior) {
            $warrior->fight();
        }
    }
    public function recruit($name) {
        if ($name instanceof IFighter)
            $this->array[] = $name;
    }
}

?>