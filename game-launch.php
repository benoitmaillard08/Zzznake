<?php 

include("Game.php");

// clearing cache
apcu_clear_cache();

$g = new Game(0, "game0");

apcu_add("game0", $g);

// saving game object in memory
var_dump(apcu_fetch("game0"));

?>