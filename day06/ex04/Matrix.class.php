<?php

require_once "../ex02/Vector.class.php";

class Matrix
{

    static $verbose = false;
    const IDENTITY = 'identify';
    const SCALE = 'scale';
    const RX = 'rx';
    const RY = 'ry';
    const RZ = 'rz';
    const TRANSLATION = 'translation';
    const PROJECTION = 'projection';
    const DIAGONAL = 'diagonal';
    private $matrix = array();

    static public function doc() {
        return file_get_contents("Matrix.doc.txt");
    }

    public function __construct($array)
    {
        switch ($array['preset']) {
            case Matrix::IDENTITY:
                $this->identify();
                break ;
            case Matrix::TRANSLATION:
                $this->translation($array['vtc']);
                break ;
            case Matrix::SCALE:
                $this->scale($array['scale']);
                break ;
            case Matrix::RX:
                $this->rx($array['angle']);
                break ;
            case Matrix::RY:
                $this->ry($array['angle']);
                break ;
            case Matrix::RZ:
                $this->rz($array['angle']);
                break ;
            case Matrix::PROJECTION:
                $this->projection($array['ratio'], $array['fov'], $array['far'], $array['near']);
                break ;
            case Matrix::DIAGONAL:
                $this->matrix = $array['matrix']->matrix;
                $this->diagonalSymetry();
                break ;
        }
    }

    public function __toString()
    {
        return (sprintf("M | vtcX | vtcY | vtcZ | vtxO" . PHP_EOL . "-----------------------------" . PHP_EOL
                                . "x | %.2f | %.2f | %.2f | %.2f"  . PHP_EOL
                                . "y | %.2f | %.2f | %.2f | %.2f"  . PHP_EOL
                                . "z | %.2f | %.2f | %.2f | %.2f"  . PHP_EOL
                                . "w | %.2f | %.2f | %.2f | %.2f",
                                $this->matrix[0][0], $this->matrix[0][1], $this->matrix[0][2], $this->matrix[0][3],
                                $this->matrix[1][0], $this->matrix[1][1], $this->matrix[1][2], $this->matrix[1][3],
                                $this->matrix[2][0], $this->matrix[2][1], $this->matrix[2][2], $this->matrix[2][3],
                                $this->matrix[3][0], $this->matrix[3][1], $this->matrix[3][2], $this->matrix[3][3]));
    }

    public function __destruct()
    {
        if (self::$verbose == true)
            echo "Matrix instance destructed" . PHP_EOL;
    }

    public function transformVertex(Vertex $vtx) {
        return new Vertex(array('x' => $vtx->get_x() * $this->matrix[0][0] + $vtx->get_y() * $this->matrix[0][1] + $this->matrix[0][2] * $vtx->get_z() + $this->matrix[0][3] * $vtx->get_w(),
            'y' => $vtx->get_x() * $this->matrix[1][0] + $vtx->get_y() * $this->matrix[1][1] + $this->matrix[1][2] * $vtx->get_z() + $this->matrix[1][3] * $vtx->get_w(),
            'z' => $vtx->get_x() * $this->matrix[2][0] + $vtx->get_y() * $this->matrix[2][1] + $this->matrix[2][2] * $vtx->get_z() + $this->matrix[2][3] * $vtx->get_w(),
            'w' => $vtx->get_x() * $this->matrix[3][0] + $vtx->get_y() * $this->matrix[3][1] + $this->matrix[3][2] * $vtx->get_z() + $this->matrix[3][3] * $vtx->get_w(), 'color' => $vtx->get_color()));
    }
    public function mult(Matrix $mult)
    {
        $tmp = array();
        for ($y = 0; $y < 4; $y++)
            for ($x = 0; $x < 4; $x++){
                $tmp[$y][$x] = 0;
                for ($z = 0; $z < 4; $z++){
                    $tmp[$y][$x] += $this->matrix[$y][$z] * $mult->matrix[$z][$x];
                }
            }
        $matrix = new Matrix(array());
        $matrix->matrix = $tmp;
        return $matrix;
    }
    private function diagonalSymetry() {
        $tmp = array();
        $tmp[0] = array($this->matrix[0][0], $this->matrix[1][0], $this->matrix[2][0], $this->matrix[3][0]);
        $tmp[1] = array($this->matrix[0][1], $this->matrix[1][1], $this->matrix[2][1], $this->matrix[3][1]);
        $tmp[2] = array($this->matrix[0][2], $this->matrix[1][2], $this->matrix[2][2], $this->matrix[3][2]);
        $tmp[3] = array($this->matrix[0][3], $this->matrix[1][3], $this->matrix[2][3], $this->matrix[3][3]);
        $this->matrix = $tmp;
    }

    private function identify(){
        $this->matrix[0] = array(1.0, 0.0, 0.0, 0.0);
        $this->matrix[1] = array(0.0, 1.0, 0.0, 0.0);
        $this->matrix[2] = array(0.0, 0.0, 1.0, 0.0);
        $this->matrix[3] = array(0.0, 0.0, 0.0, 1.0);
        if (self::$verbose == true) {
            echo "Matrix IDENTITY instance constructed" . PHP_EOL;
        }
    }

    private function translation(Vector $vtc) {
        $tmp = self::$verbose;
        self::$verbose = false;
        $this->identify();
        self::$verbose = $tmp;
        $this->matrix[0][3] = $vtc->get_x();
        $this->matrix[1][3] = $vtc->get_y();
        $this->matrix[2][3] = $vtc->get_z();
        if (self::$verbose == true) {
            echo "Matrix TRANSLATION preset instance constructed" . PHP_EOL;
        }
    }

    private function scale($value) {
        $this->matrix[0] = array($value * 1.0, 0.0, 0.0, 0.0);
        $this->matrix[1] = array(0.0, 1.0 * $value, 0.0, 0.0);
        $this->matrix[2] = array(0.0, 0.0, 1.0 * $value, 0.0);
        $this->matrix[3] = array(0.0, 0.0, 0.0, 1.0);
        if (self::$verbose == true) {
            echo "Matrix SCALE preset instance constructed" . PHP_EOL;
        }
    }

    private function rx($angle) {
        $this->matrix[0] = array(1.0, 0.0, 0.0, 0.0);
        $this->matrix[1] = array(0.0, cos($angle), -sin($angle), 0.0);
        $this->matrix[2] = array(0.0, sin($angle), cos($angle), 0.0);
        $this->matrix[3] = array(0.0, 0.0, 0.0, 1.0);
        if (self::$verbose == true) {
            echo "Matrix Ox ROTATION preset instance constructed" . PHP_EOL;
        }
    }

    private function ry($angle){
        $this->matrix[0] = array(cos($angle), 0.0, sin($angle), 0.0);
        $this->matrix[1] = array(0.0, 1.0, 0.0, 0.0);
        $this->matrix[2] = array(-sin($angle), 0.0, cos($angle), 0.0);
        $this->matrix[3] = array(0.0, 0.0, 0.0, 1.0);
        if (self::$verbose == true) {
            echo "Matrix Oy ROTATION preset instance constructed" . PHP_EOL;
        }
    }

    private function rz($angle){
        $this->matrix[] = array(cos($angle), -sin($angle), 0.0, 0.0);
        $this->matrix[] = array(sin($angle), cos($angle), 0.0, 0.0);
        $this->matrix[] = array(0.0, 0.0, 1.0, 0.0);
        $this->matrix[] = array(0.0, 0.0, 0.0, 1.0);
        if (self::$verbose == true) {
            echo "Matrix Oz ROTATION preset instance constructed" . PHP_EOL;
        }
    }

    private function projection($ratio, $fov, $far, $near) {
        $this->matrix[0] = array(1 / ($ratio * tan(deg2rad($fov) / 2)), 0.0, 0.0, 0.0);
        $this->matrix[1] = array(0.0, 1 / tan(deg2rad($fov) / 2), 0.0, 0.0);
        $this->matrix[2] = array(0.0, 0.0, -1 * (-$near -$far) / ($near - $far), (2 * $far * $near) / ($near - $far));
        $this->matrix[3] = array(0.0, 0.0, -1.0, 0.0);
        if (self::$verbose == true) {
            echo "Matrix PROJECTION preset instance constructed" . PHP_EOL;
        }
    }

}
?>