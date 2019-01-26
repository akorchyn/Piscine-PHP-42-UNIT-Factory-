<?php
require_once '../ex00/Color.class.php';
class Vertex
{
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;
    static $verbose = false;

    public function __construct($array)
    {
        $this->_x = $array['x'];
        $this->_y = $array['y'];
        $this->_z = $array['z'];
        if (isset($array['w']))
            $this->_w = $array['w'];
        else
            $this->_w = 1.0;
        if (isset($array['color']) && $array['color'] instanceof Color) {
            $this->_color = $array['color'];
        }
        else {
            $this->_color = new Color(array('rgb' => 0xFFFFFF));
        }
        if (self::$verbose == true) {
            printf("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f, %s ) constructed" . PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        }
    }
    public function __toString()
    {
        if (self::$verbose == true) {
            return sprintf("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        }
        else {
            return sprintf("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
        }
    }
    public function get_x() {
        return $this->_x;
    }
    public function get_y() {
        return $this->_y;
    }
    public function get_z(){
        return $this->_z;
    }
    public function get_w(){
        return $this->_w;
    }
    public function get_color(){
        return $this->_color;
    }
    public function set_x($x){
        $this->_x = $x;
    }
    public function set_y($y){
        $this->_y = $y;
    }
    public function set_z($z){
        $this->_z = $z;
    }
    public function set_color(Color $color) {
        $this->_color = $color;
    }
    static public function doc() {
        return file_get_contents("Vertex.doc.txt", FILE_USE_INCLUDE_PATH);
    }
    public function __destruct()
    {
        self::$verbose ? printf("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f, %s ) destructed" . PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color) : 0;
    }
}
?>