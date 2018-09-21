<?php
class Game {
    public $cols;
    public $row;
    public $numberOfGeneration;
    public $oldGrid;
    public $newGrid;
    
    public function __construct($resolution, $numberOfGeneration) {
        $this->cols = $resolution;
        $this->row = $resolution;
        $this->numberOfGeneration = $numberOfGeneration;
    }
    
    public function run() {
        $this->oldGrid = new Grid($this->cols, $this->row);        
        $this->newGrid = new Grid($this->cols, $this->row);
        
        $this->oldGrid->generateCells();
        $this->oldGrid->createCanvas('Original Generation'); 
        $this->play($this->numberOfGeneration);
    }
    
    public function play($numberOfGeneration) {        
        for ($i = 1; $i <= $numberOfGeneration; $i++) {
            $this->buildNewGeneration();
            $this->newGrid->createCanvas('#' . $i . ' Generation');            
            
            $this->oldGrid = $this->newGrid;
            $this->newGrid = new Grid($this->cols, $this->row);
        }
    }
    
    public function buildNewGeneration() {
        for ($i = 0; $i < $this->cols; $i++) {
            for ($j = 0; $j < $this->row; $j++) {
                $state = $this->oldGrid->getCell($i, $j);
                
                // Edges of the borders
                if ($i == 0 || $i == $this->cols - 1 || $j == 0 || $j == $this->row - 1) {                    
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
    
    public function getOldGrid() {
        return $this->oldGrid;
    }
    
    public function getNewGrid() {
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