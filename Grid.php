<?php
class Grid {
    public $cols;
    public $rows;
    public $cells;
    
    public function __construct($cols, $rows) {
        $this->cols = $cols;
        $this->rows = $rows;
        $this->cells = array();
        
        for ($i = 0; $i < $this->cols; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $this->cells[$i][$j] = 0;
            }
        }
    }
    
    public function generateCells() {
        for ($i = 0; $i < $this->cols; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $this->cells[$i][$j] = rand(0, 1);
            }
        }
        
        return $this;
    }
    
    public function createCanvas($header) {
        echo '<strong>' . $header . '</strong><br><br>';
        
        for ($i = 0; $i < $this->cols; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $mark = $this->cells[$i][$j] == 1 ? '*' : '-';
                echo ' ' . $mark . ' ';
            }
            
            echo '<br>';
        }
        
        echo '<br><br>';
    }
    
    public function getCell($x, $y) {
        return $this->cells[$x][$y];
    }
    
    public function setCell($x, $y, $value) {
        $this->cells[$x][$y] = $value;
    }
    
    public function getCols() {
        return $this->cols;
    }
    
    public function getRows() {
        return $this->rows;
    }
}