<?php
require_once "../ex01/Vertex.class.php";

class Vector
{
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    static  $verbose = false;

    public function __construct($array) {
        if (isset($array['dest']) && $array['dest'] instanceof Vertex)
        {
            if (isset($array['orig']) && $array['orig'] instanceof Vertex) {
                $kostyl = new Vertex(array('x' => $array['orig']->get_x(), 'y' => $array['orig']->get_y(), 'z' => $array['orig']->get_z()));
            }
            else {
                $kostyl = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
            }
            $this->_x = $array['dest']->get_x() - $kostyl->get_x();
            $this->_y = $array['dest']->get_y() - $kostyl->get_y();
            $this->_z = $array['dest']->get_z() - $kostyl->get_z();
            $this->_w = 0.0;
        }
        if (self::$verbose == true) {
            printf("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f ) constructed" . PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w);
        }
    }
    public function __toString()
    {
        return sprintf("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
    }
    public function __destruct()
    {
       if (self::$verbose == true) {
           printf("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f ) destructed" . PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w);
       }
    }

    public function get_x() {
        return ($this->_x);
    }
    public function get_y() {
        return $this->_y;
    }
    public function get_z() {
        return $this->_z;
    }
    public function get_w() {
        return $this->_w;
    }

    public function magnitude() {
        $length = $this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z;
        return (float)sqrt($length);
    }
    public function normalize() {
        $cooficient = 1 / $this->magnitude();
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $cooficient, 'y' => $this->_y * $cooficient, 'z' => $this->_z * $cooficient))));
    }
    public function add(Vector $rhs) {
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->get_x(), 'y' => $this->_y + $rhs->get_y(), 'z' => $this->_z + $rhs->get_z()))));
    }
    public function sub(Vector $rhs) {
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->get_x(), 'y' => $this->_y - $rhs->get_y(), 'z' => $this->_z - $rhs->get_z()))));
    }
    public function opposite() {
        return new Vector(array('dest' => new Vertex(array('x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z))));
    }
    public function scalarProduct($k) {
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
    }
    public function dotProduct(Vector $rhs) {
        return (float)($this->_x * $rhs->get_x() + $this->_y * $rhs->get_y() + $this->_z * $rhs->get_z());
    }
    public function cos(Vector $rhs) {
        $up = $this->dotProduct($rhs);
        $down = $this->magnitude() * $rhs->magnitude();
        return (float)($up / $down);
    }
    public function crossProduct(Vector $rhs) {
        return new Vector(array('dest' => new Vertex(array('x' => $this->_y * $rhs->get_z() - $this->_z * $rhs->get_y(), 'y' => $this->_z * $rhs->get_x() - $this->_x * $rhs->get_z(), 'z' => $this->_x * $rhs->get_y() - $this->_y * $rhs->get_x()))));
    }
    static public function doc() {
        return file_get_contents("Vector.doc.txt", FILE_USE_INCLUDE_PATH);
    }
}
?>