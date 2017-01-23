<?php 

include("Game.php");

// clearing cache
apcu_clear_cache();

$g = new Game(0, "game0");

apcu_add("game0", $g);

header('Location: ' . 'game-session.php?id=0');

?>