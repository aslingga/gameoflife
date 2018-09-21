<?php 
include_once 'Grid.php';
include_once 'Game.php';

$resolution = 5;
$numberOfGeneration = 5;

$game = new Game($resolution, $numberOfGeneration);
?>

<html>
<head>
	<style type="text/css">
        body {
            font-family: Monaco, "Consolas", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace !important;
        }
	</style>
</head>
<body>
	<?php $game->run(); ?>
</body>
</html>