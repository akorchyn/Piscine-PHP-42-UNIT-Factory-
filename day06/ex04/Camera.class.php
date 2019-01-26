<?php

class Camera
{
    static $verbose = false;
    private $tT;
    private $tR;
    private $tMult;
    private $view;
    private $vector;
    private $vertex;
    private $orientation;
    private $ratio;
    private $fov;
    private $near;
    private $far;

    public function __construct($array)
    {
        if (isset($array['origin']) && $array['origin'] instanceof Vertex && isset($array['orientation']) && $array['orientation'] instanceof Matrix
        && ((isset($array['width']) && isset($array['height'])) || isset($array['ratio'])) && isset($array['fov']) && isset($array['near']) && isset($array['far'])) {
            if (isset($array['width']) && isset($array['height']))
                $this->ratio = $array['width'] / $array['height'];
            else
                $this->ratio = $array['ratio'];
            $this->vector = new Vector(array('dest' => $array['origin']));
            $this->tT = new Matrix(array("preset" => Matrix::TRANSLATION, 'vtc' => $this->vector->opposite()));
            $this->orientation = $array['orientation'];
            $this->vertex = $array['origin'];
            $this->fov = $array['fov'];
            $this->near = $array['near'];
            $this->far = $array['far'];
            $this->tR = new Matrix(array("preset" => Matrix::DIAGONAL, 'matrix' => $this->orientation));
            $this->tMult = $this->tR->mult($this->tT);
            $this->view = new Matrix(array('preset' => Matrix::PROJECTION, 'fov' => $this->fov, 'near' => $this->near, 'far' => $this->far, 'ratio' => $this->ratio));
        }
        if (self::$verbose == true) {
            echo "Camera instance constructed" . PHP_EOL;
        }
    }

    public function __toString()
    {
        return  sprintf("Camera( " . PHP_EOL .
                        "+ Origine: %s" . PHP_EOL .
                        "+ tT:" . PHP_EOL .
                        "%s" . PHP_EOL . "+ tR:" . PHP_EOL . "%s" . PHP_EOL . "+ tR->mult( tT ):" . PHP_EOL .
                        "%s" . PHP_EOL . "+ Proj:" . PHP_EOL . "%s" . PHP_EOL . ")", $this->vertex, $this->tT,$this->tR, $this->tMult, $this->view);
    }

    static public function doc() {
        return file_get_contents("Camera.doc.txt", FILE_USE_INCLUDE_PATH);
    }

    public function __destruct()
    {
        if (self::$verbose == true) {
            echo "Camera instance destructed" . PHP_EOL;
        }
    }

    public function watchVertex(Vertex $worldVertex) {
        $tmp = $this->view;
        $tmp = $tmp->transformVertex($this->tR->transformVertex($worldVertex));
        return new Vertex(array('x' => $tmp->get_x() * $this->ratio, 'y' => $tmp->get_y(), 'color' => $tmp->get_color()));
    }
}

?>