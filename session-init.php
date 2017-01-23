<?php 

include("Game.php");

// clearing cache
apcu_clear_cache();

$g = new Game(0, "game0");

apcu_add("game0", $g);

// saving game object in memory
echo(json_encode($g->update()));

?>