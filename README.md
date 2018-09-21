# Game of Life

This is a simple game of life application build with PHP.
Rules of Game of Life:
1. Any live cell with fewer than two live neighbours dies, as if by loneliness.
2. Any live cell with more than three live neighbours dies, as if by overcrowding.
3. Any live cell with two or three live neighbours lives, unchanged, to the next generation.
4. Any dead cell with exactly three live neighbours comes to life.

Every generation is rebuild based on the previouse generation cells.

## Run
If you need to run this application just run the ```index.php```.

## Usage
If you need to change the array combination just change the ```$resolution``` value in ```index.php```.
```
$resolution = 10;
```

If you need to change the number of generation produced just change the ```$numberOfGeneration``` value in ```index.php```.

```
$numberOfGeneration = 5;
```