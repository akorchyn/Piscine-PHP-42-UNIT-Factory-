<?php

class UnholyFactory
{
    private $array = array();
    public function absorb($object) {
        if ($object instanceof Fighter) {
            if (isset($this->array[$object->name]))
                echo "(Factory already absorbed a fighter of type " . $object->name . ")" .PHP_EOL;
            else {
                $this->array[$object->name] = $object;
                echo "(Factory absorbed a fighter of type " . $object->name . ")" . PHP_EOL;
            }
        }
        else {
            echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
        }
    }
    public function fabricate($name) {
        if (isset($this->array[$name])) {
            echo "(Factory fabricates a fighter of type " . $name . ")" .PHP_EOL;
            return ($this->array[$name]);
        }
        else {
            echo "(Factory hasn't absorbed any fighter of type " . $name . ")" . PHP_EOL;
            return null;
        }
    }
}

?>