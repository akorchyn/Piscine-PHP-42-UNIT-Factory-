<?php
class Color
{
    public $red;
    public $green;
    public $blue;
    static $verbose = false;

    public function __construct($array)
    {
        if (isset($array['rgb'])) {
            $this->red = $array['rgb'] >> 16;
            $this->green = $array['rgb'] >> 8 & 0b11111111;
            $this->blue = $array['rgb'] >> 0 & 0b11111111;
        }
        else {
            $this->red = intval($array['red']);
            $this->blue = intval($array['blue']);
            $this->green = intval($array['green']);
        }
        if (self::$verbose == true) {
            printf("Color( red:%4s, green:%4s, blue:%4s ) constructed." . PHP_EOL, $this->red, $this->green, $this->blue);
        }
    }
    public  function __toString() {
       return sprintf("Color( red:%4s, green:%4s, blue:%4s )", $this->red, $this->green, $this->blue);
    }
    static public function doc() {
        return file_get_contents("Color.doc.txt", FILE_USE_INCLUDE_PATH);
    }
    public function add(Color $rhs) {
        return new Color(array('red' => $this->red + $rhs->red, 'blue' => $this->blue + $rhs->blue, 'green' => $this->green + $rhs->green));
    }
    public function sub(Color $rhs) {
        return new Color(array('red' => $this->red - $rhs->red, 'blue' => $this->blue - $rhs->blue, 'green' => $this->green - $rhs->green));
    }
    public function mult($f) {
        return new Color(array('red' => $this->red * $f, 'blue' => $this->blue * $f, 'green' => $this->green * $f));
    }
    public function __destruct()
    {
        if (self::$verbose == true) {
            printf("Color( red:%4s, green:%4s, blue:%4s ) destructed." . PHP_EOL, $this->red, $this->green, $this->blue);
        }
    }
}
?>