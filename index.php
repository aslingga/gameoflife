<?php 
include_once 'Grid.php';
include_once 'Game.php';

$game = new Game(10);
$game->play();
?>

<html>
<body style="font-family: "Courier New">
	<strong>Old Generation</strong>
	<br><br>
	
	<?php echo $game->getOldGrid()->createCanvas(); ?>
	
	<br>
	
	<strong>New Generation</strong>
	<br><br>
	
	<?php echo $game->getNewGrid()->createCanvas(); ?>
	
</body>
</html>