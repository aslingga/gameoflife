<?php
class Game {
    public $cols;
    public $rows;
    public $oldGrid;
    public $newGrid;
    
    public function __construct($resolution) {
        $this->cols = $resolution;
        $this->rows = $resolution;
    }
    
    public function play() {
        $this->oldGrid = new Grid($this->cols, $this->rows);        
        $this->newGrid = new Grid($this->cols, $this->rows);
        
        $this->oldGrid->generateCells();        
        $this->buildNewGeneration();
    }
    
    public function buildNewGeneration() {
        for ($i = 0; $i < $this->cols; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $state = $this->oldGrid->getCell($i, $j);
                
                // Edges
                if ($i == 0 || $i == $this->cols - 1 || $j == 0 || $j == $this->rows - 1) {                    
                    $this->newGrid->setCell($i, $j, $state);
                }
                else {
                    $neighbors = $this->countLiveNeighbors($this->oldGrid, $i, $j);
                    
                    if ($state == 0 && $neighbors == 3) {
                        $this->newGrid->setCell($i, $j, 1);
                    }
                    else if ($state == 1 && ($neighbors < 2 || $neighbors > 3)) {
                        $this->newGrid->setCell($i, $j, 0);
                    }
                    else {
                        $this->newGrid->setCell($i, $j, $state);
                    }
                }
            }
        }
    }
    
    public function getoldGrid() {
        return $this->oldGrid;
    }
    
    public function getnewGrid() {
        return $this->newGrid;
    }
    
    private function countLiveNeighbors($grid, $x, $y) {
        $sum = 0;
        
        for ($i = -1 ; $i < 2; $i++) {
            for ($j = -1; $j < 2; $j++) {
                $sum += $grid->getCell($x + $i, $y + $j);
            }
        }
        
        $sum -= $grid->getCell($x, $y);
        return $sum;
    }
}